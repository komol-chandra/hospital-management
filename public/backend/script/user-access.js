$(document).ready(function () {
    dataList();
    $(this).on("click", ".edit", function () {
        let data = $(this).attr("data");
        $.ajax({
            url: `/admin/rbac/user_access/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response.email);
                $(".e_id").val(response.id);
                $(".e_name").val(response.name);
                $(".e_email").val(response.email);
            },
        });
    });
    $(this).on("submit", "#form_update", function (e) {
        e.preventDefault();
        let id = $(".e_id").val();
        let data = $(this).serializeArray();
        $.ajax({
            url: `/admin/rbac/user_access`,
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                dataList();
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });
                $("#close2").click();
                $("#form_update").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    $(".dataList").on("click", ".page-link", function (e) {
        e.preventDefault();
        let page_link = $(this).attr("href");
        dataList(page_link);
    });
    $(document).on("keyup", ".search", function () {
        dataList();
    });
});
function dataList(page_link = "/admin/rbac/userAccessList") {
    let search = $(".search").val();
    $.ajax({
        url: page_link,
        data: { search: search },
        type: "get",
        datatype: "html",
        success: function (response) {
            $(".dataList").html(response);
        },
    });
}
