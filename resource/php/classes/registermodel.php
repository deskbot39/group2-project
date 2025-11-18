<?php
    declare(strict_types= 1);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class registermodel extends conf_db {

        protected function getUser(string $username) {
            $query = "SELECT `user_id` FROM users WHERE username = :username";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        
        protected function getEmail(string $email) {
            $query = "SELECT `email` FROM users WHERE email = :email";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function getPhone(string $phone) {
            $query = "SELECT `phone` FROM users WHERE phone = :phone";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":phone", $phone);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function setUser(string $username, string $email, string $pass, string $phone) {
            require('../../vendor/PHPMailer/src/Exception.php');
            require('../../vendor/PHPMailer/src/PHPMailer.php');
            require('../../vendor/PHPMailer/src/SMTP.php');
            $hashed_pwd = password_hash($pass, PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(16));
            $email_hash = hash("sha256", $token);
            $mail = new PHPMailer(true);
            $link = $_SERVER['HTTP_HOST'];

            $query = "INSERT INTO users (`username`, `email`, `password`, `phone`, `email_hash`) VALUES (:username, :email, :password1, :phone, :ehash)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password1", $hashed_pwd);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":ehash", $email_hash);
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
                $mail->Subject = "Wang Scent PH | Account Activation";
                $mail->Body = <<<END
                    Click <a href="$link/group2-project/verify-email.php?token=$token">this link</a> to activate your email for your account.
                END;
                try {
                    $mail->send();

                } catch (Exception $e) {
                    echo $mail->ErrorInfo;
                    die();
                }

            }

        }
    }
?>