@extends('admin.layouts.default')

@section('content')

<h1>{{ $landingpage->title }} Variants</h1>

<p>{{ link_to_route('variants.create', 'Add new variant', $lp_id) }}</p>

@if ($variants)
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th><button class="btn btn-primary btn-lg btn-modal" data-toggle="modal" data-target="#percentModal">Percent</button></th>
				<th>Variables</th>
				<th>Slider</th>                
				<th>Show</th>
              <th></th>
				
			</tr>
		</thead>

		<tbody>
			@foreach ($variants as $variant)
				<tr>
					
					<td>{{{ $variant->title }}}</td>
					

					<td><a href=# class="btn-modal" data-toggle="modal" data-target="#percentModal">{{ $variant->percent }}</a></td>
                    <td>{{ link_to_route('variants.vartovar', 'Variables', array('vid' => $variant->id, 'tid' => $variant->t_id ), array('class' => 'btn btn-info')) }}</td>
                    <td>{{ link_to_route('variants.sliderimg', 'Slider', array('vid' => $variant->id), array('class' => 'btn btn-info')) }}</td>
                    <td>{{ link_to_route('variants.show', 'Show', array('vid' => $variant->id), array('class' => 'btn btn-success')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'post', 'route' => array('variants.destroy', $variant->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
    <!-- Modal -->
<div class="modal fade" id="percentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="percent/variants" id="percentForm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">{{ $landingpage->title }}</h4>
      </div>
      <div class="modal-body">
      
      		<input type="hidden" name="landing" value="{{ $landingpage->id }}" />
      		<div class="alert alert-danger">
            	Percent Does not equeal 100%
            </div>
        @foreach($variants as $variant)
        	 <div class="form-group">
            	<label for="variant-{{$variant->id}}" class="col-sm-5 control-label">{{ $variant->title }}</label>
                <div class="col-sm-7">
                	<input class="form-control summ" name="variant-{{$variant->id}}" value="{{ $variant->percent }}" />
                </div>
            </div>
        @endforeach
        <input type="hidden" class="onehundin" value=""/>
       
        
        
      </div>
      <div class="modal-footer">
      		<h3 class="pull-right">Total: <span class="onehund"></span></h3>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="formPercent">Save changes</button>
      </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@else
	There are no variants
@endif


@stop


@section('scripts')
	<script>
    	
			$('#percentModal').modal('hide');
			$('a.btn-modal').modal('hide');
			$('.alert').hide();
			$('form').each(function(){
				  var totalPoints = 0;
				  $(this).find('input.summ').each(function(){
					totalPoints += parseInt($(this).val()); //<==== a catch  in here !! read below
				  });
				  $('.onehund').html(totalPoints);
				   $('.onehundin').val(totalPoints);
				});


		
    </script>
   <script>
   $(document).ready(function(){
	$( ".summ" ).blur(function(){
			var sum = 0;
			$('input.summ').each(function() {
        		sum += Number($(this).val());
    		});
			$('.onehund').html(sum);
			$('.onehundin').val(sum);
		});
				$('#formPercent').click(function(){
					var sum = parseInt($('.onehundin').val());
					if(sum !== 100){
							$('.alert').show();
						}
						else {
							//e.preventDefault();
							var data = $('#percentForm').serialize();
								 $.ajax({
								  type: "POST",
								  url: "<?php echo route('varaiants.percent');?>", //i put my public in "localhost/laravel/public/"
								  cache: false,
								  data: data,
								  success: function(data) {
									$('.alert').hide();
									$('#percentModal').modal('hide');
									location.reload();
									//return alert(data);
								  },
								  error: function(response) {
									return alert("ERROR:" + response.responseText);
								  }
								});
									
							}
				});
   });	
    
</script> 
@stop