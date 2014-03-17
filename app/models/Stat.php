<?php

class Stat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'vid' => 'required',
		'hit' => 'required',
		'convert' => 'required'
	);
}
