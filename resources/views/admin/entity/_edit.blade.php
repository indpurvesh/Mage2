<div class="form-group">
    {!!  Form::label('name', 'Name')  !!}
    {!!  Form::text('name',null,array('class'=>'form-control', 'autofocus' => true));  !!}
</div>

<div class="form-group">
    {!!  Form::label('key', 'Key')  !!}
    {!!  Form::text('key',null,array('class'=>'form-control'));  !!}
</div>


@include('admin._display_errors')

<div class="form-group">
    {!!  Form::button('Save',array(	'onclick' => 'jQuery(".product_add_form form").submit()', 
    'class' => 'btn btn-primary' ))  !!}
</div>