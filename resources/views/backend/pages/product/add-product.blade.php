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
                            <h2>Add Product</h2>
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
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Title: <a href="" style="color:red;">{{$errors->first('title')}}</a></label>
                                        <input type="text" name="title" class="form-control form-control-sm" id="title" value="{{old('title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug: <a href="" style="color:red;">{{$errors->first('slug')}}</a></label>
                                        <input type="text" name="slug" class="form-control form-control-sm" id="slug" value="{{old('slug')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price: <a href="" style="color:red;">{{$errors->first('price')}}</a></label>
                                        <input type="text" name="price" class="form-control form-control-sm" id="price" value="{{old('price')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description: <a href="" style="color:red;">{{$errors->first('description')}}</a></label>
                                        <input type="text" name="description" class="form-control form-control-sm" id="description" value="{{old('description')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image: <a href="" style="color:red;">{{$errors->first('image')}}</a></label>
                                        <br><input type="file" name="image" class="btn btn-default">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Add Product</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
