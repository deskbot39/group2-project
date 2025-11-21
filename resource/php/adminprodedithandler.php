<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pid = (int)$_POST['hidden_pid'];
        $pname = $_POST['pname'];
        $pdesc = $_POST['pdesc'];
        $pprice = $_POST['pprice'];
        $pstock = $_POST['pstock'];
        $plink = $_POST['plink'];

        require_once 'conf_session.php';
        include 'classes/conf_db.php';
        include 'classes/adminmodelprod.php';
        include 'classes/adminprodeditcontroller.php';

        $upd = new adminprodeditcontroller($pid, $pname, $pdesc, $pprice, $pstock, $plink);
        if ($upd->productExists()) {

            if (empty($plink)) {
                $upd->updateItemName();
                $upd->updateItemDesc();
                $upd->updateItemPrice();
                $upd->updateItemStock();
    
                header('location: ../../admin-product.php');
                die();

            } else {
                $upd->updateItemName();
                $upd->updateItemDesc();
                $upd->updateItemPrice();
                $upd->updateItemStock();
                $upd->updateImgLink();
    
                header('location: ../../admin-product.php');
                die();
            }
        }

} else {
    header('location: ../../admin-product.php');
    die();
}
?>