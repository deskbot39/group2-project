<?php
    class adminprodeditcontroller extends adminmodelprod {
        private $id;
        private $name;
        private $desc;
        private $price;
        private $stock;
        private $link;

        public function __construct($id, $name, $desc, $price, $stock, $link) {
            $this->id = $id;
            $this->name = $name;
            $this->desc = $desc;
            $this->price = $price;
            $this->stock = $stock;
            $this->link = $link;
        }

        public function productExists() {
            if ($this->getProduct($this->id)) {
                return true;
            } else {
                return false;
            }
        }

        public function updateItemName() {
            if (empty($this->name)) {
                $this->errorSetter('empty_pname', 'Empty Product Name');
                
            } elseif ($this->checkNameEditExists($this->name, $this->id)) {
                $this->errorSetter('exist_pname', 'Product Name Already Exists');

            } else {
                $this->updateProductName($this->id, $this->name);
                $this->successSetter("pname_upd", "Updated Item Name!");
            }
        }

        public function updateItemDesc() {
            if (empty($this->desc)) {
                $this->errorSetter('empty_desc', 'Empty Description');

            } else {
                $this->updateProductDesc($this->id, $this->desc);
                $this->successSetter("pdesc_upd", "Updated Item Description!");
            }
        }
        
        public function updateItemPrice() {
            if (empty($this->price)) {
                $this->errorSetter('empty_price', 'Empty Price');
    
            } elseif ($this->price < 0) {
                $this->errorSetter("val_err","There should be no negative values");

            } else {
                $this->updateProductPrice($this->id, $this->price);
                $this->successSetter("pprice_upd", "Updated Product Price!");
            }
            
        }
        
        public function updateItemStock() {
            if (empty($this->stock)) {
                $this->errorSetter('empty_stock', 'Empty Stock');
    
            } elseif ($this->stock < 0) {
                $this->errorSetter("val_err","There should be no negative values");

            } else {
                $this->updateProductStock($this->id, $this->stock);
                $this->successSetter("pstock_upd", "Updated Product Stock!");
            }
            
        }
        
        public function updateImgLink() {
            if (empty($this->link)) {
                $this->errorSetter('empty_link', 'Empty link');
    
            } else {
                $this->updateImageLink($this->id, $this->link);
                $this->successSetter("plink_upd", "Updated Product Image Link!");
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

    }
?>