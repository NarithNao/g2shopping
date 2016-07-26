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
        //alert($('#cate_image').attr('src'));
        $.ajax({
            url: url+'/category/list',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                console.log(result);
                if(result.length < 1){
                    $("#a_parent_category").append($('<option>').val('0').text('Choose parent category'));
                }else{
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
                $("#a_include_on_top_menu").val('0');
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
                //'cate_image'          : fname,
                'show_on_homepage'    : $("#a_show_on_homepage").val(),
                'include_on_top_menu' : $("#a_include_on_top_menu").val(),
                'status'              : $("#a_status").val(),
            },
            dataType: 'json',
            success: function(result){
                //console.log(result);
                window.location = url + '/category';
            }
        });
        //window.location = url + '/category';
    });

    $("#a_show_on_homepage").change(function () {
        if ($("#a_show_on_homepage").prop("checked")) {
            $("#a_show_on_homepage").val('1');
        }else{
            $("#a_show_on_homepage").val('0');
        }
    });

    $("#a_include_on_top_menu").change(function () {
        if ($("#a_include_on_top_menu").prop("checked")) {
            $("#a_include_on_top_menu").val('1');
        }else{
            $("#a_include_on_top_menu").val('0');
        }
    });

    $("#a_status").change(function () {
        if ($("#a_status").prop("checked")) {
            $("#a_status").val('1');
        }else{
            $("#a_status").val('0');
        }
    });

    $("#b-cancel").click(function (e) {
        e.preventDefault();
        //alert(fname);
        $("#l-add_category").hide();
        $("#b-cancel").addClass('hidden');
        $("#b-add_category").show();
        $("#category").show();
    });

});