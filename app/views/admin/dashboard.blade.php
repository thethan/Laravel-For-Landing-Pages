@extends('admin.layouts.default')

@section('content')
    <h2>Dashboard</h2>
    <div class="col-md-3">
    	<a class=""></a>
        <h3 class="">
        	Templates
        </h3>
      {{  link_to_action('TemplatesController@index',  'Templates',  $parameters = array(), $attributes = array('class'=>'btn btn-info') ) }}
    </div>
    <div class="col-md-3">
    	<a class=""></a>
        <h3 class="">
        	Landing Pages
        </h3>
      {{  link_to_action('LandingPagesController@index',  'Landing Pages', $parameters = array(),  $attributes = array('class'=>'btn btn-info'), $secure=null ) }}
    </div>
     <div class="col-md-3">
    	<a class=""></a>
        <h3 class="">
        	Statistics
        </h3>
      {{  link_to_action('StatsController@index',  'Stats',  $parameters = array(), $attributes = array('class'=>'btn btn-info') ) }}
    </div>
@endsection
