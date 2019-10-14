$(document).ready(function () {
    $('#dateRange').datepicker({
        todayHighlight: !0,
        format: 'dd/mm/yyyy',
        orientation: "bottom",
        templates: {leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'}
    });
    $('#closeDate').datepicker({
        todayHighlight: !0,
        format: 'dd/mm/yyyy',
        orientation: "bottom",
        templates: {leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'}
    });


});