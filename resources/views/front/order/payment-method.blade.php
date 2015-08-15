@extends('front.master')


@section('content')
 {!! Form::open(array( 'url' => url('order'))) !!}
 
 <?php //var_dump($config['shipping']); ?>
<ul class="list-group">
    @foreach($config['payment'] as $paymentIdentifier => $payment)
    <li class="list-group-item">
        <input type="radio" value="{{ $paymentIdentifier }}" name="payment_type"/> <label>{{ $payment['label'] }}</label>
    </li>
    @endforeach

</ul>


 {!! Form::hidden('step','shipping') !!}
    {!! Form::close() !!}
@endsection