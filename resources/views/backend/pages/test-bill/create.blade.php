@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Test Bill')
@section('header-title', 'Create Test Bill')
@section('breadcrumb', 'Create Test Bill')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/test-bill','method'=>'post']) !!}
                    @include('backend.pages.test-bill.form')
                        <div class="col-sm-12 reset-button">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function () {
    let max_field = 30;
    let wrapper = $(".input_field");
    let add_field = $(".add_field");
    let i = 1;

    $(add_field).click(function (e) {
        e.preventDefault();
        if (i < max_field) {
            i++;
            $("#row_no").val(i);
            $(wrapper).append(
                `<div>\
                    <table>\
                        <tr>\
                            <td>\
                              <select class='form-control' name='test_id[]' style='width: 170px;'>\
                                <option selected hidden disabled>Account Select</option>\
                                @foreach($tests as  $value)\
                                <option value='{{ $value->id }}'>{{ $value->name }}</option>\
                                @endforeach\
                              </select>\
                            </td>\
                            <td>\
                              <input type='text' name='description[]' class='form-control description' style='margin-left: 9px; width:400px;' placeholder='Description'>\
                            </td>\
                            <td>\
                              <input type='number' name='quantity[]' class='form-control quantity ' style='margin-left: 9px; width:70px;'>\
                            </td>\
                            <td>\
                              <input type='number' name='price[]' class='form-control price ' style='margin-left: 9px; width: 70px;'>\
                            </td>\
                            <td>\
                              <input type='text' name='sub_total[]' class='form-control sub_total amount' style='margin-left: 9px; width: 170px;'readonly>\
                            </td>\
                            <td>\
                              <button class='btn btn-danger btn-sm remove_field' style='margin-left: 8px;'><i class='fa fa-trash'></i></button>\
                            </td>\
                        </tr>\
                    </table></div>`
            );
        }
    });
    $(wrapper).on("click", ".remove_field", function (e) {
        e.preventDefault();
        $(this).closest("div").remove();
        i--;
        fnAlltotal();
    });

    $(".patientId").keyup(function () {
        let patientId = $(this).val();
        $.ajax({
            url: "/admin/matchPatientBill",
            type: "get",
            data: { patientId: patientId },
            dataType: "json",
            success: function (response) {
                if (response.name) {
                    $(".icon").html("your Mobile Number Matched");
                    $(".fullName").val(response.name);
                    $(".address").val(response.address);
                } else {
                    $(".icon").html("your Mobile Number Did not Match");
                }
            },
        });
    });
    jQuery(document).on(
        "change ,  keyup",
        "input[name='quantity[]'] , input[name='price[]']",
        function () {
            let parent_element = jQuery(this).closest("tr");
            let qty = jQuery(parent_element)
                .find("input[name='quantity[]']")
                .val();
            let price = jQuery(parent_element)
                .find("input[name='price[]']")
                .val();
            if (qty.trim() != "" && price.trim() != "") {
                jQuery(parent_element)
                    .find("input[name='sub_total[]']")
                    .val(parseInt(qty) * parseInt(price));
            } else {
                jQuery(parent_element)
                    .find("input[name='sub_total[]']")
                    .val("");
            }
        }
    );
    $(document).on("change", ".price", function () {
        let self = $(this);
        let priceVal = self.next().val();
        self.next()
            .next()
            .val(priceVal * self.val());
        fnAlltotal();
    });
    $(document).on("change", ".quantity", function () {
        let self = $(this);
        let qtyVal = self.prev().val();
        self.next().val(qtyVal * self.val());
        fnAlltotal();
    });
    function fnAlltotal() {
        let total = 0;
        $(".amount").each(function (i, e) {
            // console.log($(this).val());
            total += parseInt($(this).val() || 0);
        });
        $(".result").val(total);
        $(".grand_total").val(total);
        $(".due").val(total);
    }
    $(document).on("change", ".vatPercent", function () {
        let vatPercent = $(this).val();
        let result = $(".result").val();
        let vat = parseInt((result * vatPercent) / 100);
        console.log(vat);
        $(".vat").val(vat);
        let total = $(".grand_total").val();
        let grandTotal = parseInt(vat) + parseInt(total);
        $(".grand_total").val(grandTotal);
        $(".due").val(grandTotal);
    });

    $(document).on("change", ".discountPercent", function () {
        let discountPercent = $(this).val();
        $(".discount").val(discountPercent);
        let discountAmount = $(".discount").val();
        let total = $(".grand_total").val();
        let discount = parseInt((total * discountAmount) / 100);
        $(".discount").val(discount);
        let grandTotal = parseInt(total) - parseInt(discount);
        $(".grand_total").val(grandTotal);
        $(".due").val(grandTotal);
    });
    $(document).on("change", ".paid", function () {
        let paid = $(this).val();
        let total = $(".grand_total").val();
        let due = parseInt(total) - parseInt(paid);
        $(".due").val(due);
    });
});

</script>
@endsection