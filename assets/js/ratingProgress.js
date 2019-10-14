$('#user-rating-form').on('change','[name="rating"]',function(){
    $('#selected-rating').text($('[name="rating"]:checked').val());
    var radioValue = $("input[name='rating']:checked"). val();
});
$(".progress").slider(
    {
        tooltip: 'show'
    }
);
$(".progress").on("slide", function(slideEvt) {
    $(".progressVal").text(slideEvt.value +'%');
    $(".progressVal").val(slideEvt.value);


});