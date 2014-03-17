<?php

class Image extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'alt' => 'required',
		'path' => 'required'
	);
}
