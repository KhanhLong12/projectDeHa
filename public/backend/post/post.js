var POST_METHOD = 'POST';

$(document).ready(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // let postCreate = CKEDITOR.replace( 'content' );

    $(document).on('click', '#create-new-post', function(){
      
        let formData       = $('#createFormPostID');
        let data           = new FormData($('#createFormPostID')[0]);
        let url            = formData.attr('action');
        let content        = postCreate.getData();
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



    // ------delete record----------
    $(document).on('click', '.btnDelete', function(){
        var url = $(this).attr('href');
        $('#formDelete').attr('action', function(i, value) {
            return url;
        });
    });

    $(document).on('click', '#delete-post', function(){
        let formData       = $('#formDelete');
        var url            = formData.attr('action');
        callPostApi(url, null,POST_METHOD)
        .then((res)=>{
            getList(urlList)
            toastr.success('Xoa truyen thanh cong');
            $('#deleteForm').modal('hide');
        })

    });


    // -------edit category----------
    // get record
    $(document).on('click', '.btnEdit', function(){
        var url = $(this).attr('href');
        var urlUpdate = $(this).attr('data-update');
        callPostApi(url, null,null)
        .then((res)=>{

            $('.ftname').val(res.data[0].name);
            $('.ftCategory_id').val(res.data[0].category_id);
            $('.ftAuthor_id').val(res.data[0].author_id);
            $('.ftstatus').val(res.data[0].status);
            $('.ftDescription').val(res.data[0].description);

            $('.ftContent').val(res.data[0].content);
            $(".ftImages").remove();
            $.each( res.data[1], function( key, value ) {

                var pathImage = "http://localhost:8888/"+value.path+"";
                $(".thubnail").append("<img class='ftImages' style='width: 10%' src="+pathImage+">");

            });
            
            $('#editFormPostID').attr('action', function(i, value) {
                return urlUpdate;
            });
        })
    });
    // update record
    $(document).on('click', '.edit-new-post', function(){
        let formData       = $('#editFormPostID');
        var url            = formData.attr('action');

        let data           = new FormData($('#editFormPostID')[0]);
        let content        = postEditor.getData();
        data.append('content', content);

        callPostApi(url, data,POST_METHOD)
        .then((res)=>{
            getList(urlList)
            toastr.success('Sua danh muc thanh cong');
            $('#editPost').modal('hide');
        })
        .catch((res)=>{
            if (res.status == 422) {
                printErrorMsgEdit(res.responseJSON.errors);
            }
        })
    });
});