<?php

class Image_thumbnail extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		't_id' => 'required',
		'title' => 'required',
		'img' => 'required'
	);
}
