<?php

class Stats_accum extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'vid' => 'required',
		'hit' => 'required',
		'convert' => 'required',
		'lp_id' => 'required'
	);
}
