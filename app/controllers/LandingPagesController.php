<?php

class LandingPagesController extends BaseController {

	/**
	 * Landing_page Repository
	 *
	 * @var Landing_page
	 */
	protected $landingpage;

	public function __construct(LandingPage $landingpage)
	{
		$this->landingpage = $landingpage;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$source = 'Landing';
		
		$landingpages = $this->landingpage->all();
	
		return View::make('landing_pages.index', compact('landingpages'), compact('source'));
	}
	
	public function getPage($slug){
		
	}
	
	public function getVariants($id){
		
		$lp_id = $id;
		
		$landingpage = $this->landingpage->where('id', '=', $id)->first();
		
		$variants = $landingpage->variants($lp_id);
		
		return View::make('landing_pages.view_variants', compact('lp_id','variants', 'landingpage'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('landing_pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, LandingPage::$rules);

		if ($validation->passes())
		{
			$this->landingpage->create($input);

			return Redirect::route('landingpages.index');
		}

		return Redirect::route('landingpages.create')
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
		$landingpage = $this->landingpage->findOrFail($id);

		return View::make('landing_pages.show', compact('landingpage'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$landingpage = $this->landingpage->find($id);

		if (is_null($landingpage))
		{
			return Redirect::route('landing_pages.index');
		}

		return View::make('landing_pages.edit', compact('landingpage'));
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
		$validation = Validator::make($input, Landing_page::$rules);

		if ($validation->passes())
		{
			$landing_page = $this->landing_page->find($id);
			$landing_page->update($input);

			return Redirect::route('landing_pages.show', $id);
		}

		return Redirect::route('landing_pages.edit', $id)
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
		$this->landingpage->find($id)->delete();

		return Redirect::route('landingpages.index');
	}
	
	public function getView($slug)
	{

		$landingpage = $this->landingpage->where('slug', '=', $slug)->first();
		
		
		
		// Check if the blog post exists
		if (is_null($landingpage))
		{
			// If we ended up in here, it means that
			// a page or a blog post didn't exist.
			// So, this means that it is time for
			// 404 error page.
			//return App::abort(404);
			return 'DAMN!';
		}

		// Get variants
		$variants = $landingpage->variants($landingpage->id);
		
		$lpcount = $this->landingpage->sumallhits($landingpage->id);
		if($lpcount == 0){ $lpcount = 100;}
		$v = array();
		foreach($variants as $var){
			$hit = $this->landingpage->sumhits($var->id);

			$varperc = $hit/$lpcount;

			$percent = $var->percent / 100;

			if($varperc < $percent){
				$vid = $var->id;
				break;
				
				}
			$v[] = $var->id;

			}
		if(empty($vid)){
				$key = array_rand($v);
				$vid = $v[$key];	
			}
		
		//echo $vid;
		
		$varclass = new Variant();
		$variant = $varclass->findOrFail($vid);
		$tempid = $variant->t_id;
		
		$variables = $varclass->getVariantVariables($vid);
		$key = array();
		$value = array();
		
		foreach($variables as $var){
				$key[] = str_replace(' ','',$var->name);
				$value[] = $var->vartext;
			}
			
			$variab = array_combine($key, $value);
			
			$bladete = $varclass->getblade($tempid);
			
			$file =  $bladete->blade;
			$filer = str_replace('.blade.php','',$file);
			$view = 'uploads.'.$filer;
			 
			$images = $varclass->getsliderimages($vid); 
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
			$data = array('id'=>$variant->id, 'lp_id'=>$variant->lp_id);
		
		// return View::make($view)->with('variables', $variab);
		return View::make($view)->with('variables', $variab)->with('variant', $variant)->with('sliderimages', $sliderimages)	->with('slideritems', $slideritems)
									->with('sliderbuttons', $sliderbuttons)->with('slug', $slug)->nest('form', 'forms.form', $data);

        // Get current user and check permission

        

		// Show the page
		//return View::make('site/blog/view_post', compact('post', 'comments', 'canComment'));
	}

}
