<?php

class ShippingDetailQueryParameter extends AbstractQueryParameter {

    private $shippingDetails;

    public function __construct(ShippingDetails $shippingDetails) {
        $this->shippingDetails = $shippingDetails;
    }

    public function getRequiredClass() {
        return ShippingDetails::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->shippingDetails->getOrderId(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->shippingDetails->getOrderId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->shippingDetails->getCourierName(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->shippingDetails->getTrackingNo(), PDO::PARAM_INT);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->shippingDetails->getCourierName(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->shippingDetails->getTrackingNo(), PDO::PARAM_INT);
        $prepare->bindValue(3, $this->shippingDetails->getOrderId(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No parameters needed for update status operation
    }
}

?>
