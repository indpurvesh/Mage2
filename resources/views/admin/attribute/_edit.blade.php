<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            {!!  Form::label('name', 'Name')  !!}
            {!!  Form::text('name',null,array('class'=>'form-control', 'autofocus' => true))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('key', 'Key')  !!}
            {!!  Form::text('key',null,array('class'=>'form-control'))  !!}
        </div>


        <div class="form-group">
            {!!  Form::label('entity_id', 'Entity')  !!}
            {!!  Form::select('entity_id', $entities , null , array('class'=>'form-control'))  !!}
        </div>

        <div class="form-group">
            {!!  Form::label('type', 'Type')  !!}
            {!!  Form::select('type', $types , null ,array('class'=>'form-control'))  !!}
        </div>
        @include('admin._display_errors')
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container-fluid">

            <div class="attribute_key_value_row">
                <div class="row">
                    <div class="col-md-4 key">
                            <label>Key</label>
                            <input type="text" name="select[{{ $attributeKey }}][key][]" class="form-control" placeholder="Key..">
                    </div>
                    <div class="col-md-4 value">
                        <label>Value</label>
                        <input type="text" name="select[{{ $attributeKey }}][value][]" class="form-control" placeholder="Value">
                    </div>
                    <div class="col-md-4 delete">
                        <label>&nbsp;</label>
                        <a href="" class="btn btn-danger form-control">Delete</a>
                    </div>
                </div>
            </div>

            <br/>
            <div class="add-button">
                <button type="Add" class="btn btn-primary add_custom_button">Add </button>
            </div>
        </div>

    </div>

</div>


<div class="form-group">
    {!!  Form::button('Save',array(	'onclick' => 'jQuery(".product_add_form form").submit()',
    'class' => 'btn btn-primary' ))  !!}
</div>