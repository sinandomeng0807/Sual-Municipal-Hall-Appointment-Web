$(document).ready(function(){
    function get_list() {
        $.ajax({
            url:"../controller/ManagePost.php",
            method:"POST",
            data:{},
            dataType:"json",
            success:function(data){
                $(".appointment-list").html(data.list);
            }
        })
    }

    get_list();

    $("input[type=radio][name=category]").change(function(){
        var category_val = $("input[type=radio][name=category]:checked").val();
        if (category_val == "Approve") {
            $(".pending").hide();
            $(".decline").hide();
            $(".approve").show();
        } else if (category_val == "Pending") {
            $(".pending").show();
            $(".decline").hide();
            $(".approve").hide();
        } else if (category_val == "Decline") {
            $(".pending").hide();
            $(".decline").show();
            $(".approve").hide();
        } else if (category_val == "All") {
            $(".pending").show();
            $(".decline").show();
            $(".approve").show();
        }
    });
})