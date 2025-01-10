<?php

class CustomerLoginDetail {
    private $cust_id = 0;
    private $emailid = null;
    private $password = null;
    private $forgetpasswordquestion = null;
    private $answer = null;
    private $createdDate = null;
    private $updatedDate = null;
    private $status = null;

    // Getter and Setter for Customer ID
    public function getCustId() {
        return $this->cust_id;
    }

    public function setCustId($cust_id) {
        $this->cust_id = $cust_id;
    }

    // Getter and Setter for Email ID
    public function getEmailid() {
        return $this->emailid;
    }

    public function setEmailid($emailid) {
        $this->emailid = $emailid;
    }

    // Getter and Setter for Password
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Getter and Setter for Forget Password Question
    public function getForgetpasswordquestion() {
        return $this->forgetpasswordquestion;
    }

    public function setForgetpasswordquestion($forgetpasswordquestion) {
        $this->forgetpasswordquestion = $forgetpasswordquestion;
    }

    // Getter and Setter for Answer
    public function getAnswer() {
        return $this->answer;
    }

    public function setAnswer($answer) {
        $this->answer = $answer;
    }

    // Getter and Setter for Created Date
    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }

    // Getter and Setter for Updated Date
    public function getUpdatedDate() {
        return $this->updatedDate;
    }

    public function setUpdatedDate($updatedDate) {
        $this->updatedDate = $updatedDate;
    }

    // Getter and Setter for Status
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}

?>
