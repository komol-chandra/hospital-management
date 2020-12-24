$(document).ready(function () {
    $(this).on("submit", "#form_insert", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: `/admin/generic`,
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });
                $("#close").click();
                $("#form_insert").trigger("reset");
            },
            error: function (error) {
                alert("Field Requeued");
            },
        });
    });
    $(this).on("click", ".edit", function () {
        let data = $(this).attr("data");
        $.ajax({
            url: `/admin/generic/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".e_id").val(response.id);
                $(".e_name").val(response.name);
                $(".e_description").val(response.description);
            },
        });
    });
    $(this).on("submit", "#form_update", function (e) {
        e.preventDefault();
        let id = $(".e_id").val();
        let data = $(this).serializeArray();
        $.ajax({
            url: `/admin/generic/${id}`,
            data: data,
            type: "put",
            dataType: "json",
            success: function (response) {
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });
                $("#close2").click();
                $("#form_update").trigger("reset");
            },
            error: function (error) {
                alert("Field Requeued");
            },
        });
    });
});
