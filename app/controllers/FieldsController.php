<?php

class FieldsController extends AdminController {

	/**
	 * Field Repository
	 *
	 * @var Field
	 */
	protected $field;

	public function __construct(Field $field)
	{
		$this->field = $field;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fields = $this->field->all();

		return View::make('fields.index', compact('fields'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('fields.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Field::$rules);

		if ($validation->passes())
		{
			$this->field->create($input);

			return Redirect::route('fields.index');
		}

		return Redirect::route('fields.create')
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
		$field = $this->field->findOrFail($id);

		return View::make('fields.show', compact('field'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$field = $this->field->find($id);

		if (is_null($field))
		{
			return Redirect::route('fields.index');
		}

		return View::make('fields.edit', compact('field'));
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
		$validation = Validator::make($input, Field::$rules);

		if ($validation->passes())
		{
			$field = $this->field->find($id);
			$field->update($input);

			return Redirect::route('fields.show', $id);
		}

		return Redirect::route('fields.edit', $id)
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
		$this->field->find($id)->delete();

		return Redirect::route('fields.index');
	}

}
