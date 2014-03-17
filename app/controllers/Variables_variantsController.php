<?php

class Variables_variantsController extends BaseController {

	/**
	 * Variables_variant Repository
	 *
	 * @var Variables_variant
	 */
	protected $variables_variant;

	public function __construct(Variables_variant $variables_variant)
	{
		$this->variables_variant = $variables_variant;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$variables_variants = $this->variables_variant->all();

		return View::make('variables_variants.index', compact('variables_variants'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('variables_variants.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Variables_variant::$rules);

		if ($validation->passes())
		{
			$this->variables_variant->create($input);

			return Redirect::route('variables_variants.index');
		}

		return Redirect::route('variables_variants.create')
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
		$variables_variant = $this->variables_variant->findOrFail($id);

		return View::make('variables_variants.show', compact('variables_variant'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$variables_variant = $this->variables_variant->find($id);

		if (is_null($variables_variant))
		{
			return Redirect::route('variables_variants.index');
		}

		return View::make('variables_variants.edit', compact('variables_variant'));
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
		$validation = Validator::make($input, Variables_variant::$rules);

		if ($validation->passes())
		{
			$variables_variant = $this->variables_variant->find($id);
			$variables_variant->update($input);

			return Redirect::route('variables_variants.show', $id);
		}

		return Redirect::route('variables_variants.edit', $id)
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
		$this->variables_variant->find($id)->delete();

		return Redirect::route('variables_variants.index');
	}

}
