<?php

class VariantesController extends BaseController {

	/**
	 * Variante Repository
	 *
	 * @var Variante
	 */
	protected $variante;

	public function __construct(Variante $variante)
	{
		$this->variante = $variante;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$variantes = $this->variante->all();

		return View::make('variantes.index', compact('variantes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('variantes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Variante::$rules);

		if ($validation->passes())
		{
			$this->variante->create($input);

			return Redirect::route('variantes.index');
		}

		return Redirect::route('variantes.create')
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
		$variante = $this->variante->findOrFail($id);

		return View::make('variantes.show', compact('variante'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$variante = $this->variante->find($id);

		if (is_null($variante))
		{
			return Redirect::route('variantes.index');
		}

		return View::make('variantes.edit', compact('variante'));
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
		$validation = Validator::make($input, Variante::$rules);

		if ($validation->passes())
		{
			$variante = $this->variante->find($id);
			$variante->update($input);

			return Redirect::route('variantes.show', $id);
		}

		return Redirect::route('variantes.edit', $id)
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
		$this->variante->find($id)->delete();

		return Redirect::route('variantes.index');
	}

}
