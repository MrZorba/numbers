<?php

class CustomProduct {

    private $product_id = 0;
    private $productName = null;
    private $number = null;
    private $type = null;
    private $img_loc = null;
    private $productBrand = null;
    private $discount = 0;
    private $productColor = null;
    private $productSize = null;
    private $productCode = null;
    private $trap = null;
    private $liters = null;
    private $rateInRupee = 0;
    private $rateInDollar = 0;

    // Getter and Setter for Product Size
    public function getProductSize() {
        return $this->productSize;
    }

    public function setProductSize($productSize) {
        $this->productSize = $productSize;
    }

    // Getter and Setter for Product Color
    public function getProductColor() {
        return $this->productColor;
    }

    public function setProductColor($productColor) {
        $this->productColor = $productColor;
    }

    // Getter and Setter for Discount
    public function getDiscount() {
        return $this->discount;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    // Getter and Setter for Product Brand
    public function getProductBrand() {
        return $this->productBrand;
    }

    public function setProductBrand($productBrand) {
        $this->productBrand = $productBrand;
    }

    // Getter and Setter for Product ID
    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    // Getter and Setter for Product Name
    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    // Getter and Setter for Type
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    // Getter and Setter for Image Location
    public function getImgLoc() {
        return $this->img_loc;
    }

    public function setImgLoc($img_loc) {
        $this->img_loc = $img_loc;
    }

    // Getter and Setter for Rate in Rupee
    public function getRateInRupee() {
        return $this->rateInRupee;
    }

    public function setRateInRupee($rateInRupee) {
        $this->rateInRupee = $rateInRupee;
    }

    // Getter and Setter for Rate in Dollar
    public function getRateInDollar() {
        return $this->rateInDollar;
    }

    public function setRateInDollar($rateInDollar) {
        $this->rateInDollar = $rateInDollar;
    }

    // Getter and Setter for Trap
    public function getTrap() {
        return $this->trap;
    }

    public function setTrap($trap) {
        $this->trap = $trap;
    }

    // Getter and Setter for Liters
    public function getLiters() {
        return $this->liters;
    }

    public function setLiters($liters) {
        $this->liters = $liters;
    }

    // Getter and Setter for Product Code
    public function getProductCode() {
        return $this->productCode;
    }

    public function setProductCode($productCode) {
        $this->productCode = $productCode;
    }

    // Getter and Setter for Number
    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    // Override equals (PHP equivalent)
    public function equals($obj) {
        if ($obj instanceof CustomProduct) {
            return $obj->getProductId() === $this->product_id;
        }
        return false;
    }

    // Override hashCode (PHP equivalent)
    public function hashCode() {
        return $this->product_id;
    }
}

?>
