@extends('admin.master')
 
@section('content')

<div class="content">
	<h1>Entity Edit Form</h1>
		
	<div class="product_add_form">
		{!! Form::model($entity,array('method' => 'PATCH', 'url' => url('/admin/entity',$entity->id)) ) !!}
		
		 @include('admin.entity._edit')
		
		{!! Form::hidden('id') !!}
		
		{!! Form::close() !!}
	
	</div>
   
</div>
@endsection