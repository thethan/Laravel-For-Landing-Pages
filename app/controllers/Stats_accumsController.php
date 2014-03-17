<?php

class Stats_accumsController extends BaseController {

	/**
	 * Stats_accum Repository
	 *
	 * @var Stats_accum
	 */
	protected $stats_accum;

	public function __construct(Stats_accum $stats_accum)
	{
		$this->stats_accum = $stats_accum;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stats_accums = $this->stats_accum->all();

		return View::make('stats_accums.index', compact('stats_accums'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('stats_accums.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Stats_accum::$rules);

		if ($validation->passes())
		{
			$this->stats_accum->create($input);

			return Redirect::route('stats_accums.index');
		}

		return Redirect::route('stats_accums.create')
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
		$stats_accum = $this->stats_accum->findOrFail($id);

		return View::make('stats_accums.show', compact('stats_accum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stats_accum = $this->stats_accum->find($id);

		if (is_null($stats_accum))
		{
			return Redirect::route('stats_accums.index');
		}

		return View::make('stats_accums.edit', compact('stats_accum'));
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
		$validation = Validator::make($input, Stats_accum::$rules);

		if ($validation->passes())
		{
			$stats_accum = $this->stats_accum->find($id);
			$stats_accum->update($input);

			return Redirect::route('stats_accums.show', $id);
		}

		return Redirect::route('stats_accums.edit', $id)
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
		$this->stats_accum->find($id)->delete();

		return Redirect::route('stats_accums.index');
	}

}
