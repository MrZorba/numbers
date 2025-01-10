<?php

class OrderTransaction {

    private $orderId = 0;
    private $cust_id = 0;
    private $orderPlacedDate = null;
    private $orderAcceptedDate = null;
    private $orderDispatched = null;
    private $deliveryDate = null;
    private $updatedDate = null;
    private $orderTotal = 0.0;
    private $currency = null;
    private $emailid = null;
    private $firstName = null;
    private $contactNo1 = null;
    private $shippingCharge = 0.0;
    private $paymentStatus = null;
    private $orderStatus = null;
    private $emp_id = null;
    private $channel = null;
    private $gstin = null;
    private $companyName = null;

    // Getter and Setter for shippingCharge
    public function setShippingCharge($shippingCharge) {
        $this->shippingCharge = $shippingCharge;
    }

    public function getShippingCharge() {
        return $this->shippingCharge;
    }

    // Getter and Setter for paymentStatus
    public function setPaymentStatus($paymentStatus) {
        $this->paymentStatus = $paymentStatus;
    }

    public function getPaymentStatus() {
        return $this->paymentStatus;
    }

    // Getter and Setter for emailid
    public function setEmailid($emailid) {
        $this->emailid = $emailid;
    }

    public function getEmailid() {
        return $this->emailid;
    }

    // Getter and Setter for currency
    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function getCurrency() {
        return $this->currency;
    }

    // Getter and Setter for orderId
    public function getOrderId() {
        return $this->orderId;
    }

    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }

    // Getter and Setter for cust_id
    public function getCustId() {
        return $this->cust_id;
    }

    public function setCustId($cust_id) {
        $this->cust_id = $cust_id;
    }

    // Getter and Setter for orderPlacedDate
    public function getOrderPlacedDate() {
        return $this->orderPlacedDate;
    }

    public function setOrderPlacedDate($orderPlacedDate) {
        $this->orderPlacedDate = $orderPlacedDate;
    }

    // Getter and Setter for orderAcceptedDate
    public function getOrderAcceptedDate() {
        return $this->orderAcceptedDate;
    }

    public function setOrderAcceptedDate($orderAcceptedDate) {
        $this->orderAcceptedDate = $orderAcceptedDate;
    }

    // Getter and Setter for orderDispatched
    public function getOrderDispatched() {
        return $this->orderDispatched;
    }

    public function setOrderDispatched($orderDispatched) {
        $this->orderDispatched = $orderDispatched;
    }

    // Getter and Setter for deliveryDate
    public function getDeliveryDate() {
        return $this->deliveryDate;
    }

    public function setDeliveryDate($deliveryDate) {
        $this->deliveryDate = $deliveryDate;
    }

    // Getter and Setter for updatedDate
    public function getUpdatedDate() {
        return $this->updatedDate;
    }

    public function setUpdatedDate($updatedDate) {
        $this->updatedDate = $updatedDate;
    }

    // Getter and Setter for orderTotal
    public function getOrderTotal() {
        return $this->orderTotal;
    }

    public function setOrderTotal($orderTotal) {
        $this->orderTotal = $orderTotal;
    }

    // Getter and Setter for orderStatus
    public function getOrderStatus() {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus) {
        $this->orderStatus = $orderStatus;
    }

    // Getter and Setter for emp_id
    public function getEmpId() {
        return $this->emp_id;
    }

    public function setEmpId($emp_id) {
        $this->emp_id = $emp_id;
    }

    // Getter and Setter for firstName
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    // Getter and Setter for contactNo1
    public function getContactNo1() {
        return $this->contactNo1;
    }

    public function setContactNo1($contactNo1) {
        $this->contactNo1 = $contactNo1;
    }

    // Getter and Setter for channel
    public function getChannel() {
        return $this->channel;
    }

    public function setChannel($channel) {
        $this->channel = $channel;
    }

    // Getter and Setter for gstin
    public function getGstin() {
        return $this->gstin;
    }

    public function setGstin($gstin) {
        $this->gstin = $gstin;
    }

    // Getter and Setter for companyName
    public function getCompanyName() {
        return $this->companyName;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }
}

?>
