@extends('front.master')

@section('content')

    <div class="col-md-3">
        <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">Categories</h3>
            </div>

            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked category-menu">
                    {!! Category::renderCategoryTree($categoryTree) !!}
                </ul>

            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="col-md-9">

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="{{ $product->images()->get()->first()->path }}" alt="" class="img-responsive">
                    </div>

                    <br/>

                    <div class="row" id="thumbs">
                        @foreach($product->images()->get() as $image)
                            <div class="col-xs-4">
                                <a href="img/detailbig1.jpg" class="thumb">
                                    <img src="{{ $image->path }}" alt="" class="img-responsive">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center">{{ $product->name }}</h1>

                        <p class="price">${{ $price->sale_price }}</p>

                        <p class="text-center buttons">
                            <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to
                                cart</a>
                            <a href="#" class="btn btn-default"><i class="fa fa-heart"></i> Add to
                                wishlist</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="box" id="details">
                <h4>Product Description</h4>
                {!! $product->description !!} }
            </div>

        </div>

    </div>

@endsection