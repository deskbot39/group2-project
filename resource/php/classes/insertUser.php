<?php
    class insertUser extends db_conf {
        private $usr;
        private $pwd;
        private $num;
        private $mail;

        public function __construct($usr, $pwd, $num , $mail) {
            $this->usr = $usr;
            $this->pwd = $pwd;
            $this->num = $num;
            $this->mail = $mail;
        }

        private function addUser() {
            $query = "INSERT INTO user(`username`, `password`,`email`,`phone_number`) VALUES (:usr, :pwd, :mail, :num);";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usr", $this->usr);
            $stmt->bindParam(":pwd", $this->pwd);
            $stmt->bindParam(":mail", $this->mail);
            $stmt->bindParam(":num", $this->num);
            $stmt->execute();
        }
    }
?>