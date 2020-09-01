
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
        let data           = new FormData($('#createFormID')[0]);

        let url            = formData.attr('action');
        
      callAuthorApi(url, data,POST_METHOD)
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


    function callAuthorApi(url,data={}, method='get')
    {
        return $.ajax({
            url:url,
            data:data,
            method:method,
            processData: false,
            contentType: false,
        })
    }

    function getList(url)
    {
        callAuthorApi(url)
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


    // --------thong bao loi phan edit---------
    function printErrorMsgEdit(msg){
        $(".print-error-msg-edit").find("ul").html('');
        $(".print-error-msg-edit").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg-edit").find("ul").append('<li>'+value+'</li>');
        });
    }

    // -------edit author----------
    // get record
    $(document).on('click', '.btnEdit', function(){
        var url = $(this).attr('href');
        var urlUpdate = $(this).attr('data-update');

        callAuthorApi(url, null,null)
        .then((res)=>{;
            $('.ftname').val(res.data.name);
            var src = "http://localhost:8888/images/author/"+res.data.thumbnail+"";
            $(".ftThumbnail").attr("src",src);
            $('#editFormID').attr('action', function(i, value) {
                return urlUpdate;
            });
        })
    });

    // update record
    $(document).on('click', '.edit-new-author', function(){
        let formData       = $('#editFormID');
        var url            = formData.attr('action');
        let data           = new FormData($('#editFormID')[0]);
        callAuthorApi(url, data,POST_METHOD)
        .then((res)=>{
            getList(urlList)
            toastr.success('Sua tac gia thanh cong');
            $('#editAuthor').modal('hide');
        })
        .catch((res)=>{
            if (res.status == 422) {
                printErrorMsgEdit(res.responseJSON.errors);
            }
        })
    });



    // ------delete record----------
    $(document).on('click', '.btnDelete', function(){
        var url = $(this).attr('href');
        $('#formDelete').attr('action', function(i, value) {
            return url;
        });
    });

    $(document).on('click', '#delete-author', function(){
        let formData       = $('#formDelete');
        var url            = formData.attr('action');
        callAuthorApi(url, null,POST_METHOD)
        .then((res)=>{
            getList(urlList)
            toastr.success('Xoa tac gia thanh cong');
            $('#deleteForm').modal('hide');
        })

    });


    $(document).ready(function() {
       $('#search').on('keyup', function() {
          let formData       = $('#formSearch');
          var data           = $(this).val();
          var url            = formData.attr('action');
          callAuthorApi(url+'?search='+data)
          .then((res)=>{
            $('#list').replaceWith(res);
        })
      });
   });

});