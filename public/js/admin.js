$("#checkAll").click(function () {
    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    if ($("#checkAll").is(":checked")) {


    }
});
$("input[type=checkbox]").click(function () {
    if (!$(this).prop("checked")) {
        $("#checkAll").prop("checked", false);

    }
});
$(".sub_chk").change(function () {

    if ($('.sub_chk:checked').length == $('.sub_chk').length) {
        $("#checkAll").prop("checked", true);
    }
});

