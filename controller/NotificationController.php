<?php
    require "../model/NotificationModel.php";

    class NotificationList {
        public function getNotification($view){
            $notifications = new Notification();
            if ($view != '') {
                $notifications->updateSeenNotification();
            }

            $output = "";
            $notify_list = $notifications->fetchNotification();
            $notify_count = mysqli_num_rows($notify_list);
            if ($notify_count > 0) {
                foreach ($notify_list as $row){
                    $output .= "
                    <li class='is_notify'>
                    <b>".
                    $row["notify_appoint"]. 
                    "Appointment: </b>
                    <span>". 
                    $row["notify_name"]. 
                    "</span>
                    </li>";
                }
            } else {
                $output .= '
                <li><span><a href="#" class="text-bold text-italic">No Noti Found</a></span></li>
                ';
            }
            $count = $notifications->getUnseenCount();
            $data = array (
                "notification" => $output,
                "count" => $count
            );
            return json_encode($data);
        }
    }    
?>