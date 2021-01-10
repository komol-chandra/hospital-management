$(document).ready(function () {
    $(document).on("submit", "#form_insert", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            data: data,
            url: "/admin/service",
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
                console.log(error.responseJSON.errors);
                error.responseJSON.errors.forEach(function (v, i) {
                    console.log(v);
                });
            },
        });
    });
    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");
        // console.log(data);
        $.ajax({
            url: `/admin/service/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".e_id").val(response.id);
                $(".e_name").val(response.name);
                $(".e_quantity").val(response.quantity);
                $(".e_description").val(response.description);
                $(".e_rate").val(response.rate);
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
            url: `/admin/service/${id}`,
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
