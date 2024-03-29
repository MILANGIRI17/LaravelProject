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
                            <h2><a href="{{route('sub-category')}}">Show Sub Category</a>
                                <a href="{{route('add-sub-category')}}" class="btn-sm btn-success"><i class="fa fa-plus"></i></a>
                            </h2>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="">
                                        <div class="col-md-10">
                                            <input type="text" name="search_sub_category" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary">search</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="col-md-12">
                                @include('backend.layouts.message')
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Sub Category Name</th>
                                        <th>It's Category</th>
                                        <th>Status</th>
                                        <th>Posted By</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subCategoryData as $key=>$subCategory)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$subCategory->sub_cat_name}}</td>
                                            <td>{{$subCategory->CategoryData->cat_name}}</td>
                                            <td>
                                                <form action="{{route('update-sub-category-status')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="criteria" value="{{$subCategory->id}}">
                                                    @if($subCategory->status==1)
                                                        <button name="active" class="btn-sm btn-primary" title="Active"><i class="fa fa-check"></i></button>
                                                    @else
                                                        <button name="inactive" class="btn-sm btn-warning" title="Inactive"><i class="fa fa-times"></i></button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>{{$subCategory->postedBy->username}}</td>
                                            <td>{{$subCategory->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('edit-sub-category').'/'.$subCategory->id}}" class="btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('delete-sub-category').'/'.$subCategory->id}}" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$subCategoryData->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
