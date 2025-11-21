<?php
    class adminusereditorcontroller extends adminmodeluser {
        private $id;
        private $username;
        private $email;
        private $password;
        private $confirm_password;
        private $phone;

        public function __construct($id, $username, $email, $password, $confirm_password, $phone) {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->confirm_password = $confirm_password;
            $this->phone = $phone;
        }

        public function updName() {
            if (empty($this->username)) {
                $this->errorSetter('empty_name', 'Empty username');
            } elseif ($this->usernameInvalid()) {
                $this->errorSetter('invalid_name', 'Invalid username');
                
            } else {
                $this->updateUsername($this->username, $this->id);
                $this->successSetter("uname_upd", "Updated User Information!");
            }
        }
        
        public function updEmail() {
            if (empty($this->email)) {
                $this->errorSetter('empty_email', 'Empty email');
                
            } elseif ($this->emailInvalid()) {
                $this->errorSetter('invalid_email', 'Invalid email');
                
            } else {
                $this->updateEmail($this->email, $this->id);
                $this->successSetter("email_upd", "Updated User Information!");
            }
        }

        public function updPhone() {
            if (empty($this->phone)) {
                $this->errorSetter('empty_phone', 'Empty phone');
                
            } elseif ($this->phoneInvalid()) {
                $this->errorSetter('invalid_phone', 'Invalid phone number');

            } else {
                $this->updatePhone($this->phone, $this->id);
                $this->successSetter("phone_upd", "Updated User Information!");

            }
        }

        public function updPwd() {
            if (empty($this->password) || empty($this->confirm_password)) {
                $this->errorSetter('empty_pwd', 'Empty password');
                
            } elseif ($this->passwordInvalid()) {
                $this->errorSetter('invalid_pwd', 'Invalid password');

            } elseif ($this->passwordMatch()) {
                $this->errorSetter('diff_pwd', 'Password does not match');

            } else {
                $this->updatePassword($this->password, $this->id);
                $this->successSetter("pwd_upd", "Updated User Information!");
            }
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['admin_errors'] = $error_arr;
        }

        private function successSetter($code, $text) {
            $success_arr = [];
            $success_arr[$code] = $text;
            $_SESSION['admin_good'] = $success_arr;
        }

        private function userExists() {
            if ($this->getUser($this->username)) {
                return true;
            } else {
                return false;
            }
        }
        private function emailExists() {
            if ($this->getEmail($this->email)) {
                return true;
            } else {
                return false;
            }
        }
        private function emailInvalid() {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }
        private function usernameInvalid() {
            if (strlen($this->username) < 4) {
                return true;
            } else {
                return false;
            }
        }
        private function passwordInvalid() {
            $reg_upper = "@[A-Z]@";
            $reg_lower = "@[a-z]@";
            $reg_schar = "@[^\W]@";
            $reg_num = "@[0-9]@";
            if (!preg_match($reg_upper, $this->password) || !preg_match($reg_lower, $this->password) || !preg_match($reg_schar, $this->password) || !preg_match($reg_num, $this->password) || strlen($this->password) < 8) {
                return true;
            } else {
                return false;
            }
        }
        private function phoneInvalid() {
            $sanitized_phone = filter_var($this->phone, FILTER_SANITIZE_NUMBER_INT);
            if (!preg_match('/^09\d{9}$/', $sanitized_phone)) {
                return true;
            } else {
                return false;
            }
        }
        private function passwordMatch() {
            if ($this->password !== $this->confirm_password) {
                return false;
            } else {
                return true;
            }
        }
    }
?>