<?php

class Field extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		't_id' => 'required',
		'type' => 'required'
	);
}
