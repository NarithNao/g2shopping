@extends('layouts.admin_layout')

@section('css')

@endsection

@section('content')
    {{-- conten header --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <h3 class="text-info">Product</h3>
                </div>
                <div class="col-sm-8 col-xs-6">
                    <div style="margin-top: 15px;">
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right text-center" id="b-add_product" style="min-width: 140px; max-width: 200px;">Add Product</a>
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right hidden" id="b-cancel" style="min-width: 100px; max-width: 150px;">Cancel</a>
                    </div>

                </div>
                <hr width="100%">
            </div>
        </div>
    </div>
    {{-- end conten header --}}

    {{-- list product --}}
    <div class="row" id="product">
        <div class="well">
            <div class="table-responsive" style="padding: 20px 0;">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center col-xs-1">#</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Pro. SKU</th>
                        <th class="text-center">Cost</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Instock</th>
                        <th class="text-center col-xs-1">Status</th>
                        <th class="text-center" style="min-width: 70px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">{{$i++}}</td>
                            <td class="text-center">{{--<img src="{{asset('images/category/'.$category->cate_image)}}" class="img-rounded" alt="Category Image" style="max-height: 50px;">--}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->cost}}</td>
                            <td>{{$product->price}}</td>
                            <td class="text-center">{{$product->instock}}</td>
                            <td>
                                @if($product->status == 1)
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
                                <a href="{{url($product->id)}}" class="btn btn-warning btn-xs col-xs-10 col-xs-offset-1 btn_update_product" data-toggle="tooltip" title="Update"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end list product --}}

    {{-- add product --}}
    <div class="row" id="l-add_product" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Add Product</h3>
            </div>
            <form class="form-horizontal" id="frm_upload_image" role="form" method="POST" action="{{url('admin/add_product_image')}}" enctype="multipart/form-data" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="a_pro_sku">Product code/SKU:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="a_pro_sku" name="a_pro_sku" placeholder="Enter Product Code / SKU">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="a_pro_short_description">Short Description:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="5" id="a_pro_short_description" name="a_pro_short_description" style="resize: vertical;" placeholder="Short Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="a_pro_full_description">Full Description:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="10" id="a_pro_full_description" name="a_pro_full_description" placeholder="Full Description" style="resize: vertical;"></textarea>
                        </div>
                    </div>
                   {{-- <div class="form-group">
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
                    </div>--}}
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_pro_category">Category:</label>
                            <select class="form-control" id="a_pro_category" name="a_pro_category">
                                {{--<option>1</option>
                                <option>2</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_pro_brand">Brand:</label>
                            <select class="form-control" id="a_pro_brand" name="a_pro_brand">
                                {{--<option>1</option>
                                <option>2</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_pro_cost">Product Cost:</label>
                            <input type="text" class="form-control" id="a_pro_cost" name="a_pro_cost" placeholder="Enter Product Cost">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_pro_price">Product Price:</label>
                            <input type="text" class="form-control" id="a_pro_price" name="a_pro_price" placeholder="Enter Product Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_pro_qty">Product Quantity:</label>
                            <input type="text" class="form-control" id="a_pro_qty" name="a_pro_qty" placeholder="Enter Product Quantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="a_pro_qty_min">Product min-instock:</label>
                            <input type="text" class="form-control" id="a_pro_qty_min" name="a_pro_qty_min" placeholder="Enter Product Minimum in Stock">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a id="btn-add_product" class="btn btn-primary">Save</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end add product --}}

    {{-- update product --}}
    <div class="row" id="l-update_product" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Add Product</h3>
            </div>
            <form class="form-horizontal" id="frm_upload_image" role="form" method="POST" action="{{url('admin/update_product_image')}}" enctype="multipart/form-data" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="u_pro_sku">Product code/SKU:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="u_pro_sku" name="u_pro_sku" placeholder="Enter Product Code / SKU">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="u_pro_short_description">Short Description:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="5" id="u_pro_short_description" name="u_pro_short_description" style="resize: vertical;" placeholder="Short Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 text-left" for="u_pro_full_description">Full Description:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="10" id="u_pro_full_description" name="u_pro_full_description" placeholder="Full Description" style="resize: vertical;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-xs-6 text-left" for="u_pro_status">Publish:</label>
                         <div class="col-sm-8 col-xs-6">
                             <input type="checkbox" name="u_pro_status" id="u_pro_status">
                         </div>
                     </div>
                    {{--  <div class="form-group">
                         <label class=" col-sm-4 col-xs-6 text-left" for="a_include_on_main_menu">Include on main menu:</label>
                         <div class="col-sm-8 col-xs-6">
                             <input type="checkbox" name="a_include_on_main_menu" id="a_include_on_main_menu">
                         </div>
                     </div>--}}
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_pro_category">Category:</label>
                            <select class="form-control" id="u_pro_category" name="u_pro_category">
                                {{--<option>1</option>
                                <option>2</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_pro_brand">Brand:</label>
                            <select class="form-control" id="u_pro_brand" name="u_pro_brand">
                                {{--<option>1</option>
                                <option>2</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_pro_cost">Product Cost:</label>
                            <input type="text" class="form-control" id="u_pro_cost" name="u_pro_cost" placeholder="Enter Product Cost">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_pro_price">Product Price:</label>
                            <input type="text" class="form-control" id="u_pro_price" name="u_pro_price" placeholder="Enter Product Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_pro_qty">Product Quantity:</label>
                            <input type="text" class="form-control" id="u_pro_qty" name="u_pro_qty" placeholder="Enter Product Quantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="text-left" for="u_pro_qty_min">Product min-instock:</label>
                            <input type="text" class="form-control" id="u_pro_qty_min" name="u_pro_qty_min" placeholder="Enter Product Minimum in Stock">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a id="btn-update_product" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end update product --}}

@endsection

@section('js')
    <script src="{{asset('backend/js/pages/product.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection