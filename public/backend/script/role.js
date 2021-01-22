$(document).ready(function () {
    dataList();
    $(this).on("submit", "#form_insert", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: `/admin/rbac/role`,
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
                $("#close").click();
                $("#form_insert").trigger("reset");
            },
            error: function (error) {
                // alert("Field Requeued");
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
function dataList(page_link = "/admin/rbac/roleList") {
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
