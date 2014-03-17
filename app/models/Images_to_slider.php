<?php

class Images_to_slider extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'i_id' => 'required'
	);
}
