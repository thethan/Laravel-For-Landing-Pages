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

<div>
  <table id='grid'></table>
  <div id='pager'></div>
  <table id='pivotgrid'></table>
  <div id='pivotpager'></div>
</div>	
@stop

@section('styles')

<link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/themes/redmond/jquery-ui-1.8.2.custom.css') }}}" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/themes/ui.jqgrid.css') }}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/themes/ui.multiselect.css') }}}" />
@stop



{{-- Scripts --}}
@section('scripts')
  <script src="{{{ asset('assets/js/jquery-1.11.0.min.js') }}}" type="text/javascript"></script> 
    <script src="{{{ asset('assets/js/jquery.jqGrid.src.js') }}}" type="text/javascript"></script> 
    <script src="{{{ asset('assets/js/grid.locale-en.js') }}}"></script>
    <script src=" {{{ asset('assets/js/jquery-ui-custom.min.js') }}}" type="text/javascript"></script> 
	<script type="text/javascript">
jQuery(document).ready(function(){	
 
 
	jQuery("#grid").jqGrid(
	{
		url : "http://go.lafilm.edu/admin/users/data",
		loadonce: true,
		colModel : [
			{ name: "LandingPages"},
			{ name: "LpID" },
			{ name: "Slug"},

		],
		onSelectRow: function (id) {
    	// get data from the column 'userCode'
    	var id = $(this).jqGrid('getCell', id,  'LpID');
		var LP = $(this).jqGrid('getCell', id,  'LandingPages');
		clearGrid('pivotgrid');
    	creategrid(id, LP);
		},
		datatype:"json",
		width: 700,
		rowNum : 100,
		pager: "#pager",
		caption: "Grid"
	});
	
	function creategrid(id, LP){
		jQuery("#pivotgrid").jqGrid('jqPivot', 
	'http://go.lafilm.edu/admin/users/data/'+id,
	// pivot options
	{
		xDimension : [
                   {dataName: 'VarTitle', label : 'Title', width: 90}, 
                   
                ],
		yDimension : [
                   {dataName: 'Percent'},
				   	
                ],
		aggregates : [
			{member : 'Hit', aggregator : 'sum', width:50, label:'Hit'},
			{member : 'Convert', aggregator : 'sum', width:50, label:'Convert'},
			
		],
		rowTotals: true,
		colTotals : true
 
	}, 
	// grid options
	{
		width: 900, 
		rowNum : 100,
		pager: "#pivotpager",
		caption: LP
	}); /*
		jQuery("#grid").jqGrid('jqPivot', 
	'http://landingv1.local/admin/users/data',
	// pivot options
	{
		xDimension : [
                   {dataName: 'CategoryName', label : 'Category', width: 90}, 
                   {dataName: 'ProductName', label : 'Product', width:90}
                ],
		yDimension : [
                   {dataName: 'Country'}
                ],
		aggregates : [
			{member : 'Price', aggregator : 'sum', width:50, label:'Sum'},
			{member : 'Quantity', aggregator : 'sum', width:50, label:'Qty'}
		],
		rowTotals: true,
		colTotals : true
 
	}, 
	// grid options
	{
		width: 700,
		rowNum : 10,
		pager: "#pager",
		caption: "Amounts and quantity by category and product"
	});
	*/
		
		};
		
	function clearGrid(id)
	{
		$('#'+id).GridUnload();
	}
	/*
	jQuery("#grid").jqGrid('jqPivot', 
	'http://landingv1.local/admin/users/data',
	// pivot options
	{
		xDimension : [
                   {dataName: 'CategoryName', label : 'Category', width: 90}, 
                   {dataName: 'ProductName', label : 'Product', width:90}
                ],
		yDimension : [
                   {dataName: 'Country'}
                ],
		aggregates : [
			{member : 'Price', aggregator : 'sum', width:50, label:'Sum'},
			{member : 'Quantity', aggregator : 'sum', width:50, label:'Qty'}
		],
		rowTotals: true,
		colTotals : true
 
	}, 
	// grid options
	{
		width: 700,
		rowNum : 10,
		pager: "#pager",
		caption: "Amounts and quantity by category and product"
	});
	*/
});
</script>
@stop