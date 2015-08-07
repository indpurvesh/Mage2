@extends('admin.master')

@section('content')

    <div class="content">
        <h1>Entity Edit Form</h1>

        <div class="add_form">
            {!! Form::model($category,array('method' => 'PATCH', 'url' => url('/admin/category',$category->id)) ) !!}

            @include('admin.category._edit')

            {!! Form::hidden('id') !!}

            {!! Form::close() !!}

        </div>

    </div>
@endsection