<?php

class Image_thumbnailsController extends BaseController {

	/**
	 * Image_thumbnail Repository
	 *
	 * @var Image_thumbnail
	 */
	protected $image_thumbnail;

	public function __construct(Image_thumbnail $image_thumbnail)
	{
		$this->image_thumbnail = $image_thumbnail;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$image_thumbnails = $this->image_thumbnail->all();

		return View::make('image_thumbnails.index', compact('image_thumbnails'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('image_thumbnails.create');
	}
	
	public function upload(){
		
		$input = Input::all();
		$validation = Validator::make($input, Template::$rules);
		if ($validation->passes())
		{
			
			
			
			$file = Input::file('image'); // your file upload input field in the form should be named 'file'

			$destinationPath =  public_path().'\templates';
			$filename = $file->getClientOriginalName();
			//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
			$uploadSuccess = Input::file('image')->move($destinationPath, $filename);
			
			
			$input = Input::all();
			
			if( $uploadSuccess ) {
			   //return Response::json('success', 200); // or do a redirect with some message that file was uploaded
			  $this->image_thumbnail->t_id = Input::get('t_id');
			  $this->image_thumbnail->title = Input::get('title');
			  $this->image_thumbnail->img = $filename;
			  $this->image_thumbnail->save();
			
			$id = DB::getPdo()->lastInsertId();
				
			return Redirect::route('templates.definefields', array('id' => $id));
			//return Redirect::route('image_thumbnail.upload', array('id' => $id));	
			}
		}
		return Redirect::route('templates.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Image_thumbnail::$rules);

		if ($validation->passes())
		{
			$this->image_thumbnail->create($input);

			return Redirect::route('image_thumbnails.index');
		}

		return Redirect::route('image_thumbnails.create')
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
		$image_thumbnail = $this->image_thumbnail->findOrFail($id);

		return View::make('image_thumbnails.show', compact('image_thumbnail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$image_thumbnail = $this->image_thumbnail->find($id);

		if (is_null($image_thumbnail))
		{
			return Redirect::route('image_thumbnails.index');
		}

		return View::make('image_thumbnails.edit', compact('image_thumbnail'));
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
		$validation = Validator::make($input, Image_thumbnail::$rules);

		if ($validation->passes())
		{
			$image_thumbnail = $this->image_thumbnail->find($id);
			$image_thumbnail->update($input);

			return Redirect::route('image_thumbnails.show', $id);
		}

		return Redirect::route('image_thumbnails.edit', $id)
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
		$this->image_thumbnail->find($id)->delete();

		return Redirect::route('image_thumbnails.index');
	}

}
