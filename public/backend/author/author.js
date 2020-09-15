const POST_METHOD = 'POST';
$(document).ready(function () {
    list();

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

    // -------createform-----------
    $(document).on('click', '#create-new-author', function () {

        let formData = $('#createFormID');
        let data = new FormData(formData[0]);
        let url = formData.attr('action');
        callApiWithFile(url, data, POST_METHOD)
            .then(() => {
                toastr.success('Thêm tác giả thành công');
                list()
                $('#addAuthor').modal('hide');
            })
            .catch((res) => {
                if (res.status == 422) {
                    printErrorMsg(res.responseJSON.errors);
                }
            })
    });

    // -------edit author----------
    // get record
    $(document).on('click', '.btnEdit', function () {
        let url = $(this).attr('href');
        let urlUpdate = $(this).attr('data-update');

        callApiWithFile(url)
            .then((res) => {
                $('.ftname').val(res.author.name);
                let src = "/images/author/" + res.author.thumbnail + "";
                $(".ftThumbnail").attr("src", src);
                $('#editFormID').attr('action', function (i, value) {
                    return urlUpdate;
                });
            })
    });

    // update record
    $(document).on('click', '.update-new-author', function () {
        let formData = $('#editFormID');
        let url = formData.attr('action');
        let data = new FormData($('#editFormID')[0]);
        callApiWithFile(url, data, POST_METHOD)
            .then(() => {
                list()
                toastr.success('Sửa tác giả thành công');
                $('#editAuthor').modal('hide');
            })
            .catch((res) => {
                if (res.status == 422) {
                    printErrorMsg(res.responseJSON.errors);
                }
            })
    });


    // ------delete record----------
    $(document).on('click', '.btnDelete', function () {
        let url = $(this).attr('href');
        $('#formDelete').attr('action', function (i, value) {
            return url;
        });
    });

    $(document).on('click', '#delete-author', function () {
        let formData = $('#formDelete');
        let url = formData.attr('action');
        callApiWithFile(url, null, POST_METHOD)
            .then(() => {
                list()
                toastr.success('Xóa tác giả thành công');
                $('#deleteForm').modal('hide');
            })
            .catch((res) => {
                if (res.status == 403) {
                    alert('ban khong co quyen xoa');
                }
            })

    });

    // -----tim kiem----
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            let formData = $('#formSearch');
            let data = $(this).val();
            let url = formData.attr('action');
            callApiWithFile(url + '?search=' + data)
                .then((res) => {
                    $('#list').replaceWith(res);
                })
        });
    });

});
