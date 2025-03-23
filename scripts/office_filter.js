$(document).ready(function(){
    $("input[type=radio][name=category]").change(function(){
        var category_val = $("input[type=radio][name=category]:checked").val();
        if (category_val == "Visitors") {
            $(".resident").hide();
            $(".visitor").show();
        } else if (category_val == "Residents") {
            $(".resident").show();
            $(".visitor").hide();
        } else if (category_val == "All") {
            $(".resident").show();
            $(".visitor").show();
        }
    });

    function filter_office(office=""){
        $.ajax({
            url:"../controller/AppointmentList.php",
            method:"POST",
            data:{office:office},
            dataType:"json",
            success:function(data){
                $(".appointment-list").html(data.list);
            }
        })
    }

    filter_office("")

    $(".select-office").change(function(){
        filter_office(this.value);
    })
});