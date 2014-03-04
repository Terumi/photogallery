<?php namespace Ffy\Photogallery;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AlbumsController extends \BaseController
{

    public function __construct(Album $album)
    {
        $this->album = $album;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $albums = $this->album->all();
        return View::make('photogallery::albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('photogallery::albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        /*
         * get the input data
         * if the data pass the validation
         * create album
         * redirect to the albums index page
         */
        $input = Input::all();
        $validation = Validator::make($input, ALbum::$rules);

        if ($validation->passes()) {
            $this->album->create($input);
            return Redirect::action('Ffy\Photogallery\AlbumsController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $album = $this->album->findOrFail($id);
        return View::make('photogallery::albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $album = $this->album->find($id);
        if (is_null($album)) {
            return Redirect::action('Ffy\Photogallery\AlbumsController@index');
        }
        return View::make('photogallery::albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $album = $this->album->find($id);

        $validation = Validator::make($input, Album::$rules);
        if ($validation->passes()) {
            $album->update($input);
            return Redirect::action('Ffy\Photogallery\AlbumsController@show', array('id' => $id));
        }

        return Redirect::action('Ffy\Photogallery\AlbumsController@edit', array('id' => $id))
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        /*
       * find the album
       * delete it
       * return
       */
        $album = $this->album->find($id);
        $album->delete();
        return Redirect::action('Ffy\Photogallery\AlbumsController@index');
    }

}