<?php

class Product {
    private $product_id = 0;
    private $cate_id = 0;
    private $productName = null;
    private $productCode = null;
    private $productBrand = null;
    private $productColor = null;
    private $natureOfProduct = null;
    private $indication = null;
    private $useDirection = null;
    private $packing = null;
    private $descript = null;
    private $vegProduct = null;
    private $additinalDescription = null;
    private $type = null;
    private $updated_date = null;
    private $status = null;
    private $sizeheight = null;
    private $sizelength = null;
    private $liters = null;
    private $trap = null;
    private $updated_by = null;
    private $created_by = null;
    private $created_date = null;
    private $vendor_id = 0;
    private $recharge_validity = null;
    private $number_status = null;
    private $lastCall = null;
    private $nextCall = null;
    private $number = null;
    private $buyerName = null;
    private $currentNumber = null;
    private $buyerContact = null;
    private $fileID = null;
    private $comments = null;
    private $rateInRupee = 0;
    private $rateblack = 0;
    private $discount = 0;
    private $flatdiscountedrate = 0;
    private $cate_name = "";
    private $vendorname = "";

    // Getter and Setter for product_id
    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    // Getter and Setter for cate_id
    public function getCateId() {
        return $this->cate_id;
    }

    public function setCateId($cate_id) {
        $this->cate_id = $cate_id;
    }

    // Getter and Setter for productName
    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    // Getter and Setter for productCode
    public function getProductCode() {
        return $this->productCode;
    }

    public function setProductCode($productCode) {
        $this->productCode = $productCode;
    }

    // Getter and Setter for productBrand
    public function getProductBrand() {
        return $this->productBrand;
    }

    public function setProductBrand($productBrand) {
        $this->productBrand = $productBrand;
    }

    // Getter and Setter for productColor
    public function getProductColor() {
        return $this->productColor;
    }

    public function setProductColor($productColor) {
        $this->productColor = $productColor;
    }

    // Getter and Setter for natureOfProduct
    public function getNatureOfProduct() {
        return $this->natureOfProduct;
    }

    public function setNatureOfProduct($natureOfProduct) {
        $this->natureOfProduct = $natureOfProduct;
    }

    // Getter and Setter for indication
    public function getIndication() {
        return $this->indication;
    }

    public function setIndication($indication) {
        $this->indication = $indication;
    }

    // Getter and Setter for useDirection
    public function getUseDirection() {
        return $this->useDirection;
    }

    public function setUseDirection($useDirection) {
        $this->useDirection = $useDirection;
    }

    // Getter and Setter for packing
    public function getPacking() {
        return $this->packing;
    }

    public function setPacking($packing) {
        $this->packing = $packing;
    }

    // Getter and Setter for descript
    public function getDescript() {
        return $this->descript;
    }

    public function setDescript($descript) {
        $this->descript = $descript;
    }

    // Getter and Setter for vegProduct
    public function getVegProduct() {
        return $this->vegProduct;
    }

    public function setVegProduct($vegProduct) {
        $this->vegProduct = $vegProduct;
    }

    // Getter and Setter for additinalDescription
    public function getAdditinalDescription() {
        return $this->additinalDescription;
    }

    public function setAdditinalDescription($additinalDescription) {
        $this->additinalDescription = $additinalDescription;
    }

    // Getter and Setter for type
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    // Getter and Setter for updated_date
    public function getUpdatedDate() {
        return $this->updated_date;
    }

    public function setUpdatedDate($updated_date) {
        $this->updated_date = $updated_date;
    }

    // Getter and Setter for status
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Getter and Setter for sizeheight
    public function getSizeHeight() {
        return $this->sizeheight;
    }

    public function setSizeHeight($sizeheight) {
        $this->sizeheight = $sizeheight;
    }

    // Getter and Setter for sizelength
    public function getSizeLength() {
        return $this->sizelength;
    }

    public function setSizeLength($sizelength) {
        $this->sizelength = $sizelength;
    }

