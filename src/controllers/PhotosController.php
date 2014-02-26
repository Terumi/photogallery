<?php namespace Ffy\Photogallery;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;


class PhotosController extends BaseController {

	/**
	 * Photo Repository
	 *
	 * @var Photo
	 */
	protected $photo;

	public function __construct(Photo $photo)
	{
		$this->photo = $photo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = $this->photo->all();

		return View::make('photogallery::photos.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('photogallery::photos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Photo::$rules);

		if ($validation->passes())
		{
            /*
             * get the file from the input
             * come up with a unique name to avoid name conflicts
             * make an intevention/image out of the uploaded image
             * get the config folder
             * if it doesn't exist, create it
             * save the f@#$ image
            */
            $file = Input::file('url');
            $file_name = time(). '-'. strtolower($file->getClientOriginalName());
            $image = Image::make($file->getRealPath());
            $path = Config::get('photogallery::upload_folder');
            File::exists($path) or File::makeDirectory($path);
            $image->save($path.$file_name);

            /*
             * rename the filename from the input so you can save the image record with the proper name
             * save the record
             * go back
             */
            $input['url'] = $file_name;
            $this->photo->create($input);
			return Redirect::action('Ffy\Photogallery\PhotosController@index');
		}

		return Redirect::route('photos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $photo = $this->photo->findOrFail($id);
		return View::make('photogallery::photos.show', compact('photo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$photo = $this->photo->find($id);

		if (is_null($photo))
		{
			return Redirect::action('Ffy\Photogallery\PhotosController@index');
		}

		return View::make('photogallery::photos.edit', compact('photo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Photo::$rules);



		if ($validation->passes())
		{
            $photo = $this->photo->find($id);

            $photo->update($input);

            return Redirect::action('Ffy\Photogallery\PhotosController@show', array('id' => $id));
        }


		return Redirect::action('Ffy\Photogallery\PhotosController@edit', array('id' => $id))
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->photo->find($id)->delete();

		return Redirect::action('Ffy\Photogallery\PhotosController@index');
	}

}
