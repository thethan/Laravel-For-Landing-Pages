<?php

class LandingPage extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'title' => 'required',
		'slug' => 'required'
	);
	
	public function variants($lp){
		
		return DB::table('variants')->where('lp_id','=',$lp)->orderBy('created_at', 'ASC')->get();
	}
	
	public function checkstats(){
		// DB::table('')->join
		}
		
	public function countstats($id){
			$count = DB::table('stats_accum')->where('lp_id', '=', $id)->get();
			return $count;
		}
		
	public function sumhits($vid){
			$hit = DB::table('stats')->where('vid', '=', $vid)->sum('hit');

			return $hit;
		}
	public function sumallhits($lp){
			$hit = DB::table('stats')->where('lp_id', '=', $lp)->sum('hit');
			return $hit;
		}
		
	public function sumconverts($vid){
			return DB::table('stats')->where('vid', '=', $vid)->sum('converts');
		}
		
	public function addHitsConv($hit, $conv, $vid, $lp){
			$sa = new Stats_Accums();
			$sa->hit = $hit;
			$sa->convert = $conv;
			$sa->lp_id = $lp;
			$sa->vi = $vid;
			$sa->save();
			return $sa;
		}
}
