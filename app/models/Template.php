<?php

class Template extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);
	
	public static function getImages(){
		$templates = DB::table('templates')
		->join('image_thumbnails', 'templates.id', '=', 'image_thumbnails.t_id')
		->get();
		return $templates;
	}
}
