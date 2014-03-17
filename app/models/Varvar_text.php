<?php

class Varvar_text extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'varvar_id' => 'required',
		'type_id' => 'required',
		'vartext' => 'required'
	);
}
