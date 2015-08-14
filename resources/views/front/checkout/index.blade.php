@extends('front.master')


@section('content')
    <h1>Checkout</h1>
<?php //var_dump($data); ?>
    {!! Form::model($data,array( 'url' => url('order'))) !!}

    <div class="col-md-4">
        <h3>Billing Information</h3>

        <div class="form-group">
            {!!  Form::label('firstname', 'First Name')  !!}
            {!!  Form::text('user[firstname]',null ,array('class'=>'form-control', 'autofocus' => true))  !!}
        </div>
        <div class="form-group">
            {!!  Form::label('lastname', 'Last Name')  !!}
            {!!  Form::text('user[lastname]',null,array('class'=>'form-control'))  !!}
        </div>
        <div class="form-group">
            {!!  Form::label('companyname', 'Company Name')  !!}
            {!!  Form::text('user[companyname]',null,array('class'=>'form-control'))  !!}
        </div>
        <div class="form-group">
            {!!  Form::label('email', 'Email')  !!}
            {!!  Form::text('user[email]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('address_1', 'Address 1')  !!}
            {!!  Form::text('billing[address_1]',null,array('class'=>'form-control'))  !!}
        </div>
        <div class="form-group">
            {!!  Form::label('address_2', 'Address 2')  !!}
            {!!  Form::text('billing[address_2]',null,array('class'=>'form-control'))  !!}
        </div>
        <div class="form-group">
            {!!  Form::label('city', 'City')  !!}
            {!!  Form::text('billing[city]',null,array('class'=>'form-control'))  !!}
        </div>
        <div class="form-group">
            {!!  Form::label('country', 'Country')  !!}
            {!!  Form::text('billing[country]',null,array('class'=>'form-control'))  !!}
        </div>
        
         <div class="form-group">
            {!!  Form::label('post_code', 'Post Code')  !!}
            {!!  Form::text('billing[post_code]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('password', 'Password')  !!}
            {!!  Form::text('user[password]',null,array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::checkbox('sameasshipping','1', 1, array('class'=>'sameasshipping'))  !!}
            <labe>Use Same Address For Shipping Address Test</labe>
        </div>

        <div class="shipping_address_wrap hide">
            <h4>Shipping Address</h4>

            <div class="form-group">
                {!!  Form::label('firstname', 'First Name')  !!}
                {!!  Form::text('shipping[firstname]',null,array('class'=>'form-control', 'autofocus' => true))  !!}
            </div>
            <div class="form-group">
                {!!  Form::label('lastname', 'Last Name')  !!}
                {!!  Form::text('shipping[lastname]',null,array('class'=>'form-control'))  !!}
            </div>
            <div class="form-group">
                {!!  Form::label('companyname', 'Company Name')  !!}
                {!!  Form::text('shipping[companyname]',null,array('class'=>'form-control'))  !!}
            </div>
            <div class="form-group">
                {!!  Form::label('email', 'Email')  !!}
                {!!  Form::text('shipping[email]',null,array('class'=>'form-control'))  !!}
            </div>

            <div class="form-group">
                {!!  Form::label('address_1', 'Address 1')  !!}
                {!!  Form::text('shipping[address1]',null,array('class'=>'form-control'))  !!}
            </div>
            <div class="form-group">
                {!!  Form::label('address_2', 'Address 2')  !!}
                {!!  Form::text('shipping[address2]',null,array('class'=>'form-control'))  !!}
            </div>
            <div class="form-group">
                {!!  Form::label('city', 'City')  !!}
                {!!  Form::text('shipping[city]',null,array('class'=>'form-control'))  !!}
            </div>
            <div class="form-group">
                {!!  Form::label('country', 'Country')  !!}
                {!!  Form::text('shipping[country]',null,array('class'=>'form-control'))  !!}
            </div>
        </div>

    </div>
    <div class="col-md-4">


        <h3>Shipping </h3>
        @include('front.checkout._shipping',array('config',$config));

        <h3>Payment </h3>
        @include('front.checkout._payment',array('config',$config));



        <div class='form-row'>
            <div class='col-xs-12 form-group required'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='4' type='text'>
            </div>
        </div>
        <div class='form-row'>
            <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number' size='20' type='text'>
            </div>
        </div>
        <div class='form-row'>
            <div class='col-xs-4 form-group cvc required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
            </div>
            <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
            </div>
            <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>�</label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
            </div>
        </div>

    </div>

    <div class="col-md-4">

        <?php $total = 0 ?>
        @foreach($cart as $item)


            <?php $total += $item['qty'] * $item['price']->first()->sale_price; ?>
            <div class="row">

                <div class="col-xs-3"><img class="img-responsive" width="100" src="{!! url($item['image']) !!}">
                </div>
                <div class="col-xs-4">
                    <h4 class="product-name"><strong>{!! $item['name'] !!}</strong></h4>
                </div>
                <div class="col-xs-4">
                    <div class="text-right">
                        <h6><strong>{!! $item['price']->first()->sale_price !!} <span
                                        class="text-muted">x</span></strong> {{ $item['qty']  }}</h6>
                    </div>
                </div>
            </div>
        @endforeach

        <hr/>
        <div class="form-group">
            {!!  Form::button('Place Order',array(	'onclick' => 'jQuery(this).parents("form:first").submit()',
            'class' => 'btn btn-primary' ))  !!}
        </div>
    </div>



    {!! Form::close() !!}
@endsection