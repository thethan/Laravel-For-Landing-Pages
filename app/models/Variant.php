<?php

class Variant extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'title' => 'required',
		'lp_id' => 'required',
		
		'percent' => 'required'
	);
	
	public function template(){
		
		return $this->hasOne('template', 't_id');
		
	}
	
	public function landingpage(){
		
		return $this->hasOne('landingpage', 'lp_id');
		
	}
	
	public function variables(){
		return $this->hasMany('variables', 't_id');
	}
	
	public function getVariantVariables($variant){
		return DB::table('variables_variants')
			->where('variant_id', '=', $variant)
			->join('variables', 'variables_variants.variable_id','=','variables.id')
			->join('varvar_texts', 'variables_variants.id', '=', 'varvar_texts.varvar_id')
			//->join('types', 'variables.id','=','types.id')
			->get(); 
	}
	
	public function countvariables($variant){
			return DB::table('variables_variants')->where('variant_id', '=', $variant)->count(); 
		}
	
	public function selectFromTemplate($temp, $variant){
		
		$variables =  DB::table('variables')->where('t_id', '=', $temp)->get();
		
		foreach($variables as $var){
			
			$varvar = new Variables_variant();
			
			$varvar->variable_id = $var->id;
			
			$varvar->type_id = $var->type;
			
			$varvar->variant_id = $variant;
			
			$varvar->save();
			
			$id = $varvar->id;
			
			$varvartexts = new Varvar_text();
			
			$varvartexts->varvar_id = $id;
			
			$varvartexts->type_id = $var->type;
			
			$varvartexts->save();
			
		//	DB::table('varvar_texts')->insert(array('varvar_id' => $id, 'type_id'=>$var->type));
		}
		
		//print_r($variables);
		return Variant::formtype($variant);
	}
	
	
	public function formType($variant){
		$variables = array();
		$class = 'col-md-12 col-xs-12';
		$vars = $this->getVariantVariables($variant);
		
		foreach($vars as $var){
			$type = $var->type_id;
			$rawname = $var->name;
			$name = str_replace('_',' ',$rawname);
			$vartext = $var->vartext;
			
			switch($type){
					case 1:	
						$form = '<label class="control-label" for="'.$var->name.'">'.$name.'</label><input id="'.$var->name.'" class="'.$class.'" class="form-control"  type="text" name="variableid-'.$var->id.'" value="'.$vartext.'">';
						break;
					case 2:	
						$form = '<label class="control-label" for="'.$var->name.'">'.$name.'</label><input id="'.$var->name.'" class="'.$class.'" type="hidden" name="variableid-'.$var->id.'" value="0" />
									<input type="checkbox" name="subcheck" value="1" />';
						break;
					case 3:	
						$form = '<label class="control-label" for="'.$var->name.'">'.$name.'</label><textarea id="'.$var->name.'" class="'.$class.' full-width wysi" name="variableid-'.$var->id.'">'.$var->vartext.'</textarea>';
						break;					
					case 4:	
						$form = '<label class="control-label" for="'.$var->name.'">'.$name.'</label><input id="'.$var->name.'" class="'.$class.'" name="variableid-'.$var->id.'" value="'.$var->vartext.'" />';
						break;
					case 5:	
						$form = '<label class="control-label" for="'.$var->name.'">'.$name.'</label><input id="'.$var->name.'" class="'.$class.'" type="file" name="variableid-'.$var->id.'" value="'.$vartext.'">';
						break;
					case 6:	
						$form = '<label class="control-label" for="'.$var->name.'">'.$name.'</label><input id="'.$var->name.'" class="'.$class.'" type="file" name="variableid-'.$var->id.'" value="'.$vartext.'">';
						break;	
						
				default:
					$form = '<label class="control-label" for="'.$var->name.'">'.$name.'</label><input id="'.$var->name.'" class="'.$class.'" class="form-control"  type="text" name="variableid-'.$var->id.'" value="'.$vartext.'">';
				break;									
						
				}
			$variables[] = $form;
		}
		
		return $variables;
	}
	
	public function getvartype($varid){
		$type = DB::table('varvar_texts')->where('varvar_id', '=', $varid)->select('type_id')->get();
		
		return $type;
	
	}
	
	public function minvar($vid){
		$min = DB::table('variables_variants')->where('variant_id', '=', $vid)->min('id');
		
		return $min;
			
	}
	public function maxvar($vid){
		$max = DB::table('variables_variants')->where('variant_id', '=', $vid)->max('id');
		
		return $max;
			
	}
	
	public function hiddenfield($vid){
		$max = $this->maxvar($vid);
		$min = $this->minvar($vid);
		$form = '<input type="hidden" name="min" value="'.$min.'" /><input type="hidden" name="max" value="'.$max.'" />';
		return $form;
	}
	
	public function moveFile($filename, $destinationPath){
		$vartext = $destinationPath.'/'.$filename;
		return  $vartext;
		
	}
	
	public function storeVartexts($id, $vartexts){
		
		$varvar = DB::table('varvar_texts')->where('varvar_id', $id)->update(array('vartext' => $vartexts));
	
		if($varvar){
	
			return true;
	
		} else {
	
			return false;
	
		}
	}
	
	public function getfoldername($vid){

		$variant = Variant::find($vid);
		
		$name = str_replace(' ', '_',$variant->name);
		
		$name = strtolower($name);
		
		$landingname = Variant::getlandingname($variant->id);
		
		return $landingname.'/'.$name;
	
		
	}
	
	public function getlandingname($lpid){
		$landing = DB::table('landing_pages')->where('id', '=', $lpid)->first();
		
		$slug = $landing->slug;
		return $slug;
		
	}
	public function getlandingfull($lpid){
		$landing = DB::table('landing_pages')->where('id', '=', $lpid)->first();
		
		$slug = $landing->title;
		return $slug;
		
	}
	
	public function getlandingvariant($lpid){
		$variants = DB::table('variants')->where('lp_id','=', $lpid)->get();
		return $variants;
		}
	
	public function percent($varid, $value){
		return DB::table('variants')->where('id', $varid)->update( array('percent' => $value));
		}
	public function getblade($tempid){
			$blade = DB::table('bladetemps')->where('id', '=', $tempid)->select('file as blade')->first();
			return $blade;
		}
	public function getsliderimages($varid){
			$images = DB::table('sliders')->where('v_id','=', $varid)
						->join('images_to_sliders', 'images_to_sliders.s_id','=', 'sliders.id')
						->join('images', 'images_to_sliders.t_id','=','images.id')
						->orderBy('order', 'asc')
						->get();
			return $images;
		}
	
	public function insertimages($sid, $fullpath, $name){
			$images = new Image();
			$images->path = $fullpath;
			$images->alt = $name;
			$images->name = $name;
			$images->save();
			$imageid = $images->id;
			
			$its = new Images_to_slider();
			
			$its->s_id = $sid;
			$its->t_id = $imageid;
			$its->save();
			
			return true;
		}
	
	public function insertslider($tid, $vid, $name){
			$slider = new Slider();
			$slider->name = $name;
			$slider->t_id = $tid;
			$slider->v_id = $vid;
			$slider->save();
			return $slider->id;
			
		}
		
	public function deleteslide($id){

			
			DB::table('sliders')->where('id','=', $id)->delete();
			DB::table('images_to_sliders')->where('id','=', $id)->delete();
			
			return true;
		}
	
/*	
	public function selectFromTemplate($temp){
		return DB::table('variables')->where('t_id', '=', $temp)->get();
	}
*/
}
