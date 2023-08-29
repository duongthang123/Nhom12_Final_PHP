<?php

use function PHPSTORM_META\map;

require_once("app/Model/Order.php");
require_once("app/Model/OrderDetail.php");

class OrderController 
{
    private $order;
    private $orderDetail;

    public function __construct()
    {
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }

    public function index()
    {
        
        $orderList = $this->order->getAllOrders();

        $arrayId = [];

        foreach($orderList as $orderIteam)
        {
            $orderId =  $orderIteam['id'];
            array_push($arrayId, $orderId);
        }

        $array = [];
        foreach ($orderList as &$orderItem) {
            $arrayList = [];
            foreach ($arrayId as $itemId) {
                $list = $this->orderDetail->getOrderDetailsList($itemId);
                foreach ($list as $item) {
                    if ($orderItem['id'] == $item['oder_id']) {
                        $arrayList[] = $item;
                    }
                }
            }
            $orderItem['product'] = $arrayList;
            $array[] = $orderItem;
        }

        require "views/admin/donHangMoi/index.php";
    }

    public function statusOrder()
    {
        $orderListConfirm = $this->order->listConfirmOrder();

        require "views/admin/tinhTrangDH/index.php";
    }

    public function confirmOrder()
    {
        if(isset($_POST['confirm_order']))
        {
            $orderId = $_POST['order_id'];
            $confirmOrder = $this->order->updateStatusOrder($orderId);

            $orderListConfirm = $this->order->listConfirmOrder();

            require "views/admin/tinhTrangDH/index.php";
        }
    }

    public function statusOrderSuccess()
    {
        if(isset($_POST['status_succes']))
        {
            $orderId = $_POST['order_id'];
            $result = $this->order->updateStatusOrderSuccess($orderId);
            $orderListConfirm = $this->order->listConfirmOrder();

            require "views/admin/tinhTrangDH/index.php";
        }

        if(isset($_POST['status_dis'])) 
        {
            $orderId = $_POST['order_id'];
            $result = $this->order->updateStatusOrderDis($orderId);
            $orderListConfirm = $this->order->listConfirmOrder();

            require "views/admin/tinhTrangDH/index.php";


        }
    }

    public function listOrder()
    {
        $listOrders = $this->order->listOrders();
        // print_r($listOrders);die();
        require "views/admin/dsDonHang/index.php";
    }

    public function seeOrder()
    {
        $id = $_GET['id'];
        $orders = $this->order->get($id);
        
        $array = [];

        foreach ($orders as &$orderItem) {
            $list = $this->orderDetail->getOrderDetailsList($id);
            foreach ($list as $item) {
                if ($orderItem['id'] == $item['oder_id']) {
                    $arrayList[] = $item;
                }
            }
            $orderItem['product'] = $arrayList;
            $array[] = $orderItem;
        }
        
        // print_r($orders);die();
        require "views/admin/xemDH/index.php";
    }

    public function search()
    {
        $key = $_POST['searchValue'];
        $listOrders = $this->order->search($key);
        require "views/admin/dsDonHang/index.php";
    }

}