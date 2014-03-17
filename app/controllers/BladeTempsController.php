<?php

class BladeTempsController extends BaseController {

	/**
	 * Bladetemp Repository
	 *
	 * @var Bladetemp
	 */
	protected $bladetemp;

	public function __construct(Bladetemp $bladetemp)
	{
		$this->bladetemp = $bladetemp;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bladetemps = $this->bladetemp->all();

		return View::make('bladetemps.index', compact('bladetemps'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create($t_id)
	{
		$id = $t_id;

		return View::make('bladetemps.upload', compact('id'));
	}

	
	public function upload(){
		
		$input = Input::all();
		$validation = Validator::make($input, BladeTemp::$rules);
		if ($validation->passes())
		{
			
			$file = Input::file('image'); // your file upload input field in the form should be named 'file'

			$destinationPath = app_path().'/views/uploads';
			$filename = $file->getClientOriginalName();
			//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
			$uploadSuccess = Input::file('image')->move($destinationPath, $filename);

			$input = Input::all();
			
			if( $uploadSuccess ) {
			   //return Response::json('success', 200); // or do a redirect with some message that file was uploaded
			  $this->bladetemp->name = Input::get('name');
			  $this->bladetemp->file = $filename;
			  $this->bladetemp->save();
			
			$id = DB::getPdo()->lastInsertId();
				
			return Redirect::route('bladetemps.definefields', array('id' => $id));
			
			}
		}
		
		return Redirect::route('bladetemps.create', array('id'=> $input['t_id']))
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		
	}
	
	public function defineFields($id){
	
		$bladetemp = $this->bladetemp->findOrFail($id);
		
		$file = $bladetemp->file;
		
		$fullpath = app_path().'/views/uploads/'.$file;
		
		$string = file_get_contents($fullpath);
		
		$string = str_replace('{{', '|{{', $string);
		
		$strings = explode('|', $string);
		
		$pattern = "/{{(.*?)}}/";
		
		//print_r($strings);
		
		foreach($strings as $string){
			
			if(preg_match($pattern, $string, $matches)){
			
				$variable = new Variable;
				
				$var_title = substr($matches[1], strpos($matches[1], '"') + 2);
				
				$variable->name = str_replace('"', '', $var_title);
				
				echo $variable->name;
				
				$variable->t_id = $id;
				
				$variable->save();
				
				//print_r($matches);
				
			}
			
		}

		return Redirect::route('variables.assigntypes', array('id' => $id));

	}	
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Bladetemp::$rules);

		if ($validation->passes())
		{
			$this->bladetemp->create($input);

			return Redirect::route('bladetemps.index');
		}

		return Redirect::route('bladetemps.upload')
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
		$bladetemp = $this->bladetemp->findOrFail($id);

		return View::make('bladetemps.show', compact('bladetemp'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bladetemp = $this->bladetemp->find($id);

		if (is_null($bladetemp))
		{
			return Redirect::route('bladetemps.index');
		}

		return View::make('bladetemps.edit', compact('bladetemp'));
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
		$validation = Validator::make($input, Bladetemp::$rules);

		if ($validation->passes())
		{
			$bladetemp = $this->bladetemp->find($id);
			$bladetemp->update($input);

			return Redirect::route('bladetemps.show', $id);
		}

		return Redirect::route('bladetemps.edit', $id)
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
		$this->bladetemp->find($id)->delete();

		return Redirect::route('bladetemps.index');
	}

}
