@extends('backend.master.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Update Product</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-12">
                                @include('backend.layouts.message')
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{route('edit-product-action')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="criteria" value="{{$productData->id}}">
                                            <div class="form-group">
                                                <label for="name">Title: <a href="" style="color:red;">{{$errors->first('title')}}</a></label>
                                                <input type="text" name="title" class="form-control form-control-sm" id="title" value="{{$productData->title}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Slug: <a href="" style="color:red;">{{$errors->first('slug')}}</a></label>
                                                <input type="text" name="slug" class="form-control form-control-sm" id="slug" value="{{$productData->slug}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price: <a href="" style="color:red;">{{$errors->first('price')}}</a></label>
                                                <input type="text" name="price" class="form-control form-control-sm" id="price" value="{{$productData->price}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description: <a href="" style="color:red;">{{$errors->first('description')}}</a></label>
                                                <input type="text" name="description" class="form-control form-control-sm" id="description" value="{{$productData->description}}">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success">Update Product</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{url('uploads/products/'.$productData->image)}}" class="img-fluid img-thumbnail" alt="{{$productData->name." 's Picture"}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
