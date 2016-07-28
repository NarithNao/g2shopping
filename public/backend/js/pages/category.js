$(document).ready(function () {
    var fname = 'profile.png';

    $('input[type=file]').change(function(e){
        var file = $("#a_cate_image").val();
        var path = URL.createObjectURL(event.target.files[0]);
        $("#cate_image").attr('src', path);
        var arr = file.split("\\");
        fname = arr[arr.length-1];
    });

    $("#b-add_category").click(function (e) {
        e.preventDefault();
        var url = $("#url").val();
        $.ajax({
            url: url+'/category/list',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                console.log(result);
                $("#a_parent_category").empty();
                if(result.length < 1){
                    $("#a_parent_category").append($('<option>').val('0').text('Choose parent category'));
                }else{
                    $("#a_parent_category").append($('<option>').val('0').text('Choose parent category'));
                    for(var key in result){
                        //console.log(result[key].cate_name);
                        $("#a_parent_category").append($('<option>').val(result[key].id).text(result[key].cate_name));
                    }
                }
                $("#category").hide();
                $("#b-add_category").hide();
                $("#b-cancel").removeClass('hidden');
                $("#l-add_category").show();
                $("#a_show_on_homepage").val('0');
                $("#a_include_on_main_menu").val('0');
                $("#a_cate_name").focus();
            }
        });
    });

    $("#btn-add_category").click(function () {
        //e.preventDefault();
        var url = $("#url").val();
        //window.location = url + '/category';
        $.ajax({
            url: url+'/add_category',
            type: 'POST',
            data: {
                '_token'              : $("input[name=_token]").val(),
                'cate_name'           : $("#a_cate_name").val(),
                'description'         : $("#a_cate_description").val(),
                'position'            : $("#a_position").val(),
                'parent_category'     : $("#a_parent_category").val(),
                'cate_image'          : fname,
                'show_on_homepage'    : $("#a_show_on_homepage").val(),
                'include_on_main_menu' : $("#a_include_on_main_menu").val(),
                'status'              : $("#a_status").val(),
            },
            dataType: 'json',
            success: function(result){
                console.log(result);

            }
        }).done(function(){
            //window.location = url + '/category';
            $("#frm_upload_image").submit();
        });
    });

    $("#a_show_on_homepage").change(function () {
        if ($("#a_show_on_homepage").prop("checked")) {
            $("#a_show_on_homepage").val('1');
        }else{
            $("#a_show_on_homepage").val('0');
        }
    });

    $("#a_include_on_main_menu").change(function () {
        if ($("#a_include_on_main_menu").prop("checked")) {
            $("#a_include_on_main_menu").val('1');
        }else{
            $("#a_include_on_main_menu").val('0');
        }
    });

    $("#b-cancel").click(function (e) {
        e.preventDefault();
        //alert(fname);
        $("#l-add_category").hide();
        $("#l-update_category").hide();
        $("#l-delete_category").hide();
        $("#b-cancel").addClass('hidden');
        $("#b-add_category").show();
        $("#category").show();
    });

    $(".btn_delete_category").click(function (e) {
        e.preventDefault();
        var u_url = this.href;
        u_url = this.href.split('/');
        var id = u_url[u_url.length-1];
        var url = $("#url").val()+'/category/'+id+'/search';
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result){
                console.log(result);
                $("#category").hide();
                $("#b-add_category").hide();
                $("#b-cancel").removeClass('hidden');
                $("#l-delete_category").show();
                $("#d_cate_id").val(result.id);
            }
        });
    });

    $(".btn_update_category").click(function (e) {
        e.preventDefault();
        var u_url = this.href;
        u_url = this.href.split('/');
        var id = u_url[u_url.length-1];
        var url = $("#url").val()+'/category/'+id+'/search';
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result){
                console.log(result);
                //$("#d_cate_id").val(result.id);

                $("#u_cate_name").val(result.cate_name);
                $("#u_cate_description").val(result.cate_description);
                if(result.show_on_homepage == 1){
                    $("#u_show_on_homepage").prop('checked', true);
                    $("#u_show_on_homepage").val('1');
                }else
                    $("#u_show_on_homepage").val('0');
                if(result.include_on_main_menu == 1){
                    $("#u_include_on_main_menu").prop('checked', true);
                    $("#u_include_on_main_menu").val('1');
                }else
                    $("#u_include_on_main_menu").val('0');
                $("#u_position").val(result.position);

                $.ajax({
                    url: $("#url").val()+'/category/list',
                    type: 'GET',
                    dataType: 'json',
                    success: function(result){
                        //console.log(result);
                        $("#u_parent_category").empty();
                        if(result.length < 1){
                            $("#u_parent_category").append($('<option>').val('0').text('Choose parent category'));
                        }else{
                            $("#a_parent_category").append($('<option>').val('0').text('Choose parent category'));
                            for(var key in result){
                                //console.log(result[key].cate_name);
                                $("#u_parent_category").append($('<option>').val(result[key].id).text(result[key].cate_name));
                            }
                            $("#u_parent_category option[value="+result.parent_category+"]").prop('selected', true);
                        }
                    }
                });
                var img_path = "{{asset('images/category/"+result.cate_image+"')}}";
                //var str = '<img id="cate_image" src="{{asset("images/profile/img.png")}}" class="img-thumbnail" alt="Cinque Terre" width="200px">';
                //str += '<input type="file" name="a_cate_image" id="a_cate_image" class="filestyle" data-input="false" data-buttonText="Choose Image">';
                $("#u_cate_image").empty();
                //$("#u_cate_image").append(str);

                $("#category").hide();
                $("#b-add_category").hide();
                $("#b-cancel").removeClass('hidden');
                $("#l-update_category").show();
                $("#u_cate_name").focus();
            }
        });
    });

});