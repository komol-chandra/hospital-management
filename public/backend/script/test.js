$(document).ready(function () {
    $(document).on("submit", "#form_insert", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            data: data,
            url: "/admin/test",
            type: "post",
            dataType: "json",
            success: function (response) {
                console.log(response);
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });

                $(".close").click();
                $("#form_insert").trigger("reset");
            },
            error: function (error) {
                console.log("wrang");
            },
        });
    });
    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");
        $.ajax({
            url: `/admin/test/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".e_id").val(response.id);
                $(".e_name").val(response.name);
                $(".e_details").val(response.details);
                $(".e_lab_name").val(response.lab_name);
                $(".e_prize").val(response.prize);
                if (response.status == 1) {
                    $(".one").attr("checked", "checked");
                } else {
                    $(".two").attr("checked", "checked");
                }
            },
        });
    });
    $(document).on("submit", "#form_update", function (e) {
        e.preventDefault();
        let id = $(".e_id").val();
        let data = $(this).serializeArray();
        console.log(data);
        console.log(id);

        $.ajax({
            url: `/admin/test/${id}`,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                console.log(response);
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });

                $(".close2").click();
                $("#form_update").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
