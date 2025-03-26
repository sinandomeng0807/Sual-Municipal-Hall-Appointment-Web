$(document).ready(function(){
    $(".search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".appointment-list tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});