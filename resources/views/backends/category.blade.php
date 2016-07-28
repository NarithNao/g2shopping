@extends('layouts.admin_layout')

@section('css')

@endsection

@section('content')
    <input type="hidden" id="url" value="{{url('admin')}}">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-4">
                    <h3 class="text-info">Category</h3>
                </div>
                <div class="col-sm-8">
                    <div style="margin-top: 15px;">
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right" id="b-add_category">Add Category</a>
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right hidden" id="b-cancel">Cancel</a>
                    </div>

                </div>
                <hr width="100%">
            </div>
        </div>
    </div>

    {{-- list category --}}
    <div class="row" id="category">
        <div class="well">
            <div class="table-responsive" style="padding: 20px 0;">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center col-xs-1">#</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Display Order</th>
                        <th class="text-center col-xs-1">Status</th>
                        <th class="text-center" style="min-width: 70px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="text-center">{{$i++}}</td>
                        <td class="text-center"><img src="{{asset('images/category/'.$category->cate_image)}}" class="img-rounded" alt="Category Image" style="max-height: 50px;"></td>
                        <td>{{$category->cate_name}}</td>
                        <td class="text-center">{{$category->position}}</td>
                        <td>
                            @if($category->status == 1)
                                <a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Active">
                                    <span class="glyphicon glyphicon-ok-circle"></span>
                                </a>
                            @else
                                <a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Inactive">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{url($category->id)}}" class="btn btn-warning btn-xs col-xs-5 col-xs-offset-1 btn_update_category" data-toggle="tooltip" title="Update"><i class="fa fa-pencil"></i></a>
                            <a href="{{url($category->id)}}" class="btn btn-danger btn-xs col-xs-5 col-xs-offset-1 btn_delete_category" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end list category --}}

    {{-- add category --}}
    <div class="row" id="l-add_category" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Add Category</h3>
            </div>
            <form class="form-horizontal" id="frm_upload_image" role="form" method="POST" action="{{url('admin/add_category_image')}}" enctype="multipart/form-data" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="a_cate_name">Category name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="a_cate_name" name="a_cate_name" placeholder="Enter Category name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="a_cate_description">Description:</label>
                        <div class="col-sm-8">
                            {{--<input type="text" class="form-control" id="a_cate_description" name="a_cate_description" placeholder="Enter description">--}}
                            <textarea class="form-control" rows="10" id="a_cate_description" name="a_cate_description" style="resize: vertical;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-6 text-left" for="a_show_on_homepage">Show on Homepage:</label>
                        <div class="col-sm-8 col-xs-6">
                            <input type="checkbox" name="a_show_on_homepage" id="a_show_on_homepage">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-4 col-xs-6 text-left" for="a_include_on_main_menu">Include on main menu:</label>
                        <div class="col-sm-8 col-xs-6">
                            <input type="checkbox" name="a_include_on_main_menu" id="a_include_on_main_menu">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_position">Display Order:</label>
                            <input type="text" class="form-control" id="a_position" name="a_position" placeholder="Enter Display order">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_parent_category">Parent Category:</label>
                            <select class="form-control" id="a_parent_category" name="a_parent_category">
                                {{--<option>1</option>
                                <option>2</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{--<label class="text-left" for="a_cate_image">Image:</label>--}}
                            <img id="cate_image" src="{{asset('images/profile/img.png')}}" class="img-thumbnail" alt="Cinque Terre" width="200px">
                            <input type="file" name="a_cate_image" id="a_cate_image" class="filestyle" data-input="false" data-buttonText="Choose Image"><br>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a id="btn-add_category" class="btn btn-primary">Save</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end add category --}}

    {{-- update category --}}
    <div class="row" id="l-update_category" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Update Category</h3>
            </div>
            <form class="form-horizontal" id="u_frm_upload_image" role="form" method="POST" action="{{url('admin/upload_category_image')}}" enctype="multipart/form-data" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="u_cate_name">Category name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="u_cate_name" name="u_cate_name" placeholder="Enter Category name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="u_cate_description">Description:</label>
                        <div class="col-sm-8">
                            {{--<input type="text" class="form-control" id="a_cate_description" name="a_cate_description" placeholder="Enter description">--}}
                            <textarea class="form-control" rows="10" id="u_cate_description" name="u_cate_description" style="resize: vertical;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-6 text-left" for="u_show_on_homepage">Show on Homepage:</label>
                        <div class="col-sm-8 col-xs-6">
                            <input type="checkbox" name="u_show_on_homepage" id="u_show_on_homepage">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-4 col-xs-6 text-left" for="u_include_on_main_menu">Include on main menu:</label>
                        <div class="col-sm-8 col-xs-6">
                            <input type="checkbox" name="u_include_on_main_menu" id="u_include_on_main_menu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-4 col-xs-6 text-left" for="u_status">Publish:</label>
                        <div class="col-sm-8 col-xs-6">
                            <input type="checkbox" name="u_status" id="u_status">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_position">Display Order:</label>
                            <input type="text" class="form-control" id="u_position" name="u_position" placeholder="Enter Display order">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_parent_category">Parent Category:</label>
                            <select class="form-control" id="u_parent_category" name="u_parent_category">
                                {{--<option>1</option>
                                <option>2</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" id="u_cate_image">
                            {{--<label class="text-left" for="a_cate_image">Image:</label>--}}
                            <img id="cate_image" src="{{asset('images/profile/img.png')}}" class="img-thumbnail" alt="Cinque Terre" width="200px">
                            <input type="file" name="a_cate_image" id="a_cate_image" class="filestyle" data-input="false" data-buttonText="Choose Image"><br>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a id="btn-update_category" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end update category --}}

    {{-- delete category --}}
    <div class="row" id="l-delete_category" style="display: none;">
        <div class="well" {{--style="position: fixed;"--}}>
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Delete Category</h3>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{url('admin/delete_category')}}" style="padding: 20px 0;">
                {{ csrf_field() }}
                <input type="hidden" id="d_cate_id" name="d_cate_id" >
                <div class="form-group">
                    <label class="col-sm-12 text-center">Are you sure want to delete this Category?</label>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary center-block" value="Delete">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end delete category --}}

@endsection

@section('js')
    <script src="{{asset('bootstrap/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/category.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection