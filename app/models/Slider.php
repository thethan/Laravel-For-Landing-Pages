<?php

class Slider extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		't_id' => 'required',
		'v_id' => 'required'
	);
}
