var POST_METHOD = 'POST';

$(document).ready(function () {
    list()

    function list() {
        let url = $('#list').data('action')
        getList(url)
    }

    function getList(url) {
        callApiWithFile(url)
            .then((res) => {
                $('#list').replaceWith(res);
            })
    }

    let postEditor = CKEDITOR.replace('contentEdit');

    $(document).on('click', '#create-new-post', function () {

        let formData = $('#createFormPostID');
        let data = new FormData(formData[0]);
        let url = formData.attr('action');
        let content = postCreate.getData();
        data.append('content', content);


        callApiWithFile(url, data, POST_METHOD)
            .then(() => {
                list()
                toastr.success('Thêm truyện thành công');
                $('#addPost').modal('hide');
            })
            .catch((res) => {
                if (res.status == 422) {
                    printErrorMsg(res.responseJSON.errors);
                }
                if (res.status == 403) {
                    alert('Bạn không có quyền tạo mới');
                }
            })
    });

    // ------delete record----------
    $(document).on('click', '.btnDelete', function () {
        var url = $(this).attr('href');
        $('#formDelete').attr('action', function (i, value) {
            return url;
        });
    });

    $(document).on('click', '#delete-post', function () {
        let formData = $('#formDelete');
        var url = formData.attr('action');
        callApiWithFile(url, null, POST_METHOD)
            .then(() => {
                list()
                toastr.success('Xóa truyện thành công');
                $('#deleteForm').modal('hide');
            })
            .catch((res) => {
                if (res.status == 403) {
                    alert('ban khong co quyen xoa');
                }
            })

    });


    // -------edit post----------
    // get record
    $(document).on('click', '.btnEdit', function () {
        var url = $(this).attr('href');
        var urlUpdate = $(this).attr('data-update');
        callApiWithFile(url, null, null)
            .then((res) => {
                // let {name, content, category_id, author_id, status, description, } = res.post;
                $('.ftname').val(res.post.name);
                $('.ftCategory_id').val(res.post.category_id);
                $('.ftAuthor_id').val(res.post.author_id);
                $('.ftstatus').val(res.post.status);
                $('.ftDescription').val(res.post.description);
                postEditor.setData(res.post.content)
                $(".ftImages").remove();
                $.each(res.post.images, function (key, value) {
                    var pathImage = "http://localhost:8888/" + value.path + "";
                    $(".thubnail").append("<img class='ftImages' style='width: 10%' src=" + pathImage + ">");
                });

                $('#editFormPostID').attr('action', function (i, value) {
                    return urlUpdate;
                });
            })
    });
    // update record
    $(document).on('click', '.update-new-post', function () {
        let formData = $('#editFormPostID');
        var url = formData.attr('action');
        let data = new FormData($('#editFormPostID')[0]);
        let content = postEditor.getData();
        data.append('content', content);

        callApiWithFile(url, data, POST_METHOD)
            .then(() => {
                list()
                toastr.success('Sửa truyện thành công');
                $('#editPost').modal('hide');
            })
            .catch((res) => {
                if (res.status == 422) {
                    printErrorMsgEdit(res.responseJSON.errors);
                }
                if (res.status == 403) {
                    alert('Bạn không có quyền chỉnh');
                }
            })
    });
});
