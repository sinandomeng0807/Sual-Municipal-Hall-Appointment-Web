$(document).ready(function(){
    function load_unseen_notification(view=''){
        $.ajax({
        url:"../controller/NotificationPost.php",
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data){
            $(".ul_notification").html(data.notification);
            if (data.count > 0) {
                document.getElementById("notifBadge").style.display = 'block';
            } else {
                document.getElementById("notifBadge").style.display = 'none';
            }
        }
    })
}

load_unseen_notification("");

document.getElementById("notificationBtn").addEventListener("click", function() {
    document.getElementById("notificationDropdown").classList.toggle("show");
    document.getElementById("notifBadge").style.display = 'none'; // Remove badge on click
});

window.addEventListener("click", function(event) {
    if (!document.getElementById("notificationBtn").contains(event.target) && 
        !document.getElementById("notificationDropdown").contains(event.target)) {
        document.getElementById("notificationDropdown").classList.remove("show");
        load_unseen_notification('yes');
    }
});

// Show badge if there are notifications
document.addEventListener("DOMContentLoaded", function() {
    let hasNotifications = document.querySelectorAll("#notificationDropdown ul li").length;
    if (hasNotifications) {
        document.getElementById("notifBadge").style.display = 'block';
    } else {
        document.getElementById("notifBadge").style.display = 'none';
    }
});

setInterval(function(){ 
    load_unseen_notification();
}, 5000);
});