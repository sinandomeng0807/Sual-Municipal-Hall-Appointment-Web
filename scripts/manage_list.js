$(document).ready(function(){
    function get_list() {
        $.ajax({
            url:"../controller/ManageList.php",
            method:"POST",
            data:{},
            dataType:"json",
            success:function(data){
                $(".appointment-list").html(data.list);
            }
        })
    }

    get_list();
})