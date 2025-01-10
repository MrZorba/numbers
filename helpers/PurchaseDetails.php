<?php

class PurchaseDetails {
    private $id = 0;
    private $orderId = 0;
    private $product_id = 0;
    private $productName = null;
    private $img_loc = null;
    private $qty = 0;
    private $productprice = 0.0;
    private $netAmount = 0.0;
    private $productColor = null;
    private $productSize = null;

    // Getter and Setter for id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for orderId
    public function getOrderId() {
        return $this->orderId;
    }

    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }

    // Getter and Setter for product_id
    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    // Getter and Setter for productName
    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    // Getter and Setter for img_loc
    public function getImgLoc() {
        return $this->img_loc;
    }

    public function setImgLoc($img_loc) {
        $this->img_loc = $img_loc;
    }

    // Getter and Setter for qty
    public function getQty() {
        return $this->qty;
    }

    public function setQty($qty) {
        $this->qty = $qty;
    }

    // Getter and Setter for productprice
    public function getProductPrice() {
        return $this->productprice;
    }

    public function setProductPrice($productprice) {
        $this->productprice = $productprice;
    }

    // Getter and Setter for netAmount
    public function getNetAmount() {
        return $this->netAmount;
    }

    public function setNetAmount($netAmount) {
        $this->netAmount = $netAmount;
    }

    // Getter and Setter for productColor
    public function getProductColor() {
        return $this->productColor;
    }

    public function setProductColor($productColor) {
        $this->productColor = $productColor;
    }

    // Getter and Setter for productSize
    public function getProductSize() {
        return $this->productSize;
    }

    public function setProductSize($productSize) {
        $this->productSize = $productSize;
    }
}

?>
