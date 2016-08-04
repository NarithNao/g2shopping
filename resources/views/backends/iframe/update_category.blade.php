{{-- add category --}}
<div class="row" id="l-add_category">
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