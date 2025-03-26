<?php

class EmailController {
    public function sendEmail() {
        require "../model/EmailModel.php";
        $mail = new EmailSender();
        echo $mail->send("test@email.com", "Test PHP", "Test Subject PHP", "Test Body PHP");
    }
}

$test = new EmailController();
$test->sendEmail();
?>