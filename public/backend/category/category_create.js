
 const POST_METHOD = 'POST';
//add item
$(document).ready(function(){

    $(document).on('click', '.AddNewCategory', function(){
        $('#addCategory').modal('show');
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $(document).on('click', '#create-new-category', function(){
      
        let formData       = $('#createFormID');
        var _token         = $("input[name='_token']").val();
        var name           = $('#name').val();
        var select_parent  = $( "#parent_category option:selected" ).text();
        var select_display = $( "#display option:selected" ).text();
        let data = {_token          :_token,
                    name            : name,
                    parent_category : select_parent,
                    display         : select_display
                    };

        let url = formData.attr('action');
        
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

});

