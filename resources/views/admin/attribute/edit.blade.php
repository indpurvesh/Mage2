@extends('admin.master')
 
@section('content')

<div class="content">
	<h1>Entity Edit Form</h1>
		
	<div class="product_add_form">
		{!! Form::model($attribute,array('method' => 'PATCH', 
                                                 'url' => url('/admin/attribute',$attribute->id)) ) !!}
		
		 @include('admin.attribute._edit')
		
		{!! Form::hidden('id') !!}
		
		{!! Form::close() !!}
	
	</div>
   
</div>
@endsection