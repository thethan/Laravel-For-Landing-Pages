@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}

			<div class="pull-right">
				<a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

	<table id="users" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.username') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.email') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.roles') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.activated') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
@stop

@section('styles')

<link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/themes/redmond/jquery-ui-1.8.2.custom.css') }}}" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/themes/ui.jqgrid.css') }}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/themes/ui.multiselect.css') }}}" />
@stop



{{-- Scripts --}}
@section('scripts')
  <script src="{{{ asset('assets/js/jquery.min.js') }}}" type="text/javascript"></script> 
    <script src="{{{ asset('assets/js/jquery.jqGrid.min.js') }}}" type="text/javascript"></script> 
    <script src=" {{{ asset('assets/js/jquery-ui-custom.min.js') }}}" type="text/javascript"></script> 
	<script type="text/javascript">
		$(document).ready(function() {
            $('#users').jqGrid({
				//url: "{{ URL::to('admin/users/data') }}",
				data: '[{"id":"1","username":"ethan","email":"etotten@lafilm.edu","rolename":"admin","confirmed":"1","created":"2014-01-23 01:47:07"},{"id":"2","username":"lafs","email":"etotten@lafilm.edu","rolename":"admin","confirmed":"1","created":"2014-01-23 01:47:07"},{"id":"3","username":"cloebs","email":"cloebs@lafilm.edu","rolename":"admin","confirmed":"1","created":"2014-02-26 06:55:45"}]',
				datatype: "json",
				colNames:['id','created', 'username', 'rolename','email'],
				colModel:[
					{name:'id',index:'id', width:55, editable:true, sorttype:'int',summaryType:'count', summaryTpl : '({0}) total'},
					{name:'created',index:'created', width:90, sorttype:'date', formatter:'date', datefmt:'d/m/Y'},
					{name:'username',index:'username', sorttype:'string', width:100},
					{name:'rolename',index:'rolename', sorttype:'string', width:70},
					{name:'email',index:'email', sorttype:'string', width:100},
			
		
					
				],
				rowNum:10,
				rowList:[10,20,30],
				height: 'auto',
				pager: '#p48remote',
				viewrecords: true,
				sortorder: "desc",
				caption:"Grouping with remote data",
				grouping: true,
				groupingView : {
					groupField : ['name'],
					groupColumnShow : [true],
					groupText : ['<b>{0}</b>'],
					groupCollapse : false,
					groupOrder: ['asc'],
					groupSummary : [true],
					groupDataSorted : true
				}
				
			});
			jQuery("#48remote").jqGrid('navGrid','#p48remote',{add:false,edit:false,del:false});
        });
	</script>
@stop