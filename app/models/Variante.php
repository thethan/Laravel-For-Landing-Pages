<?php

class Variante extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'title' => 'required',
		'lp_id' => 'required',
		't_id' => 'required',
		'percent' => 'required'
	);
	
	public function template(){
		
		return $this->belongsTo('template', 't_id');

	}
}
