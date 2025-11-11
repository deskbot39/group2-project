<?php
    class registercontroller extends registermodel {
        private $username;
        private $email;
        private $password;
        private $confirm_password;
        private $phone;

        public function __construct($username, $email, $password, $confirm_password, $phone) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->confirm_password = $confirm_password;
            $this->phone = $phone;
        }

        public function registerUser() {
            if ($this->emptyInput()) {
                $this->saveRegInputs();
                $this->errorSetter('empty_form', 'Fill all fields');
            } else if ($this->usernameInvalid()) {
                $this->saveRegInputs();
                $this->errorSetter('invalid_name','Username must be at least 4 characters long');
            } else if ($this->emailInvalid()) {
                $this->saveRegInputs();
                $this->errorSetter('invalid_email','Please use a valid email');
            } else if ($this->phoneInvalid()) {
                $this->saveRegInputs();
                $this->errorSetter('invalid_phone','Please use a valid phone number');
            } else if ($this->passwordInvalid()) {
                $this->saveRegInputs();
                $this->errorSetter('invalid_pass','Please use a valid password');
            } else if (!$this->passwordMatch()) {
                $this->saveRegInputs();
                $this->errorSetter('diff_pass','Entered passwords do not match');
            } else if ($this->userExists()) {
                $this->saveRegInputs();
                $this->errorSetter('user_taken','Username is already taken');
            } else if ($this->emailExists()) {
                $this->saveRegInputs();
                $this->errorSetter('email_taken','Email is already used');
            } else {
                $this->setUser($this->username,$this->email,$this->password,$this->phone);
                $this->setUserRoles($this->username);
                unset($_SESSION['saved_input']);
            }
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['register_errors'] = $error_arr;
            header('Location: ../../register-page.php');
            die();
        }

        private function saveRegInputs() {
            $saved_arr = [
                'username' => $this->username,
                'email' => $this->email,
                'phone' => $this->phone
            ];
            $_SESSION['saved_input'] = $saved_arr;
        }

        private function emptyInput() {
            if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirm_password) || empty($this->phone)) {
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
            if (!preg_match('/^[0-9]{11}$/', $sanitized_phone)) {
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
    }
?>