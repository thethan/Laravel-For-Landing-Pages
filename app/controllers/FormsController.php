<?php

class FormersController extends BaseController {

	/**
	 * Form Repository
	 *
	 * @var Form
	 */
	protected $former;

	public function __construct(Former $former)
	{
		$this->former = $former;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$forms = $this->former->get();

		return View::make('forms.index', compact('forms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('forms.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		
		$validation = Validator::make($input, Former::$rules);

		if ($validation->passes())
		{
			$this->former->create($input);
				
			$data = 'lead in ';
			
			$url = 'http://eleads.lafilm.com:8088/Cmc.Integration.LeadImport.HttpPost/ImportLeadProcessor.aspx';
			if($input['program'] == 'BSEB-O' || $input['program'] == 'BSDC-O'){
				$camp = 'MAIN2';}
				else {$camp = 'MAIN';};
				
			$post = '';
			$post .= 'Leadsource='.$input['leadSource'];
			$post .= '&Format='.$input['format'];
			$post .= '&FirstName='.$input['FirstName'];
			$post .= '&LastName='.$input['LastName'];
			$post .= '&Program='.$input['program'];
			$post .= '&Email='.$input['email'];
			$post .= '&PostalCodeorZip='.$input['PostalCodeorZip'];
			$post .= '&Phone='.$input['Phone'];
			$post .= '&Country='.$input['Country'];
			$post .= '&PreviousEducation='.$input['PreviousEducation'];
			$post .= '&leadtype=NEWLEAD&campus='.$camp;
			
			
		
			$ch = curl_init($url);
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
			
			$stat = Input::get('stat_id');
			
			$stats = Stat::find($stat);
			
			$stats->convert = 1;
			
			$stats->save();
				
			return json_encode( array('msg' => 'Lead Processed', 'res'=> $response) );
			
			
		}
		
			return 'not true';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$form = $this->form->findOrFail($id);

		return View::make('forms.show', compact('form'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$form = $this->form->find($id);

		if (is_null($form))
		{
			return Redirect::route('forms.index');
		}

		return View::make('forms.edit', compact('form'));
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
		$validation = Validator::make($input, Form::$rules);

		if ($validation->passes())
		{
			$form = $this->form->find($id);
			$form->update($input);

			return Redirect::route('forms.show', $id);
		}

		return Redirect::route('forms.edit', $id)
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
		$this->form->find($id)->delete();

		return Redirect::route('forms.index');
	}

}
