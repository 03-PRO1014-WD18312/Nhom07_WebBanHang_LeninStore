<?php
require_once 'OrderModel.php'; 

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
    }

    public function index() {
        try {
            $orders = $this->orderModel->getAllOrders();

            
            require 'order.php'; 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        require_once 'view/globle/footer.php';
    }

    public function detail($orderId) {

        echo "Chi tiết Đơn hàng #$orderId";
    }
}
   