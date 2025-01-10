<?php

class CustomerAddressQueryParameter extends AbstractQueryParameter {

    private $customerAddressDetails;

    public function __construct(CustomerAddressDetails $customerAddressDetails) {
        $this->customerAddressDetails = $customerAddressDetails;
    }

    public function getRequiredClass() {
        return CustomerAddressDetails::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->customerAddressDetails->getId(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->customerAddressDetails->getCust_id(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->customerAddressDetails->getFirstName(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->customerAddressDetails->getLastName(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->customerAddressDetails->getContactNo1(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->customerAddressDetails->getContactNo2(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->customerAddressDetails->getAddress(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->customerAddressDetails->getCountry(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->customerAddressDetails->getState(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->customerAddressDetails->getCity(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->customerAddressDetails->getPincode(), PDO::PARAM_STR);
        $prepare->bindValue(11, $this->customerAddressDetails->getCompanyName(), PDO::PARAM_STR);
        $prepare->bindValue(12, $this->customerAddressDetails->getGstinNO(), PDO::PARAM_STR);
        $prepare->bindValue(13, $this->customerAddressDetails->getAccountType(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->customerAddressDetails->getFirstName(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->customerAddressDetails->getLastName(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->customerAddressDetails->getContactNo1(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->customerAddressDetails->getContactNo2(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->customerAddressDetails->getAddress(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->customerAddressDetails->getCountry(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->customerAddressDetails->getState(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->customerAddressDetails->getCity(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->customerAddressDetails->getPincode(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->customerAddressDetails->getCompanyName(), PDO::PARAM_STR);
        $prepare->bindValue(11, $this->customerAddressDetails->getGstinNO(), PDO::PARAM_STR);
        $prepare->bindValue(12, $this->customerAddressDetails->getAccountType(), PDO::PARAM_STR);
        $prepare->bindValue(13, $this->customerAddressDetails->getCust_id(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // Implement if needed
    }
}

?>
