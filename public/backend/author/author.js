
 const POST_METHOD = 'POST';
 const GET_METHOD  = 'GET';

$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // -------createform-----------
   $(document).on('click', '#create-new-author', function(){
      
        let formData       = $('#createFormID');
        let data           = formData.serialize();

        let url            = formData.attr('action');
        
      callCategoryApi(url, data,POST_METHOD)
        .then((res)=>{
            getList(urlList)
            toastr.success('Them danh muc thanh cong');
            $('#addAuthor').modal('hide');
        })
        .catch((res)=>{
            if (res.status == 422) {
                printErrorMsg(res.responseJSON.errors);
            }
        })
    });


    function callCategoryApi(url,data={}, method='get')
    {
        return $.ajax({
            url:url,
            data:data,
            method:method,
        })
    }

    function getList(url)
    {
        callCategoryApi(url)
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