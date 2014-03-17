<?php

class VariablesController extends BaseController {

	/**
	 * Variable Repository
	 *
	 * @var Variable
	 */
	protected $variable;

	public function __construct(Variable $variable)
	{
		$this->variable = $variable;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$variables = $this->variable->all();

		return View::make('variables.index', compact('variables'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('variables.create');
	}
	
	public function getAssignTypes($id){
		
		$variables = DB::table('variables')->where('t_id', '=', $id)->get();
		
		$types = DB::table('types')->get();
		
		$select = array();
		
		$select[] = 'Please Select';
	
			foreach($types as $type){
				
				$select[$type->id] = $type->type;
				
			}
			
				
		return View::make('variables.assign', compact('variables', 'select'));
		
	}
	
	public function assignvar(){
		
		$vars = Input::get('var');
		
		$count = count($vars);
		print_r($vars);
		$keys = array_keys($vars);
		print_r($keys);
		
		foreach($keys as $key){
			
			$variable = Variable::find($key);
			
			$variable->type = $vars[$key];
			
			$variable->save();
				
		}
		
		
		
		$var = Variable::find($keys[0]);
		
		$t_id = $var->t_id;
		 		
		return Redirect::route('template.index');
		
	}
	
	public function populatevars($type){
		
		$temp = Template::find($type);
		
		
		
		return View::make('variables.index')->with('templates',$temp);
		
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Variable::$rules);

		if ($validation->passes())
		{
			$this->variable->create($input);

			return Redirect::route('variables.index');
		}

		return Redirect::route('variables.create')
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
		$variable = $this->variable->findOrFail($id);

		return View::make('variables.show', compact('variable'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$variable = $this->variable->find($id);

		if (is_null($variable))
		{
			return Redirect::route('variables.index');
		}

		return View::make('variables.edit', compact('variable'));
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
		$validation = Validator::make($input, Variable::$rules);

		if ($validation->passes())
		{
			$variable = $this->variable->find($id);
			$variable->update($input);

			return Redirect::route('variables.show', $id);
		}

		return Redirect::route('variables.edit', $id)
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
		$this->variable->find($id)->delete();

		return Redirect::route('variables.index');
	}

}
