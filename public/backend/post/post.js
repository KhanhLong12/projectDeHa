var POST_METHOD = 'POST';

$(document).ready(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#create-new-post', function(){
      
        let formData       = $('#createFormPostID');
        let data           = formData.serialize();
        let url            = formData.attr('action');
        
      callPostApi(url, data,POST_METHOD)
        .then((res)=>{
            getList(urlList);
            toastr.success('Them bai viet thanh cong');
            $('#addPost').modal('hide');
        })
        // .catch((res)=>{
        //     if (res.status == 422) {
        //         printErrorMsg(res.responseJSON.errors);
        //     }
        // })
    });


    function callPostApi(url,data={}, method='get')
    {
        return $.ajax({
            method:method,
            url:url,
            data:data
        })
    }

    function getList(url)
    {
        callPostApi(url)
        .then((res)=>{
            $('#list').replaceWith(res);
        })
    }
});