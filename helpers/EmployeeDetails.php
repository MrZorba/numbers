<?php

class EmployeeDetails {
    
    private $loginId = null;
    private $firstname = null;
    private $lastname = null;
    private $profile = null;

    // Getter and Setter for Login ID
    public function getLoginId() {
        return $this->loginId;
    }

    public function setLoginId($loginId) {
        $this->loginId = $loginId;
    }

    // Getter and Setter for Firstname
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    // Getter and Setter for Lastname
    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    // Getter and Setter for Profile
    public function getProfile() {
        return $this->profile;
    }

    public function setProfile($profile) {
        $this->profile = $profile;
    }
}

?>
