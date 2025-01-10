<?php

class CustomerAddressDetails {
    private $id = 0;
    private $cust_id = 0;
    private $firstName = null;
    private $lastName = null;
    private $contactNo1 = null;
    private $contactNo2 = null;
    private $address = null;
    private $country = null;
    private $state = null;
    private $city = null;
    private $pincode = null;
    private $companyName = null;
    private $gstinNO = null;
    private $accountType = null;

    // Getter and Setter for ID
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for Customer ID
    public function getCustId() {
        return $this->cust_id;
    }

    public function setCustId($cust_id) {
        $this->cust_id = $cust_id;
    }

    // Getter and Setter for First Name
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    // Getter and Setter for Last Name
    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    // Getter and Setter for Contact Number 1
    public function getContactNo1() {
        return $this->contactNo1;
    }

    public function setContactNo1($contactNo1) {
        $this->contactNo1 = $contactNo1;
    }

    // Getter and Setter for Contact Number 2
    public function getContactNo2() {
        return $this->contactNo2;
    }

    public function setContactNo2($contactNo2) {
        $this->contactNo2 = $contactNo2;
    }

    // Getter and Setter for Address
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    // Getter and Setter for Country
    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    // Getter and Setter for State
    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    // Getter and Setter for City
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    // Getter and Setter for Pincode
    public function getPincode() {
        return $this->pincode;
    }

    public function setPincode($pincode) {
        $this->pincode = $pincode;
    }

    // Getter and Setter for Company Name
    public function getCompanyName() {
        return $this->companyName;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    // Getter and Setter for GSTIN Number
    public function getGstinNO() {
        return $this->gstinNO;
    }

    public function setGstinNO($gstinNO) {
        $this->gstinNO = $gstinNO;
    }

    // Getter and Setter for Account Type
    public function getAccountType() {
        return $this->accountType;
    }

    public function setAccountType($accountType) {
        $this->accountType = $accountType;
    }
}

