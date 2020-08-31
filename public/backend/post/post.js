var POST_METHOD = 'POST';

$(document).ready(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let postEditor = CKEDITOR.replace( 'content' );

    $(document).on('click', '#create-new-post', function(){
      
        let formData       = $('#createFormPostID');
        let data           = new FormData($('#createFormPostID')[0]);
        let url            = formData.attr('action');
        let content        = postEditor.getData();
        data.append('content', content);
        

      callPostApi(url, data,POST_METHOD)
        .then((res)=>{
            getList(urlList);
            toastr.success('Them bai viet thanh cong');
            $('#addPost').modal('hide');
        })
        .catch((res)=>{
            if (res.status == 422) {
                printErrorMsg(res.responseJSON.errors);
            }
        })
    });


    function callPostApi(url,data={}, method='get')
    {
        return $.ajax({
            method:method,
            url:url,
            data:data,
            processData: false,
            contentType: false,
        })
    }

    function getList(url)
    {
        callPostApi(url)
        .then((res)=>{
            $('#list').replaceWith(res);
        })
    }

    // --------thong bao loi phan create---------
    function printErrorMsg(msg){
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
});