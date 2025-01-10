<?php

class VendorDetails {
    private $id = 0;
    private $loginId = null;
    private $password = null;
    private $firstname = null;
    private $address = null;
    private $address2 = null;
    private $contactno1 = null;
    private $website = null;
    private $status = null;

    // Getter and Setter for id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for loginId
    public function getLoginId() {
        return $this->loginId;
    }

    public function setLoginId($loginId) {
        $this->loginId = $loginId;
    }

    // Getter and Setter for password
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Getter and Setter for firstname
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    // Getter and Setter for address
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    // Getter and Setter for address2
    public function getAddress2() {
        return $this->address2;
    }

    public function setAddress2($address2) {
        $this->address2 = $address2;
    }

    // Getter and Setter for contactno1
    public function getContactno1() {
        return $this->contactno1;
    }

    public function setContactno1($contactno1) {
        $this->contactno1 = $contactno1;
    }

    // Getter and Setter for website
    public function getWebsite() {
        return $this->website;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }

    // Getter and Setter for status
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}

?>
