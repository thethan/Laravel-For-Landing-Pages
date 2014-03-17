<?php

class Varvar_textsController extends BaseController {

	/**
	 * Varvar_text Repository
	 *
	 * @var Varvar_text
	 */
	protected $varvar_text;

	public function __construct(Varvar_text $varvar_text)
	{
		$this->varvar_text = $varvar_text;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$varvar_texts = $this->varvar_text->all();

		return View::make('varvar_texts.index', compact('varvar_texts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('varvar_texts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Varvar_text::$rules);

		if ($validation->passes())
		{
			$this->varvar_text->create($input);

			return Redirect::route('varvar_texts.index');
		}

		return Redirect::route('varvar_texts.create')
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
		$varvar_text = $this->varvar_text->findOrFail($id);

		return View::make('varvar_texts.show', compact('varvar_text'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$varvar_text = $this->varvar_text->find($id);

		if (is_null($varvar_text))
		{
			return Redirect::route('varvar_texts.index');
		}

		return View::make('varvar_texts.edit', compact('varvar_text'));
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
		$validation = Validator::make($input, Varvar_text::$rules);

		if ($validation->passes())
		{
			$varvar_text = $this->varvar_text->find($id);
			$varvar_text->update($input);

			return Redirect::route('varvar_texts.show', $id);
		}

		return Redirect::route('varvar_texts.edit', $id)
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
		$this->varvar_text->find($id)->delete();

		return Redirect::route('varvar_texts.index');
	}

}
