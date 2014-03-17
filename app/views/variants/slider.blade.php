@extends('admin.layouts.default')

@section('content')

<h1>Upload Images for {{ $title }}</h1>

	<div id="myAlert" class="alert success fade" data-alert="alert">
  		<!-- rest of alert code goes here -->
	</div>
 	@if($images)
    	<ul class="row grid col-md-4">
    	@foreach($images as $image)
        	<li class="col-md-12 well tile" id="{{$image->id}}" data-slide="{{ $image->id }}" style="background-size:100%; background-image:url('{{{ asset($image->path) }}}');">
            	<span class="glyphicon glyphicon-trash pull-right delete-image" ></span>
            </li>
        @endforeach	
        </ul>	
   	@endif


    	<div class="col-md-8">
    {{ Form::open(array('action' => 'VariantsController@postImage', 'file' => true, 'enctype' => 'multipart/form-data', 'class'=>'dropzone', 'id'=>'mydropzone' )) }}	<h3>Touch here to Upload More images</h3>
		{{ Form::token() }}
        {{ Form::hidden('tid', $tid) }}
        {{ Form::hidden('vid', $id) }}
         {{ Form::hidden('lp_id', $lp_id) }}
		
	{{ Form::close() }}
		</div>
	</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

<div class="row">
		{{ link_to_route('variants.vartovar', 'Variables', array('vid' => $id, 'tid' => $tid ), array('class' => 'btn btn-info')) }}
		{{ link_to_route('variants.sliderimg', 'Slider', array('vid' => $id), array('class' => 'btn btn-info')) }}
       {{ link_to_route('variants.show', 'Show', array('vid' => $id), array('class' => 'btn btn-success')) }}
    
</div>
@stop

@section('scripts')
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="{{{ asset('assets/js/dropzone.js') }}} "></script>
    <script>
		var myDropzone = new Dropzone('#mydropzone');
		myDropzone.on('complete', function () {
			var sec = 8
			//$('#mydropzone').text('The Window will reload in '+sec+' seconds');
			// window.setTimeout('location.reload()', 8000);
		});
		</script>
 <script>
		var orderurl = "{{ URL::route('sliders.order') }}";
    $(".grid").sortable({
        tolerance: 'pointer',
        revert: 'invalid',
        placeholder: ' well placeholder tile',
        forceHelperSize: true,
		  update: function() {
				var ord = $(this).sortable('toArray');
				console.log(ord);
				$.post(
					orderurl, {order: ord});
		}                         
	});
   


    </script>
    
   <script>
   		$(document).ready(function(e) {
            $('.delete-image').on('click', function(){
					var slideid = $(this).parent().data('slide');
					var url = "{{ route('sliders.delete') }}";
					var slide = {slide: + slideid };
					$.ajax({
							url: url,
							type: 'POST',
							data: slide,
							success: function(e){
								return location.reload();
								}
						});
				});
        });
   </script>
@stop

@section('styles')
		<link rel="stylesheet" href="{{{ asset('assets/css/dropzone.css') }}}" >
        <style>
        	.placeholder {
    border: 1px solid green;
    background-color: white;
    -webkit-box-shadow: 0px 0px 10px #888;
    -moz-box-shadow: 0px 0px 10px #888;
    box-shadow: 0px 0px 10px #888;
}
.tile {
    height: 100px;
}
.grid {
    margin-top: 1em;
}
.delete-image{
	
	cursor:pointer;
	}
.delete-image:hover {
	color:#fff;
	}
.fade {
  opacity: 0;
  -webkit-transition: opacity 0.15s linear;
  -moz-transition: opacity 0.15s linear;
  -o-transition: opacity 0.15s linear;
  transition: opacity 0.15s linear;
}
.fade.in {
  opacity: 1;
}
        </style>
@stop