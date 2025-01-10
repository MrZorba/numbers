<?php

class PaymentQueryParameter extends AbstractQueryParameter {

    private $orderPaymentDetail;

    public function __construct(OrderPaymentDetail $orderPaymentDetail) {
        $this->orderPaymentDetail = $orderPaymentDetail;
    }

    public function getRequiredClass() {
        return OrderPaymentDetail::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        // No implementation needed
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->orderPaymentDetail->getTrackingId(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->orderPaymentDetail->getAmount(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->orderPaymentDetail->getOrderId(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->orderPaymentDetail->getEmail(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->orderPaymentDetail->getStatus(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->orderPaymentDetail->getBankRefNo(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->orderPaymentDetail->getPaymentMode(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->orderPaymentDetail->getCardName(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->orderPaymentDetail->getStatusCode(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->orderPaymentDetail->getStatusMessage(), PDO::PARAM_STR);
        $prepare->bindValue(11, $this->orderPaymentDetail->getResponseCode(), PDO::PARAM_STR);
        $prepare->bindValue(12, $this->orderPaymentDetail->getFailureMessage(), PDO::PARAM_STR);
        $prepare->bindValue(13, $this->orderPaymentDetail->getPaymentDate(), PDO::PARAM_STR);
        $prepare->bindValue(14, $this->orderPaymentDetail->getApprove(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        // No implementation needed
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No implementation needed
    }
}

?>
