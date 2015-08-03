@extends('admin.master')
 
@section('content')
<div class="content">
	<h1>Attribute Add Form</h1>
	<div class="col-md-5 product_add_form">
        {!! Form::open(array('url' => url('admin/entity'))) !!}

            @include('admin.attribute._edit')


        {!! Form::close() !!}
	</div>
</div>
@endsection