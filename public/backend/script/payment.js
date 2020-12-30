$(document).ready(function () {
    $(this).on("submit", "#form_insert", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: `/admin/payment`,
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
            url: `/admin/payment/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".e_id").val(response.id);
                $(".e_name").val(response.name);
                $(".e_account_id").val(response.account_id);
                $(".e_pay_to").val(response.pay_to);
                $(".e_description").val(response.description);
            },
        });
    });
    $(this).on("submit", "#form_update", function (e) {
        e.preventDefault();
        let id = $(".e_id").val();
        let data = $(this).serializeArray();
        $.ajax({
            url: `/admin/payment/${id}`,
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
