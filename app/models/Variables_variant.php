<?php

class Variables_variant extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'variant_id' => 'required',
		'variable_id' => 'required',
		'type_id' => 'required'
	);
}
