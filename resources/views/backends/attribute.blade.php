@extends('layouts.admin_layout')

@section('css')

@endsection

@section('content')
    {{-- conten header --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <h3 class="text-info">Attribute</h3>
                </div>
                <div class="col-sm-8 col-xs-6">
                    <div style="margin-top: 15px;">
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right" id="b-add_attribute" style="min-width: 100px; max-width: 150px;">Add Attribute</a>
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right hidden" id="b-cancel" style="min-width: 100px; max-width: 150px;">Cancel</a>
                    </div>

                </div>
                <hr width="100%">
            </div>
        </div>
    </div>
    {{-- end conten header --}}

    {{-- list attribute --}}
    <div class="row" id="brand">
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
                    {{--@foreach($brands as $brand)
                        <tr>
                            <td class="text-center">{{$i++}}</td>
                            <td class="text-center"><img src="{{asset('images/brand/'.$brand->brand_image)}}" class="img-rounded" alt="Category Image" style="max-height: 50px;"></td>
                            <td>{{$brand->brand_name}}</td>
                            <td class="text-center">{{$brand->position}}</td>
                            <td>
                                @if($brand->status == 1)
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
                                <a href="{{url($brand->id)}}" class="btn btn-warning btn-xs col-xs-10 col-xs-offset-1 btn_update_brand" data-toggle="tooltip" title="Update"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end list attribute --}}

    {{-- add attribute --}}
    <div class="row" id="l-add_brand" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Add Manufacturer</h3>
            </div>
            <form class="form-horizontal" id="frm_upload_image" role="form" method="POST" action="{{url('admin/add_brand_image')}}" enctype="multipart/form-data" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="a_brand_name">Manufacturer name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="a_brand_name" name="a_brand_name" placeholder="Enter Manufacturer name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="a_brand_description">Description:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="10" id="a_brand_description" name="a_brand_description" style="resize: vertical;"></textarea>
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
                            <img id="brand_image_a" src="{{asset('images/profile/img.png')}}" class="img-thumbnail" alt="Cinque Terre" width="200px">
                            <input type="file" name="a_brand_image" id="a_brand_image" class="filestyle" data-input="false" data-buttonText="Choose Image"><br>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a id="btn-add_brand" class="btn btn-primary">Save</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end add attribute --}}

    {{-- update attribute --}}
    <div class="row" id="l-update_brand" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Update Category</h3>
            </div>
            <form class="form-horizontal" id="u_frm_upload_image" role="form" method="POST" action="{{url('admin/update_brand_image')}}" enctype="multipart/form-data" style="padding: 20px 0;">
                {{ csrf_field() }}
                <input type="hidden" id="brand_id">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="u_brand_name">Manufacturer name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="u_brand_name" name="u_brand_name" placeholder="Enter Manufacturer name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="u_brand_description">Description:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="10" id="u_brand_description" name="u_brand_description" style="resize: vertical;"></textarea>
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
                        <div class="col-sm-12" id="loading_image">
                            <img id="brand_image_u" src="" class="img-thumbnail" alt="Cinque Terre" width="200px">
                            <input type="file" name="u_brand_image" id="u_brand_image" class="filestyle" data-input="false" data-buttonText="Choose Image"><br>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a id="btn-update_brand" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end update attribute --}}

@endsection

@section('js')
    <script src="{{asset('backend/js/pages/attribute.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection