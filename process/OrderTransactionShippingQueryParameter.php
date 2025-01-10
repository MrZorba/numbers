<?php

class OrderTransactionShippingQueryParameter extends AbstractQueryParameter {

    private $orderTransactionShipping;

    public function __construct(OrderTransactionShipping $orderTransactionShipping) {
        $this->orderTransactionShipping = $orderTransactionShipping;
    }

    public function getRequiredClass() {
        return OrderTransactionShipping::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        // No implementation needed
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->orderTransactionShipping->getOrderId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->orderTransactionShipping->getFirstName(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->orderTransactionShipping->getLastName(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->orderTransactionShipping->getContactNo1(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->orderTransactionShipping->getContactNo2(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->orderTransactionShipping->getAddress(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->orderTransactionShipping->getCountry(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->orderTransactionShipping->getState(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->orderTransactionShipping->getCity(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->orderTransactionShipping->getPincode(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->orderTransactionShipping->getFirstName(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->orderTransactionShipping->getLastName(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->orderTransactionShipping->getContactNo1(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->orderTransactionShipping->getContactNo2(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->orderTransactionShipping->getAddress(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->orderTransactionShipping->getCountry(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->orderTransactionShipping->getState(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->orderTransactionShipping->getCity(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->orderTransactionShipping->getPincode(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->orderTransactionShipping->getOrderId(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No implementation needed
    }
}

?>
