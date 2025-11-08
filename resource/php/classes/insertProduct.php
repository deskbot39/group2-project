<?php
    class insertProduct extends db_conf {
        private $pid;
        private $pname;
        private $pprice;
        private $pdesc;
        private $pstock;
        private $pimg;

        public function __construct($pid, $pname, $pprice, $pdesc, $pstock, $pimg) {
            $this->pid = $pid;
            $this->pname = $pname;
            $this->pprice = $pprice;
            $this->pdesc = $pdesc;
            $this->pstock = $pstock;
            $this->pimg = $pimg;
        }

        private function addProduct() {
            $query = "INSERT INTO product() VALUES (:pid, :pname, :pprice, :pdesc, :pstock, :pimg);";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $this->pid);
            $stmt->bindParam(":pname", $this->pname);
            $stmt->bindParam(":pprice", $this->pprice);
            $stmt->bindParam(":pdesc", $this->pdesc);
            $stmt->bindParam(":pstock", $this->pstock);
            $stmt->bindParam(":pimg", $this->pimg);
            $stmt->execute();
        }
    }
?>