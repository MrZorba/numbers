<?php

class OrderPaymentDetail {

    private $id = 0;
    private $tracking_id = null;
    private $amount = null;
    private $orderid = null;
    private $email = null;
    private $status = null;
    private $bank_ref_no = null;
    private $payment_mode = null;
    private $card_name = null;
    private $status_code = null;
    private $status_message = null;
    private $response_code = null;
    private $failure_message = null;
    private $payment_date = null;
    private $approve = null;

    // Getter and Setter for id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for tracking_id
    public function getTrackingId() {
        return $this->tracking_id;
    }

    public function setTrackingId($tracking_id) {
        $this->tracking_id = $tracking_id;
    }

    // Getter and Setter for amount
    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    // Getter and Setter for orderid
    public function getOrderId() {
        return $this->orderid;
    }

    public function setOrderId($orderid) {
        $this->orderid = $orderid;
    }

    // Getter and Setter for email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter and Setter for status
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Getter and Setter for bank_ref_no
    public function getBankRefNo() {
        return $this->bank_ref_no;
    }

    public function setBankRefNo($bank_ref_no) {
        $this->bank_ref_no = $bank_ref_no;
    }

    // Getter and Setter for payment_mode
    public function getPaymentMode() {
        return $this->payment_mode;
    }

    public function setPaymentMode($payment_mode) {
        $this->payment_mode = $payment_mode;
    }

    // Getter and Setter for card_name
    public function getCardName() {
        return $this->card_name;
    }

    public function setCardName($card_name) {
        $this->card_name = $card_name;
    }

    // Getter and Setter for status_code
    public function getStatusCode() {
        return $this->status_code;
    }

    public function setStatusCode($status_code) {
        $this->status_code = $status_code;
    }

    // Getter and Setter for status_message
    public function getStatusMessage() {
        return $this->status_message;
    }

    public function setStatusMessage($status_message) {
        $this->status_message = $status_message;
    }

    // Getter and Setter for response_code
    public function getResponseCode() {
        return $this->response_code;
    }

    public function setResponseCode($response_code) {
        $this->response_code = $response_code;
    }

    // Getter and Setter for failure_message
    public function getFailureMessage() {
        return $this->failure_message;
    }

    public function setFailureMessage($failure_message) {
        $this->failure_message = $failure_message;
    }

    // Getter and Setter for payment_date
    public function getPaymentDate() {
        return $this->payment_date;
    }

    public function setPaymentDate($payment_date) {
        $this->payment_date = $payment_date;
    }

    // Getter and Setter for approve
    public function getApprove() {
        return $this->approve;
    }

    public function setApprove($approve) {
        $this->approve = $approve;
    }
}

?>
