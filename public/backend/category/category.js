
 const POST_METHOD = 'POST';
 const GET_METHOD  = 'GET';
//add item
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $(document).on('click', '#create-new-category', function(){
      
        let formData       = $('#createFormID');
        let data           = formData.serialize();

        let url            = formData.attr('action');
        
      callCategoryApi(url, data,POST_METHOD)     //goi ajax den CategoryController func store
        .then((res)=>{                           // res: category new 
            getList(urlList);
            toastr.success('Them danh muc thanh cong');
            $('#addCategory').modal('hide');
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
            method:method,
            url:url,
            data:data
        })
    }

    function getList(url)
    {
        callCategoryApi(url)
        .then((res)=>{
            $('#list').replaceWith(res);
        })
    }

    function printErrorMsg(msg){
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

    // -------edit category----------
    // get record
    $(document).on('click', '.btnEdit', function(){
        var url = $(this).attr('href');
        var urlUpdate = $(this).attr('data-update');
        callCategoryApi(url, null,null)
        .then((res)=>{
            $('.ftname').val(res.data.name);
            $('.ftparent_category').val(res.data.parent_category);
            $('.ftdisplay').val(res.data.display);
            $('#editFormID').attr('action', function(i, value) {
                return urlUpdate;
            });
        })
    });

    // update record
    $(document).on('click', '.edit-new-category', function(){
        let formData       = $('#editFormID');
        var url            = formData.attr('action');
        let data           = formData.serialize();

        callCategoryApi(url, data,POST_METHOD)
        .then((res)=>{
            getList(urlList)
            toastr.success('Sua danh muc thanh cong');
            $('#editCategory').modal('hide');
        })
        .catch((res)=>{
            if (res.status == 422) {
                printErrorMsg(res.responseJSON.errors);
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

    $(document).on('click', '#delete-category', function(){
        let formData       = $('#formDelete');
        var url            = formData.attr('action');
        callCategoryApi(url, null,POST_METHOD)
        .then((res)=>{
            getList(urlList)
            toastr.success('Xoa danh muc thanh cong');
            $('#deleteForm').modal('hide');
        })

    });


    $(document).ready(function() {
       $('#search').on('keyup', function() {
          // event.preventDefault();
          let formData       = $('#formSearch');
          var data           = $(this).val();
          var url            = formData.attr('action');
          // console.log(url);
          // return false;
          callCategoryApi(url+'?search='+data)
          .then((res)=>{
            $('#list').replaceWith(res);
        })
      });
   });


});

