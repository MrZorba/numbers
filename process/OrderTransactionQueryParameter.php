<?php

class OrderTransactionQueryParameter extends AbstractQueryParameter {

    private $orderTransaction;

    public function __construct(OrderTransaction $orderTransaction) {
        $this->orderTransaction = $orderTransaction;
    }

    public function getRequiredClass() {
        return OrderTransaction::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        // No implementation needed
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->orderTransaction->getCustId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->orderTransaction->getOrderPlacedDate(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->orderTransaction->getOrderTotal(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->orderTransaction->getShippingCharge(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->orderTransaction->getCurrency(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->orderTransaction->getPaymentStatus(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->orderTransaction->getEmpId(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->orderTransaction->getChannel(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->orderTransaction->getGstin(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->orderTransaction->getOrderId(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No implementation needed
    }
}

?>
