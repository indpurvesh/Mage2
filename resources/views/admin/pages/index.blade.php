@extends('admin.master')
 
@section('content')

<div class="content">
	<h1>Pages List</h1>
	<hr/>
        <div class="pull-right">
            <a href="{{ @url('/admin/pages/create') }}" class="btn btn-primary" title="Add Pages" >
                Add Pages
            </a>
            <br/><br/>
        </div>
     @if ( !$pages->count() )
        You have no Pages
    @else

    
		<table class="table table-bordered table-hover">
	    	<tr>
	    		<th>Id</th>
	    		<th>title</th>
	    		<th>excerpt</th>
	    		<th>Status</th>
	    		<th>Edit</th>
	    		<th>Delete</th>
	    	</tr>
	     	@foreach( $pages as $page)
	    	<tr>
	   			<td>{{ $page->id }}</td>
	   			<td>{{ $page->title }}</td>
	   			<td>{{ $page->excerpt }}</td>
	   			<td>{{ ($page->status) ? "Yes" : "No" }}</td>
	   			<td><a href="{{ route('admin.pages.edit',$page->id) }}" title="Edit">Edit</a></td>
	   			<td>
	   				{!! Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'DELETE' , 'id' => 'deleteForm')) !!}
	   				<a href="#" onclick="jQuery(this).parents('form:first').submit()">Delete</a>
					{!! Form::close() !!}
	   				
	   			</td>
	   		</tr>
	   		@endforeach
    	</table>
    @endif
</div>
@endsection