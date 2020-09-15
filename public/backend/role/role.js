var POST_METHOD = 'POST';
$(document).ready(function () {
    list();

    function getList(url) {
        callApi(url)
            .then((res) => {
                $('#list').replaceWith(res);
            })
    }

    function list() {
        let url = $('#list').data('action')
        getList(url)
    }

    // -------createform-----------
    $(document).on('click', '#create-new-role', function () {
        let formData = $('#createFormID');
        let data = formData.serialize();
        let url = formData.attr('action');
        callApi(url, data, POST_METHOD)
            .then(() => {
                toastr.success('Thêm vai trò thành công');
                list()
                $('#addRole').modal('hide');
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

    // -------edit role----------
    $(document).on('click', '.btnEditRole', function () {
        var url = $(this).attr('href');
        var urlUpdate = $(this).attr('data-update');
        callApi(url)
            .then((res) => {
                $('#listRole').replaceWith(res);
                $('#editFormID').attr('action', function (i, value) {
                    return urlUpdate;
                });
            })
    });

    // update record
    $(document).on('click', '.update-new-role', function () {
        let formData = $('#editFormID');
        let url = formData.attr('action');
        let data = formData.serialize();
        callApi(url, data, POST_METHOD)
            .then(() => {
                list()
                toastr.success('Sửa vai trò thành công');
                $('#editRole').modal('hide');
            })
            .catch((res) => {
                if (res.status == 422) {
                    printErrorMsg(res.responseJSON.errors);
                }
                if (res.status == 403) {
                    alert('bạn không có quyền chỉnh sửa');
                }
            })
    });

    $(document).on('click', '.btnDelete', function () {
        let url = $(this).attr('href');
        $('#formDelete').attr('action', function (i, value) {
            return url;
        });
    });

    $(document).on('click', '#delete-user', function () {
        let formData = $('#formDelete');
        var url = formData.attr('action');
        callApi(url, null, POST_METHOD)
            .then(() => {
                list()
                toastr.success('Xóa vai trò thành công');
                $('#deleteForm').modal('hide');
            })
            .catch((res) => {
                if (res.status == 403) {
                    alert('Bạn không có quyền xóa');
                }
            })
    });

});
