/**
 * Created by Narith on 7/28/2016.
 * file name 'g2shopping.utilities.js'
 */

var g2shopping = {};

g2shopping.jsPostReq = function (url, input, callback) {
    $.ajax({
        url: '' + url,
        type: 'POST',
        data: input,
        dataType: 'json',
        error: function(xhr, textStatus, errorThrown){
            alert(xhr.statusText);
        },
        success: function(result){
            try{
                console.log(result);
                callback(result);
            }catch(e){
                alert('error');
            }
        }
    });
};

g2shopping.jsGetReq = function (url, callback) {
    $.ajax({
        url: url,
        type: 'Get',
        dataType: 'json',
        error: function(xhr, textStatus, errorThrown){
            alert(xhr.statusText);
        },
        success: function(result){
            try{
                console.log(result);
                callback(result);
            }catch(e){
                alert('error');
            }
        }
    });
};

g2shopping.getLinkID = function (url) {
    var s_url = url.split('/');
    var id = s_url[s_url.length - 1];
    return id;
};
