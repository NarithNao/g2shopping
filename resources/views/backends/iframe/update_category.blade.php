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