    // Getter and Setter for liters
    public function getLiters() {
        return $this->liters;
    }

    public function setLiters($liters) {
        $this->liters = $liters;
    }

    // Getter and Setter for trap
    public function getTrap() {
        return $this->trap;
    }

    public function setTrap($trap) {
        $this->trap = $trap;
    }

    // Getter and Setter for updated_by
    public function getUpdatedBy() {
        return $this->updated_by;
    }

    public function setUpdatedBy($updated_by) {
        $this->updated_by = $updated_by;
    }

    // Getter and Setter for created_by
    public function getCreatedBy() {
        return $this->created_by;
    }

    public function setCreatedBy($created_by) {
        $this->created_by = $created_by;
    }

    // Getter and Setter for created_date
    public function getCreatedDate() {
        return $this->created_date;
    }

    public function setCreatedDate($created_date) {
        $this->created_date = $created_date;
    }

    // Getter and Setter for vendor_id
    public function getVendorId() {
        return $this->vendor_id;
    }

    public function setVendorId($vendor_id) {
        $this->vendor_id = $vendor_id;
    }

    // Getter and Setter for recharge_validity
    public function getRechargeValidity() {
        return $this->recharge_validity;
    }

    public function setRechargeValidity($recharge_validity) {
        $this->recharge_validity = $recharge_validity;
    }

    // Getter and Setter for number_status
    public function getNumberStatus() {
        return $this->number_status;
    }

    public function setNumberStatus($number_status) {
        $this->number_status = $number_status;
    }

    // Getter and Setter for lastCall
    public function getLastCall() {
        return $this->lastCall;
    }

    public function setLastCall($lastCall) {
        $this->lastCall = $lastCall;
    }

    // Getter and Setter for nextCall
    public function getNextCall() {
        return $this->nextCall;
    }

    public function setNextCall($nextCall) {
        $this->nextCall = $nextCall;
    }

    // Getter and Setter for number
    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    // Getter and Setter for buyerName
    public function getBuyerName() {
        return $this->buyerName;
    }

    public function setBuyerName($buyerName) {
        $this->buyerName = $buyerName;
    }

    // Getter and Setter for currentNumber
    public function getCurrentNumber() {
        return $this->currentNumber;
    }

    public function setCurrentNumber($currentNumber) {
        $this->currentNumber = $currentNumber;
    }

    // Getter and Setter for buyerContact
    public function getBuyerContact() {
        return $this->buyerContact;
    }

    public function setBuyerContact($buyerContact) {
        $this->buyerContact = $buyerContact;
    }

    // Getter and Setter for fileID
    public function getFileID() {
        return $this->fileID;
    }

    public function setFileID($fileID) {
        $this->fileID = $fileID;
    }

    // Getter and Setter for comments
    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    // Getter and Setter for rateInRupee
    public function getRateInRupee() {
        return $this->rateInRupee;
    }

    public function setRateInRupee($rateInRupee) {
        $this->rateInRupee = $rateInRupee;
    }

    // Getter and Setter for rateblack
    public function getRateBlack() {
        return $this->rateblack;
    }

    public function setRateBlack($rateblack) {
        $this->rateblack = $rateblack;
    }

    // Getter and Setter for discount
    public function getDiscount() {
        return $this->discount;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    // Getter and Setter for flatdiscountedrate
    public function getFlatDiscountedRate() {
        return $this->flatdiscountedrate;
    }

    public function setFlatDiscountedRate($flatdiscountedrate) {
        $this->flatdiscountedrate = $flatdiscountedrate;
    }

    // Getter and Setter for cate_name
    public function getCateName() {
        return $this->cate_name;
    }

    public function setCateName($cate_name) {
        $this->cate_name = $cate_name;
    }

    // Getter and Setter for vendorname
    public function getVendorName() {
        return $this->vendorname;
    }

    public function setVendorName($vendorname) {
        $this->vendorname = $vendorname;
    }
}
?>
