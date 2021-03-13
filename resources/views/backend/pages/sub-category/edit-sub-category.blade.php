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
                            <h2>Update Sub Category</h2>
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
                                <form action="{{route('edit-sub-category-action')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="criteria" value="{{$subCategoryData->id}}">
                                    <input type="hidden" name="cat_id" value="{{$subCategoryData->cat_id}}">
                                    <div class="form-group">
                                        <label for="title">Sub Category Name: <a href="" style="color:red;">{{$errors->first('sub_cat_name')}}</a></label>
                                        <input type="text" name="sub_cat_name" class="form-control form-control-sm" id="title" value="{{$subCategoryData->sub_cat_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug: <a href="" style="color:red;">{{$errors->first('slug')}}</a></label>
                                        <input type="text" name="slug" class="form-control form-control-sm" id="slug" value="{{$subCategoryData->slug}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords:</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords" data-role="tagsinput"
                                               value="UNDERWEAR,T-SHIRTS">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description:</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Update Sub Category</button>
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
