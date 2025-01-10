<?php

class Offer {

    private $offerId = 0;
    private $offerName = null;
    private $offerType = null;
    private $discountValue = 0.0;
    private $associatedProducts = null;
    private $creationDate = null;
    private $expiryDate = null;
    private $noOfDays = 0;
    private $is_enabled = null;

    // Getter and Setter for offerId
    public function getOfferId() {
        return $this->offerId;
    }

    public function setOfferId($offerId) {
        $this->offerId = $offerId;
    }

    // Getter and Setter for offerName
    public function getOfferName() {
        return $this->offerName;
    }

    public function setOfferName($offerName) {
        $this->offerName = $offerName;
    }

    // Getter and Setter for offerType
    public function getOfferType() {
        return $this->offerType;
    }

    public function setOfferType($offerType) {
        $this->offerType = $offerType;
    }

    // Getter and Setter for discountValue
    public function getDiscountValue() {
        return $this->discountValue;
    }

    public function setDiscountValue($discountValue) {
        $this->discountValue = $discountValue;
    }

    // Getter and Setter for associatedProducts
    public function getAssociatedProducts() {
        return $this->associatedProducts;
    }

    public function setAssociatedProducts($associatedProducts) {
        $this->associatedProducts = $associatedProducts;
    }

    // Getter and Setter for creationDate
    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    // Getter and Setter for expiryDate
    public function getExpiryDate() {
        return $this->expiryDate;
    }

    public function setExpiryDate($expiryDate) {
        $this->expiryDate = $expiryDate;
    }

    // Getter and Setter for noOfDays
    public function getNoOfDays() {
        return $this->noOfDays;
    }

    public function setNoOfDays($noOfDays) {
        $this->noOfDays = $noOfDays;
    }

    // Getter and Setter for is_enabled
    public function getIsEnabled() {
        return $this->is_enabled;
    }

    public function setIsEnabled($is_enabled) {
        $this->is_enabled = $is_enabled;
    }
}

?>
