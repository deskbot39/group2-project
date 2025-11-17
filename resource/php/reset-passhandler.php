<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require('../../vendor/PHPMailer/src/Exception.php');
        require('../../vendor/PHPMailer/src/PHPMailer.php');
        require('../../vendor/PHPMailer/src/SMTP.php');
        require_once 'conf_session.php';
        include "classes/conf_db.php";

        $email = $_POST['reset-email'];
        $token = bin2hex(random_bytes(16));
        $reset_hash = hash("sha256", $token);
        $reset_expiry = date("Y-m-d H:i:s", time() + 60 * 30);
        
        $db = new conf_db();
        $mail = new PHPMailer(true);

        function mailExists($str) {
            $db = new conf_db();
            $query = "SELECT * FROM users WHERE email = :mail";
            $stmt = $db->connect()->prepare($query);
            $stmt->bindParam(":mail", $str);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && mailExists($email)) {
            $query = "UPDATE users SET pwd_token = :rhash, pwd_token_expire = :expiry WHERE email = :mail";
            $stmt = $db->connect()->prepare($query);
            $stmt->bindParam(":rhash", $reset_hash);
            $stmt->bindParam(":expiry", $reset_expiry);
            $stmt->bindParam(":mail", $email);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $mail->isSMTP();
                $mail->SMTPAuth = true;

                $mail->Host = "smtp.gmail.com";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->Username = "do.not.reply.project2@gmail.com";
                $mail->Password = "hsec stvh ypkt mnpc";
                $mail->isHtml(true);

                $mail->setFrom("do.not.reply.project2@gmail.com");
                $mail->addAddress($email);
                $mail->Subject = "Wang Scent PH | Password Reset";
                $mail->Body = <<<END
                    Click <a href="localhost/group2-project/change-pass.php?token=$token">this link</a> to reset your password. Link will expire in 30 minutes.
                END;
                try {
                    $mail->send();

                } catch (Exception $e) {
                    echo "Message not sent. {$mail->ErrorInfo}";
                }
            }
            echo 'Please check your email';
        } else {
            echo 'Foo';
        }

    } else {
        echo 'Bar';
    }
?>