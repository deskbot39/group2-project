<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once 'conf_session.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
        require('../../vendor/PHPMailer/src/Exception.php');
        require('../../vendor/PHPMailer/src/PHPMailer.php');
        require('../../vendor/PHPMailer/src/SMTP.php');
        include "classes/conf_db.php";

        $email = $_POST['reset-email'];
        $token = bin2hex(random_bytes(16));
        $reset_hash = hash("sha256", $token);
        $reset_expiry = date("Y-m-d H:i:s", time() + 60 * 30);
        
        $db = new conf_db();
        $mail = new PHPMailer(true);

        function mailExists($str) {
            $db = new conf_db();
            $query = "SELECT email FROM users WHERE email = :mail";
            $stmt = $db->connect()->prepare($query);
            $stmt->bindParam(":mail", $str);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        function mailNotFound($test) {
            if (mailExists($test) === NULL) {
                return true;
            } else {
                return false;
            }
        }

        function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['reset_errors'] = $error_arr;
        }
        
        function successSetter($code, $text) {
            $succ_arr = [];
            $succ_arr[$code] = $text;
            $_SESSION['reset_good'] = $succ_arr;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && mailNotFound($email) !== NULL) {
            $link = $_SERVER['HTTP_HOST'];
            $query = "UPDATE users SET pwd_token = :rhash, pwd_token_expire = :expiry WHERE email = :mail";
            $stmt = $db->connect()->prepare($query);
            $stmt->bindParam(":rhash", $reset_hash);
            $stmt->bindParam(":expiry", $reset_expiry);
            $stmt->bindParam(":mail", $email);
            $stmt->execute();
            $return = $stmt->rowCount();

            if ($return) {
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
                    Click <a href="$link/group2-project/change-pass.php?token=$token">this link</a> to reset your password. Link will expire in 30 minutes.
                END;
                try {
                    $mail->send();

                } catch (Exception $e) {
                    echo $mail->ErrorInfo;
                }

            }

            successSetter("sent_mail", "Reset Email has been sent");
            header('location: ../../forgot-pass.php');
            die();

        } else {
            errorSetter("invalid_mail", "Invalid Email");
            header('location: ../../forgot-pass.php');
            die();
        }
        
    } else if(time() >= $_SESSION['csrf_expire']) {
        header('location: ../../forgot-pass.php');
        die();
    } else {
        header('location: ../../forgot-pass.php');
        die();
    }
?>