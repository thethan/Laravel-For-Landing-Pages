<?php

class TemplatesController extends BaseController {

	/**
	 * Template Repository
	 *
	 * @var Template
	 */
	protected $template;

	public function __construct(Template $template)
	{
		$this->template = $template;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$templates = $this->template->all();

		return View::make('templates.index', compact('templates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		//return View::make('templates.create');
		return View::make('templates.upload');
	}

	
	public function upload(){
		
		$input = Input::all();
		$validation = Validator::make($input, Template::$rules);
		if ($validation->passes())
		{
			

			$file = Input::file('image'); // your file upload input field in the form should be named 'file'
			$css = Input::file('css');
			$destinationPath = app_path().'/views/uploads/layouts';
			$csspath = public_path().'/assets/css';
			
			$thumbdestination = public_path().'/assets/thumb';
			$name = Input::get('name');
			$newname = str_replace(' ','_', $name);
			$filename = $file->getClientOriginalName();
			//$extension =$file->getClientOriginalExtension(); 
			//if you need extension of the file
			$uploadSuccess = Input::file('image')->move($destinationPath, $filename);
			
			$extension = Input::file('thumbnail')->getClientOriginalExtension();
			
			$uploadthumbnail = Input::file('thumbnail')->move($thumbdestination, $newname.'.'.$extension);
			$uploadcss = Input::file('css')->move($csspath, $css.'.css');
					
			
			$input = Input::all();
			
			if( $uploadSuccess && $uploadthumbnail ) {
			   //return Response::json('success', 200); // or do a redirect with some message that file was uploaded
			  $this->template->name = Input::get('name');
			  $this->template->file = $filename;
			  $this->template->css = $css;
			  $this->template->save();
			
			$id = DB::getPdo()->lastInsertId();
			
			$thumb = new Image_thumbnail();
			
			$thumb->img = $newname.'.'.$extension;
			$thumb->title = $name;
			$thumb->t_id = $id;
			$thumb->save();
				
			return Redirect::route('templates.definefields', array('id' => $id));
			
			}
		}
		return Redirect::route('templates.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		
	}
	
	public function defineFields($id){
	
		$template = $this->template->findOrFail($id);
		
		$file = $template->file;
		
		$fullpath = app_path().'/views/uploads/layouts/'.$file;
		
		$string = file_get_contents($fullpath);
		
		$string = str_replace('@yield', '|@yield', $string);
		
		$strings = explode('|', $string);
		
		$pattern = "/@yield\(\'(.*?)\'\)/";
		
		foreach($strings as $string){
			
			if(preg_match($pattern, $string, $matches)){
			
				$section = new Section;
				
				$section->title = $matches[1];
				
				$section->t_id = $id;
				
				$section->save();
			}
		
		}
		
		return Redirect::route('bladetemps.create', array('id' => $id));
		
	}	
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Template::$rules);

		if ($validation->passes())
		{
			$this->template->create($input);

			return Redirect::route('templates.index');
		}

		return Redirect::route('templates.create')
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
		$template = $this->template->findOrFail($id);

		return View::make('templates.show', compact('template'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$template = $this->template->find($id);

		if (is_null($template))
		{
			return Redirect::route('templates.index');
		}

		return View::make('templates.edit', compact('template'));
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
		$validation = Validator::make($input, Template::$rules);

		if ($validation->passes())
		{
			$template = $this->template->find($id);
			$template->update($input);

			return Redirect::route('templates.show', $id);
		}

		return Redirect::route('templates.edit', $id)
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
		$this->template->find($id)->delete();

		return Redirect::route('templates.index');
	}

}
