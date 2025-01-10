<?php

class ProductOtherDetail {
    private $product_id = 0;
    private $ratewhite = 0.0;
    private $rateivory = 0.0;
    private $discount = 0;
    private $flatdiscountedrate = 0;
    private $rateInRupee = 0;
    private $rateInDollar = 0;
    private $updated_by = null;
    private $updated_date = null;
    private $created_by = null;
    private $created_date = null;
    private $rateblack = 0;

    // Getter and Setter for product_id
    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    // Getter and Setter for rateInRupee
    public function getRateInRupee() {
        return $this->rateInRupee;
    }

    public function setRateInRupee($rateInRupee) {
        $this->rateInRupee = $rateInRupee;
    }

    // Getter and Setter for rateInDollar
    public function getRateInDollar() {
        return $this->rateInDollar;
    }

    public function setRateInDollar($rateInDollar) {
        $this->rateInDollar = $rateInDollar;
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

    // Getter and Setter for ratewhite
    public function getRateWhite() {
        return $this->ratewhite;
    }

    public function setRateWhite($ratewhite) {
        $this->ratewhite = $ratewhite;
    }

    // Getter and Setter for rateivory
    public function getRateIvory() {
        return $this->rateivory;
    }

    public function setRateIvory($rateivory) {
        $this->rateivory = $rateivory;
    }

    // Getter and Setter for updated_by
    public function getUpdatedBy() {
        return $this->updated_by;
    }

    public function setUpdatedBy($updated_by) {
        $this->updated_by = $updated_by;
    }

    // Getter and Setter for updated_date
    public function getUpdatedDate() {
        return $this->updated_date;
    }

    public function setUpdatedDate($updated_date) {
        $this->updated_date = $updated_date;
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

    // Getter and Setter for rateblack
    public function getRateBlack() {
        return $this->rateblack;
    }

    public function setRateBlack($rateblack) {
        $this->rateblack = $rateblack;
    }
}

?>
