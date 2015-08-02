@extends('admin.layouts.master')
 
@section('content')

<div class="content">
	<h1>Products Add Form</h1>
		
	<div class="product_add_form">
		{!! Form::model($product,array('method' => 'PATCH', 'url' => url('/admin/products',$product->id) , 'files' => 'true') ) !!}
		
		 @include('admin.products._product_edit')
		
		{!! Form::hidden('id') !!}
		
		{!! Form::close() !!}
	
	</div>
   
</div>
@endsection