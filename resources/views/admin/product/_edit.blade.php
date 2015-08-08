<div class="tab-content">
    <div class="tab-pane fade in active" id="tab1">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    {!!  Form::label('name', 'Name')  !!}
                    {!!  Form::text('name',null,array('class'=>'form-control', 'autofocus' => true))  !!}
                </div>

                <div class="form-group">
                    {!!  Form::label('slug', 'Slug')  !!}
                    {!!  Form::text('slug',null,array('class'=>'form-control', 'disabled' => true))  !!}
                </div>

                <div class="form-group">
                    {!!  Form::label('sku', 'Sku')  !!}
                    {!!  Form::text('sku',null,array('class'=>'form-control'))  !!}
                </div>

                <div class="form-group">
                    {!!  Form::label('brief_description', 'Brief Description')  !!}
                    {!!  Form::text('brief_description',null,array('class'=>'form-control'))  !!}
                </div>

                <div class="form-group">
                    {!!  Form::label('description', 'Description')  !!}
                    {!!  Form::textarea('description',null,array('class'=>'form-control'))  !!}
                </div>
                <div class="image_list">

                    <div class='btn btn-default btn-file image glyphicon glyphicon-camera'>
                       
                        <input class="" name='file[gfdgdf]' type='file' value="" />
                    </div>


                </div>

                <div class="form-group">
                    {!!  Form::label('qty', 'Qty')  !!}
                    {!!  Form::text('qty',null,array('class'=>'form-control'))  !!}
                </div>

                <div class="form-group">
                    {!! Form::label('manage_stock', 'Manage Stock') !!}
                    {!!  Form::select('manage_stock',[1 => 'Yes', 0 => 'No'], null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('low_stock_notification', 'Low Stock Notification') !!}
                    {!!  Form::select('low_stock_notification',[0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>

            <?php  $id = (isset($product->id) ? $product->id : null ); ?>
                @foreach($entity->attributes()->get() as $attribute)
                    {!! AdminAttribute::renderProductAttribute($attribute, $id) !!}
                @endforeach

                @include('admin._display_errors')
            </div>
        </div>
    </div> 
    <div class="tab-pane fade" id="tab2">
        Tab 2 content
    </div>
    <div class="tab-pane fade" id="tab3">
        Tab 3 content
    </div>
</div>