<?php
    declare(strict_types=1);
    class adminmodelorder extends conf_db {

        public function updatedOrder(int $order_id, string $status) {
            $query = "UPDATE orders SET status = :status WHERE order_id = :oid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":oid", $order_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteOrder(int $order_id) {
            $query = "DELETE FROM orders WHERE order_id = :oid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":oid", $order_id);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function addBacktoStock(int $qty, int $pid) {
            $query = "UPDATE products SET stock = stock + :qty WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindValue(":qty", $qty, PDO::PARAM_INT);
            $stmt->bindParam(":pid", $pid, PDO::PARAM_INT);
            $stmt->execute();
        }

        protected function cancelledReturn(int $order_id) {
            $o_items = $this->getOrderItems($order_id);

            foreach ($o_items as $itm) {
                $qty = (int)$itm['quantity'];
                $pid = (int)$itm['product_id'];
                $this->addBacktoStock($qty, $pid);
            }
        }

        protected function getOrderItems(int $order_id) {
            $query = "SELECT * FROM order_item WHERE order_id = :oid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":oid", $order_id);
            $stmt->execute();
    
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>