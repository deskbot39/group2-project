<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['euid'];
        $name = $_POST['ename'];
        $mail = $_POST['eemail'];
        $pwd = $_POST['epass'];
        $confirm = $_POST['veepass'];
        $phone = $_POST['ephone'];
        
        require_once 'conf_session.php';
        include "classes/conf_db.php";
        include "classes/adminmodeluser.php";
        include "classes/adminusereditorcontroller.php";

        $uec = new adminusereditorcontroller($id, $name, $mail, $pwd, $confirm, $phone);

        if (empty($pwd) && empty($confirm)) {
            $uec->updName();
            $uec->updEmail();
            $uec->updPhone();
            
            header('location: ../../admin-user.php');
            die();
        } else {
            $uec->updName();
            $uec->updEmail();
            $uec->updPhone();
            $uec->updPwd();
            
            header('location: ../../admin-user.php');
            die();
        }

} else {
    header('location: ../../admin-user.php');
    die();
}
?>