<?php

class VariantsController extends BaseController {

	/**
	 * Variant Repository
	 *
	 * @var Variant
	 */
	protected $variant;

	public function __construct(Variant $variant)
	{
		$this->variant = $variant;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$variants = $this->variant->all();

		return View::make('variants.index', compact('variants'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($lp_id)
	{
		
		return View::make('variants.create', compact('lp_id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Variant::$rules);

		if ($validation->passes())
		{
			$this->variant->create($input);
			$vid = DB::getPdo()->lastInsertId();
			
			$templates = Template::getImages();

			return Redirect::route('variants.assigntemp', compact('vid', 'templates'));
		}

		return Redirect::route('variants.create')
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
		$variant = $this->variant->findOrFail($id);
		$tempid = $variant->t_id;
		//echo $tempid;
		
		$lp = $variant->lp_id;
		
		$lppage = DB::table('landing_pages')->where('id','=', $lp)->first();
		
		$slug = $lppage->slug;
		
		$variables = $this->variant->getVariantVariables($id);
		$key = array();
		$value = array();
		
		foreach($variables as $var){
				$key[] = str_replace(' ','',$var->name);
				$value[] = $var->vartext;
			}
			
			$variab = array_combine($key, $value);
			
			extract($variab);
			
			//print_r($variab);
			//echo "$disclaimer";
			$bladete = $this->variant->getblade($tempid);
			
			$file =  $bladete->blade;
			$filer = str_replace('.blade.php','',$file);
			$view = 'uploads.'.$filer;
			 
		$images = $this->variant->getsliderimages($id); 
		$count = count($images);
			$sliderimages = '';
			$sliderbuttons = '';
			$slideritems = '';
			$i= 1;
			foreach($images as $img){
				$sliderimages .= 	".iosSlider .slider #item".$i." 
								{
									background: url('".asset($img->path)."') no-repeat 50% 0 ;
									background-size:100%;
									
								}";
				$sliderbuttons .= '<div class="button"></div>';
				$slideritems .= "<div class = 'item' id = 'item".$i."'>

								</div>";
								$i++;
				}
		$data = array('id'=>$variant->id, 'lp_id'=>$variant->lp_id, 'slug'=>$slug);
		
		// return View::make($view)->with('variables', $variab);
		return View::make($view)->with('variables', $variab)->with('sliderimages', $sliderimages)->with('slideritems', $slideritems)
									->with('sliderbuttons', $sliderbuttons)->with('slug', $lppage->slug)->nest('form', 'forms.form', $data );
	}
	 

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$variant = $this->variant->find($id);
		
		$templates = Template::getImages();

		if (is_null($variant))
		{
			return Redirect::route('variants.index');
		}

		return View::make('variants.edit', compact('variant'));
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
		$validation = Validator::make($input, Variant::$rules);

		if ($validation->passes())
		{
			$variant = $this->variant->find($id);
			$variant->update($input);
			return Redirect::route('variants.show', $id);
		}

		return Redirect::route('variants.edit', $id)
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
		$this->variant->find($id)->delete();

		return Redirect::route('getVariants');
	}
	
	public function getTemplates($vid){
		$variants = $this->variant->get();
		$tempimg = new Template();
		$templates = $tempimg->getImages();
		$bladetemp = DB::table('bladetemps')->get();
		return View::make('variants.assign', compact( 'vid', 'variants', 'templates', 'bladetemp'));
	}
	
	public function assignTemplate(){
		
		$vid = Input::get('vid');
		
		$t_id = Input::get('blade');
		
		$variant = Variant::find($vid);
		
		$variant->t_id = $t_id;
		
		$variant->save();
		
		return Redirect::route('variants.vartovar', array('vid' => $vid, 'tid'=>$t_id));
		 
	}
	
	public function vartovar($vid, $tid){
		
		$variant = $this->variant->find($vid);
		
		//$variant = $this->variant->find($vid);
		
		$count = $this->variant->countvariables($vid);
		
		if($count){
			$variables = $this->variant->formType($vid);
		}
		else {
			$variables = $this->variant->selectFromTemplate($tid, $vid);
		}
		$title =  $variant->title;
		
		$minmax = $this->variant->hiddenfield($vid);
				
		return View::make('variants.variables', compact('variables', 'variant', 'title', 'minmax'));
	}
	
	public function assignvartext() { 
		$min = Input::get('min');
		$max = Input::get('max');
		$vid = Input::get('vid');

		
		for($i = $min; $i < $max +1 ; $i++){
			
			$varid = 'variableid-'.$i;
			$input = Input::get($varid);	
			echo $input;
			$type =	$this->variant->getVarType($i);
			if($type == 5 || $type == 6){
						
					$file = Input::file('variableid-'.$i); // your file upload input field in the form should be named 'file'
					$publicpath = public_path();
					$landing = $this->variant->getfoldername($vid);
					
					$destinationPath = $publicpath.'/'.$landing;
					mkdir($destinationPath, 0755);
					
					$filename = $file->getClientOriginalName();
						//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
					$uploadSuccess = Input::file('variableid-'.$i)->move($destinationPath, $filename);
	
					$input= $destinationPath.'/'.$filename;
				}
				$this->variant->storeVartexts($i, $input);
		
			}
			$variant = $this->variant->find($vid);
		 return Redirect::route('getVariants', array('lp_id'=>$variant->lp_id));
	}
	
	public function changePercent(){
			$lpid = Input::get('landing');
			
			$variants = $this->variant->getlandingvariant($lpid);
			
			foreach($variants as $var){
					$varin = 'variant-'.$var->id;
					$input = Input::get($varin);
					$this->variant->percent($var->id, $input);
				
				}
				return Response::json('success', 200); // or do a redirect with some message that file was uploaded
		}
	public function uploadSlider($varid){
			$variant = $this->variant->find($varid);
			$id = $variant->id;
			$tid = $variant->t_id;
			$lp_id = $variant->lp_id;
			$title = $this->variant->getlandingfull($lp_id).':'.$variant->title;
			$images = $this->variant->getsliderimages($varid); 
			return View::make('variants.slider', compact('id', 'tid', 'images', 'title', 'lp_id'));
		}
	
	public function postImage()
	{
		$file = Input::file('file'); // your file upload input field in the form should be named 'file'
		$lp_id = Input::get('lp_id');
		$vid = Input::get('vid');
		$tid = Input::get('tid');

		$var = $this->variant->find($vid);
		$landing = $this->variant->getlandingname($lp_id);
		$destinationPath = 'sliders/'. $landing.'/'.$var->id.'/';
		
		$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
		$uploadSuccess = Input::file('file')->move($destinationPath, $filename);
		
		$fullpath = $destinationPath.$filename; 
		$sid = $this->variant->insertslider($tid, $vid, $landing); 
		
		$asdf = $this->variant->insertimages($sid, $fullpath, $filename);
		
		if( $uploadSuccess ) {
		   return Response::json('success', 200); // or do a redirect with some message that file was uploaded
		} else {
		   return Response::json('error', 400);
		}
	}
	public function deleteSlide(){
			$slideid = Input::get('slide');
				$delete = $this->variant->deleteslide($slideid);
				 return Response::json('error', 200);
		}
	public function orderSlides() {
      // Get the input from the jquery post
      $updateRecordsArray = Input::get('order');
        $i = 1;

        // Loop though the <li>
        foreach ($updateRecordsArray as $recordID) {

            DB::table('images_to_sliders')->where('id', '=', $recordID)->update(array('order' => $i));
            $i++;
        }

        return Response::json('ok');  
}

}
