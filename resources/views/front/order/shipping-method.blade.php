@extends('front.master')


@section('content')

 {!! Form::open(array( 'url' => url('order'))) !!}
<ul class="list-group">
    @foreach($config['shipping'] as $shippingIdentifier => $shipping)
    <li class="list-group-item">
        <input type="radio" value="{{ $shippingIdentifier }}" name="shipping_type"/> <label>{{ $shipping['label'] }}</label>
    </li>
    @endforeach
    
     {!! Form::hidden('step','shipping') !!}
    {!! Form::close() !!}

</ul>

@endsection