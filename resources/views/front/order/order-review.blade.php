@extends('front.master')


@section('content')
    <h1>Checkout</h1>

    {!! Form::model($data,array( 'url' => url('order'))) !!}

    <div class="col-md-12">
        <h3>Billing Information</h3>
        
        <div class="form-group">
            {!!  Form::label('name', 'Name')  !!}
            {!!  Form::text('user[name]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('companyname', 'Company Name')  !!}
            {!!  Form::text('user[companyname]',null,array('class'=>'form-control'))  !!}
        </div>

        @if(!app('front.auth')->check())
        <div class="form-group">
            {!!  Form::label('email', 'Email')  !!}
            {!!  Form::text('user[email]',null,array('class'=>'form-control'))  !!}
        </div>
        <div class="form-group">
            {!!  Form::label('password', 'Password')  !!}
            {!!  Form::text('user[password]',null,array('class'=>'form-control'))  !!}
        </div>
        @endif

        <div class="form-group">
            {!!  Form::label('number', 'Number')  !!}
            {!!  Form::text('billing[number]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('street', 'Street')  !!}
            {!!  Form::text('billing[street]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('area', 'Area')  !!}
            {!!  Form::text('billing[area]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('city', 'City')  !!}
            {!!  Form::text('billing[city]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('post_code', 'Post Code')  !!}
            {!!  Form::text('billing[post_code]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('country', 'Country')  !!}
            {!!  Form::text('billing[country]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!! Form::hidden('step','shipping') !!}
            {!! Form::button('continue',['class'=>'btn btn-primary','onclick' => 'jQuery(this).parents("form:first").submit()']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection