@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			
			
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Blog Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($variant)){{ action('VariantsController@assignvartext' , $variant->id) }}@endif" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->
			<!-- General tab -->
		<div>
        <?php // print_r($variables); ?>
        
				<!-- Post Title -->
              <?php foreach($variables as $var) { ?>
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
                    <div class="col-md-12">
                    <?php  print $var; ?>
					</div>
				</div>
				<!-- ./ post title -->
				<?php } ?>
			</div>
			
			<?php echo $minmax ;?>
		<input type="hidden" name="vid" value="{{$variant->id}}" />
		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<element class="btn-cancel">Cancel</element>
				<!-- <button type="reset" class="btn btn-default">Reset</button> -->
                
               <a href="{{ route('variants.sliderimg', array('vid' => $variant->id )) }}" class="btn btn-primary">Slider</a>
				<button type="submit" class="btn btn-success">Update</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop

@section('title')
	{{ $title }}
@stop