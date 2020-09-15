const POST_METHOD = 'POST';
$(document).ready(function () {
    list()

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
    $(document).on('click', '#create-new-category', function () {
        let formData = $('#createFormID');
        let data = formData.serialize();

        let url = formData.attr('action');
        callApi(url, data, POST_METHOD)
            .then(() => {
                list()
                getCategory(urlCategory)
                getCategoryEdit(urlCategoryEdit)
                toastr.success('Them danh muc thanh cong');
                $('#addCategory').modal('hide');
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

    // -------edit category----------
    // get record
    $(document).on('click', '.btnEdit', function () {
        var url = $(this).attr('href');
        var urlUpdate = $(this).attr('data-update');
        callApi(url, null, null)
            .then((res) => {
                $('.ftname').val(res.category.name);
                $('.ftparent_category').val(res.category.parent_id);
                $('.ftdisplay').val(res.category.display);
                $('#editFormID').attr('action', function (i, value) {
                    return urlUpdate;
                });
            })
    });

    // update record
    $(document).on('click', '.update-new-category', function () {
        let formData = $('#editFormID');
        var url = formData.attr('action');
        let data = formData.serialize();
        callApi(url, data, POST_METHOD)
            .then(() => {
                list()
                getCategory(urlCategory)
                getCategoryEdit(urlCategoryEdit)
                toastr.success('Sua danh muc thanh cong');
                $('#editCategory').modal('hide');
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


    // ------delete record----------
    $(document).on('click', '.btnDelete', function () {
        var url = $(this).attr('href');
        $('#formDelete').attr('action', function (i, value) {
            return url;
        });
    });

    $(document).on('click', '#delete-category', function () {
        let formData = $('#formDelete');
        var url = formData.attr('action');
        callApi(url, null, POST_METHOD)
            .then(() => {
                getCategoryEdit(urlCategoryEdit)
                list()
                toastr.success('Xoa danh muc thanh cong');
                $('#deleteForm').modal('hide');
            })
            .catch((res) => {
                if (res.status == 403) {
                    alert('ban khong co quyen xoa');
                }
            })

    });


    $(document).ready(function () {
        $('#search').on('keyup', function () {
            let formData = $('#formSearch');
            var data = $(this).val();
            var url = formData.attr('action');
            callApi(url + '?search=' + data)
                .then((res) => {
                    $('#list').replaceWith(res);
                })
        });
    });

    function getCategory(url) {
        callApi(url)
            .then((res) => {
                $('#parent_category').replaceWith(res);
            })
    }

    function getCategoryEdit(url) {
        callApi(url)
            .then((res) => {
                $('#parent_category_edit').replaceWith(res);
            })
    }


});

