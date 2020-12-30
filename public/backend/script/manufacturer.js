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
    $(this).on("click", ".edit", function () {
        let id = $(this).attr("data");
        $.ajax({
            url: `/admin/manufacturer/${id}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".e_id").val(response.id);
                $(".e_name").val(response.name);
                $(".e_mobile").val(response.mobile);
                $(".e_email").val(response.email);
                $(".e_address").val(response.address);
                $(".e_details").val(response.details);
                $(".e_picture").attr(
                    "src",
                    response.picture
                        ? `${response.picture}`
                        : "/backend/files/profile.jpg"
                );
                // $(".e_details").val(response.details);
            },
        });
    });
    $(this).on("submit", "#form_update", function (e) {
        e.preventDefault();
        let id = $(".e_id").val();
        let data = $("#form_update").get(0);
        // console.log(data);
        $.ajax({
            url: `/admin/manufacturer/${id}`,
            data: new FormData(data),
            type: "PUT",
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
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
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#e_picture").attr("src", e.target.result).width(200).height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
