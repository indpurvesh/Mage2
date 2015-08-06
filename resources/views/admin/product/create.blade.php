@extends('admin.master')

@section('content')
    <div class="content">
        <h1>Product Add Form</h1>
        {!! Form::open(array('url' => url('admin/product'))) !!}

        <div class=" container-fluid row">
            <div class="pull-right">
                <div class="form-group">
                    {!!  Form::button('Save',array(	'onclick' => 'jQuery(this).parents("form:first").submit()',
                    'class' => 'btn btn-primary' ))  !!}
                </div>
                <br/>
            </div>
        </div>
        <div class="container-fluid">

            <div class="col-md-2">
                <ul class="nav nav-tabs nav-pills nav-stacked">
                    <li><a href="#tab1" data-toggle="tab">Tab 1</a></li>
                    <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
                    <li><a href="#tab3" data-toggle="tab">Tab 3</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                @include('admin.product._edit',['isEdit', false])
            </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection