<div class="tab-content">
    <div class="tab-pane fade in active" id="tab1">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    {!!  Form::label('name', 'Name')  !!}
                    {!!  Form::text('name',null,array('class'=>'form-control', 'autofocus' => true))  !!}
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