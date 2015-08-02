@extends('admin.master')
 
@section('content')

<div class="content">
	<h1>Page Add Form</h1>
		
	<div class="col-md-5 product_add_form">
		{!! Form::open(array('files' => 'true', 'url' => url('admin/pages'))) !!}
		
		@include('admin.pages._page_edit')
		
		
		{!! Form::close() !!}
	
	</div>
   
</div>
@endsection