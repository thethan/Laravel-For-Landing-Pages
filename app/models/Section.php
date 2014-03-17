<?php

class Section extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		't_id' => 'required'
	);
	
	public function variables(){
		return $this->hasMany('Variables', 's_id');
	}
}
