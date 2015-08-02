<div class="form-group">
    {!!  Form::label('title', 'Title')  !!}
    {!!  Form::text('title',null,array('class'=>'form-control slugifytext', 'autofocus' => true, 'data-slugify-value-class' => 'productSlugValue'));  !!}
</div>

<div class="form-group">
    {!!  Form::label('slug', 'Slug')  !!}
    {!!  Form::text('slug',null,array('class'=>'form-control productSlugValue','disabled'=>true))  !!}
</div>


<div class="form-group">
    {!!  Form::label('content', 'Content')  !!}
    {!!  Form::textarea('content',null,array('class'=>'form-control'))  !!}
</div>

<div class="form-group">
    {!!  Form::label('excerpt', 'Excerpt')  !!}
    {!!  Form::text('excerpt',null,array('class'=>'form-control'))  !!}
</div>

{!! Form::hidden('slug' ,null ,['class'=> 'productSlugValue']) !!}

<div class="form-group">
    {!!  Form::label('status', 'Status')  !!}
    {!!  Form::select('status', array('0' => 'Draft','1' => "Published"),null  ,array('class'=>'form-control'))  !!}
</div>

@include('admin._display_errors')

<div class="form-group">
    {!!  Form::button('Save',array(	'onclick' => 'jQuery(".product_add_form form").submit()', 
    'class' => 'btn btn-primary' ))  !!}
</div>