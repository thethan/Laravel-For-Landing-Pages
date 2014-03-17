<?php

class StatsController extends BaseController {

	/**
	 * Stat Repository
	 *
	 * @var Stat
	 */
	protected $stat;

	public function __construct(Stat $stat)
	{
		$this->stat = $stat;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stats = $this->stat->all();

		return View::make('stats.index', compact('stats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('stats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Stat::$rules);

		if ($validation->passes())
		{
			$this->stat->create($input);

			return Redirect::route('stats.index');
		}

		return Redirect::route('stats.create')
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
		$stat = $this->stat->findOrFail($id);

		return View::make('stats.show', compact('stat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stat = $this->stat->find($id);

		if (is_null($stat))
		{
			return Redirect::route('stats.index');
		}

		return View::make('stats.edit', compact('stat'));
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
		$validation = Validator::make($input, Stat::$rules);

		if ($validation->passes())
		{
			$stat = $this->stat->find($id);
			$stat->update($input);

			return Redirect::route('stats.show', $id);
		}

		return Redirect::route('stats.edit', $id)
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
		$this->stat->find($id)->delete();

		return Redirect::route('stats.index');
	}

}
