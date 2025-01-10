<?php

class CustomerLoginQueryParameter extends AbstractQueryParameter {

    private $customerLoginDetail;

    public function __construct(CustomerLoginDetail $customerLoginDetail) {
        $this->customerLoginDetail = $customerLoginDetail;
    }

    public function getRequiredClass() {
        return CustomerLoginDetail::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->customerLoginDetail->getCust_id(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->customerLoginDetail->getEmailid(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->customerLoginDetail->getPassword(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->customerLoginDetail->getForgetpasswordquestion(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->customerLoginDetail->getAnswer(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->customerLoginDetail->getEmailid(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->customerLoginDetail->getPassword(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->customerLoginDetail->getForgetpasswordquestion(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->customerLoginDetail->getAnswer(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->customerLoginDetail->getCust_id(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->customerLoginDetail->getStatus(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->customerLoginDetail->getCust_id(), PDO::PARAM_INT);
    }
}

?>
