<?php

class Images_to_slidersController extends BaseController {

	/**
	 * Images_to_slider Repository
	 *
	 * @var Images_to_slider
	 */
	protected $images_to_slider;

	public function __construct(Images_to_slider $images_to_slider)
	{
		$this->images_to_slider = $images_to_slider;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$images_to_sliders = $this->images_to_slider->all();

		return View::make('images_to_sliders.index', compact('images_to_sliders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('images_to_sliders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Images_to_slider::$rules);

		if ($validation->passes())
		{
			$this->images_to_slider->create($input);

			return Redirect::route('images_to_sliders.index');
		}

		return Redirect::route('images_to_sliders.create')
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
		$images_to_slider = $this->images_to_slider->findOrFail($id);

		return View::make('images_to_sliders.show', compact('images_to_slider'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$images_to_slider = $this->images_to_slider->find($id);

		if (is_null($images_to_slider))
		{
			return Redirect::route('images_to_sliders.index');
		}

		return View::make('images_to_sliders.edit', compact('images_to_slider'));
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
		$validation = Validator::make($input, Images_to_slider::$rules);

		if ($validation->passes())
		{
			$images_to_slider = $this->images_to_slider->find($id);
			$images_to_slider->update($input);

			return Redirect::route('images_to_sliders.show', $id);
		}

		return Redirect::route('images_to_sliders.edit', $id)
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
		$this->images_to_slider->find($id)->delete();

		return Redirect::route('images_to_sliders.index');
	}

}
