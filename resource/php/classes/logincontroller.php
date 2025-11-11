<?php
    class logincontroller extends loginmodel {
        private $email;
        private $password;

        public function __construct($email, $password) {
            $this->email = $email;
            $this->password = $password;
        }

        public function loginUser() {
            if ($this->emptyInput()) {
                // Empty fields
                $this->errorSetter('empty_form', 'Fill all fields');
            } elseif ($this->emailInvalid()) {
                // Invalid Email
                $this->errorSetter('invalid_email', 'Please use a valid email');
            } elseif (!$this->emailExists()) {
                // User does not exists or Wrong email
                $this->errorSetter('no_user', 'User does not exists or Wrong Email');
            } elseif ($this->emailExists() && !$this->passwordSame()) {
                // Incorrect password
                $this->errorSetter('wrong_pass', 'Wrong Password');
            } else {
                // Login User
                $result = $this->getUser($this->email);
                $new_session = session_create_id();
                $sessionID = $new_session . "_" . $result['user_id'];
                $role_result = $this->getUserRole($result['user_id']);
                $_SESSION['user_id'] = $result['user_id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['phone'] = $result['phone_number'];
                $_SESSION['role'] = $role_result['role_id'];
                $_SESSION['last_regeneration'] = time();
                session_id($sessionID);
            }
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['login_errors'] = $error_arr;
            header('Location: ../../login-page.php');
            die();
        }
        private function emptyInput() {
            if (empty($this->email) || empty($this->password)) {
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
        private function emailExists() {
            if ($this->getUser($this->email) == 0) {
                return false;
            } else {
                return true;
            }
        }
        private function passwordSame() {
            $result = $this->getUser($this->email);
            if (password_verify($this->password, $result['password'])) {
                return true;
            } else {
                return false;
            }
        }
    }
?>