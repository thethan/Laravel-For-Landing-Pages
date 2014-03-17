<?php

class SlidersController extends BaseController {

	/**
	 * Slider Repository
	 *
	 * @var Slider
	 */
	protected $slider;

	public function __construct(Slider $slider)
	{
		$this->slider = $slider;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sliders = $this->slider->all();

		return View::make('sliders.index', compact('sliders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sliders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Slider::$rules);

		if ($validation->passes())
		{
			$this->slider->create($input);

			return Redirect::route('sliders.index');
		}

		return Redirect::route('sliders.create')
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
		$slider = $this->slider->findOrFail($id);

		return View::make('sliders.show', compact('slider'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$slider = $this->slider->find($id);

		if (is_null($slider))
		{
			return Redirect::route('sliders.index');
		}

		return View::make('sliders.edit', compact('slider'));
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
		$validation = Validator::make($input, Slider::$rules);

		if ($validation->passes())
		{
			$slider = $this->slider->find($id);
			$slider->update($input);

			return Redirect::route('sliders.show', $id);
		}

		return Redirect::route('sliders.edit', $id)
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
		$this->slider->find($id)->delete();

		return Redirect::route('sliders.index');
	}

}
