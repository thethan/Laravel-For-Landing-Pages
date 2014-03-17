<?php

class ImagesController extends BaseController {

	/**
	 * Image Repository
	 *
	 * @var Image
	 */
	protected $image;

	public function __construct(Image $image)
	{
		$this->image = $image;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$images = $this->image->all();

		return View::make('images.index', compact('images'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('images.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Image::$rules);

		if ($validation->passes())
		{
			$this->image->create($input);

			return Redirect::route('images.index');
		}

		return Redirect::route('images.create')
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
		$image = $this->image->findOrFail($id);

		return View::make('images.show', compact('image'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$image = $this->image->find($id);

		if (is_null($image))
		{
			return Redirect::route('images.index');
		}

		return View::make('images.edit', compact('image'));
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
		$validation = Validator::make($input, Image::$rules);

		if ($validation->passes())
		{
			$image = $this->image->find($id);
			$image->update($input);

			return Redirect::route('images.show', $id);
		}

		return Redirect::route('images.edit', $id)
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
		$this->image->find($id)->delete();

		return Redirect::route('images.index');
	}

}
