$(document).ready(function () {
    console.log("ready");
    dataList();
    $(".dataList").on("click", ".page-link", function (e) {
        e.preventDefault();
        let page_link = $(this).attr("href");
        dataList(page_link);
    });
    $(document).on("keyup", ".search", function () {
        dataList();
    });
});
function dataList(page_link = "/admin/patientList") {
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
