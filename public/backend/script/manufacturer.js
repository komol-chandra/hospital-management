$(document).ready(function () {
    $(this).on("submit", "#form_insert", function (e) {
        e.preventDefault();
        let data = $("#form_insert").get(0);
        $.ajax({
            url: "/admin/manufacturer",
            type: "post",
            data: new FormData(data),
            enctype: "multipart/form-data",
            processData: false,
            contentType: false,
            success: function (response) {
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });
                $("#close").click();
                $("#form_insert").trigger("reset");

                // if (response.status == 201) {
                // }
            },
            error: function (errors) {
                console.log(errors);
            },
        });
    });
});
