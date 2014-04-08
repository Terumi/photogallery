<?php namespace Ffy\Photogallery;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;


class PhotosController extends BaseController
{

    protected $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function index()
    {
        $pagination_items = Config::get('photogallery::pagination_items');
        if ($pagination_items) {
            $photos = $this->photo->paginate($pagination_items);
        } else {
            $photos = $this->photo->all();
        }
        return View::make('photogallery::photos.index', compact('photos'));
    }

    public function create()
    {
        return View::make('photogallery::photos.create');
    }

    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Photo::$rules);

        if ($validation->passes()) {
            /*
             * get the file from the input
             * come up with a unique name to avoid name conflicts
             * make an intevention/image out of the uploaded image
             * get the upload folder from the config
             * if it doesn't exist, create it
             * save the f@#$ image
            */
            $file = Input::file('url');
            $file_name = time() . '-' . strtolower($file->getClientOriginalName());
            $image = Image::make($file->getRealPath());
            $path = public_path() . '/' . Config::get('photogallery::upload_folder');
            File::exists($path) or File::makeDirectory($path);

            /*
             * if the config max_width is set
             * and the uploaded image is wider than that number
             * resize the photo
             */
            if (Config::get('photogallery::max_width') > 0 && $image->width > Config::get('photogallery::max_width')) {

                $image->resize(Config::get('photogallery::max_width'), null, true);
            }

            /*
             * if the config max_width is set
             * and the uploaded image is wider than that number
             * resize the photo
             */
            if (Config::get('photogallery::max_height') > 0 && $image->height > Config::get('photogallery::max_height')) {
                $image->resize(null, Config::get('photogallery::max_height'), true);
            }

            /*
             * if size is set...
             */
            if (Config::get('photogallery::size')[0] > 0 && Config::get('photogallery::size')[1] > 0) {
                $image->grab(Config::get('photogallery::size')[0], Config::get('photogallery::size')[1]);
            }
            /*
             * if greyscale is set to true
             */
            if (Config::get('photogallery::greyscale')) {
                $image->greyscale();
            }



            $image->save($path . $file_name);

            /*
             * rename the filename from the input so you can save the image record with the proper name
             * save the record
             * go back
             */

            $input['url'] = $file_name;
            $this->photo->create($input);

            /*
             * alternate versions:
             *  if there are entries in the versions array
             *  foreach version get the path
             *  resize and save
             */

            if (count(Config::get('photogallery::versions')) > 0) {
                foreach (Config::get('photogallery::versions') as $version) {
                    $path = public_path() . '/' . $version['upload_folder'];
                    File::exists($path) or File::makeDirectory($path);
                    $image = Image::make($file->getRealPath());
                    $image->grab($version['size'][0], $version['size'][1]);
                    if ($version['greyscale']) {
                        $image->greyscale();
                    }
                    $image->save($path . $file_name);
                }
            }
            return Redirect::action('Ffy\Photogallery\PhotosController@index');
        }

        return Redirect::action('Ffy\Photogallery\PhotosController@create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    public function show($id)
    {
        $photo = $this->photo->findOrFail($id);
        return View::make('photogallery::photos.show', compact('photo'));
    }

    public function edit($id)
    {
        $photo = $this->photo->find($id);

        if (is_null($photo)) {
            return Redirect::action('Ffy\Photogallery\PhotosController@index');
        }

        return View::make('photogallery::photos.edit', compact('photo'));
    }

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $photo = $this->photo->find($id);
        $newPhoto = true;

        if (!isset($input['url'])) {
            $input['url'] = $photo->url;
            $newPhoto = false;
        }

        $validation = Validator::make($input, Photo::$rules);
        if ($validation->passes()) {
            if ($newPhoto) {
                /*
                * get the upload folder from the config
                * delete the previous file, if exists
                * get the file from the input
                * come up with a unique name to avoid name conflicts
                * make an intevention/image out of the uploaded image
                * save the f@#$ image
                * change the input to the real file name
                */
                $path = public_path() . '/' . Config::get('photogallery::upload_folder');
                if (File::exists($path . $photo->url))
                    File::delete($path . $photo->url);
                $file = Input::file('url');
                $file_name = time() . '-' . strtolower($file->getClientOriginalName());
                $image = Image::make($file->getRealPath());
                $image->save($path . $file_name);
                $input['url'] = $file_name;
            }
            $photo->update($input);
            return Redirect::action('Ffy\Photogallery\PhotosController@show', array('id' => $id));
        }

        return Redirect::action('Ffy\Photogallery\PhotosController@edit', array('id' => $id))
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    public function destroy($id)
    {
        /*
        * find the photo
        * get the path
        * delete file, if exists
        * delete the db record
        * return
        */
        $photo = $this->photo->find($id);
        $path = public_path() . '/' . Config::get('photogallery::upload_folder');
        if (File::exists($path . $photo->url))
            File::delete($path . $photo->url);
        $photo->delete();

        /*
         * if exist in the configuration file, delete all other versions
         */
        if (count(Config::get('photogallery::versions')) > 0) {
            foreach (Config::get('photogallery::versions') as $version) {
                $path = public_path() . '/' . $version['upload_folder'];
                if (File::exists($path . $photo->url))
                    File::delete($path . $photo->url);
                $photo->delete();
            }
        }

        return Redirect::back();
    }

    public function favorite($id)
    {
        $photo = $this->photo->find($id);
        $photo->favorite = !$photo->favorite;
        $photo->save();
        return Redirect::back();
    }
}