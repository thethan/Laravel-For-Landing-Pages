<?php

class Variable extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		's_id' => 'required',
		't_id' => 'required',
		'type' => 'required'
	);
	
	public static function formType($varid, $type, $class, $name, $vartext){
		switch($type){
				case 1:	
					$form = '<label>'.$name.'</label><input class="'.$class.'" type="text" name="variableid-'.$varid.'" value="'.$name.'">';
					break;
				case 2:	
					$form = '<label>'.$name.'</label><input class="'.$class.'" type="hidden" name="variableid-'.$varid.'" value="0" />
								<input type="checkbox" name="subcheck" value="1" />';
					break;
				case 3:	
					$form = '<label>'.$name.'</label><textarea class="'.$class.'" name="variableid-'.$varid.'">'.$vartext.'</textarea>';
					break;					
				case 4:	
					$form = '<label>'.$name.'</label><input class="'.$class.'" name="variableid-'.$varid.'" value="';
					break;
				case 5:	
					$form = '<label>'.$name.'</label><input class="'.$class.'" type="file" name="variableid-'.$varid.'" value="'.$vartext.'">';
					break;
				case 6:	
					$form = '<label>'.$name.'</label><input class="'.$class.'" type="file" name="variableid-'.$varid.'" value="'.$vartext.'">';
					break;										
					
			}
		
		return $form;
	}
}
