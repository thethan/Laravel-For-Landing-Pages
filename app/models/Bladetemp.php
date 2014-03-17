<?php

class Bladetemp extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		't_id' => 'required'
	);
}
