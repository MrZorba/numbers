<?php

class PurchaseDetailQueryParameter extends AbstractQueryParameter {

    private $purchaseDetails;

    public function __construct(PurchaseDetails $purchaseDetails) {
        $this->purchaseDetails = $purchaseDetails;
    }

    public function getRequiredClass() {
        return PurchaseDetails::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        // No parameters to set for delete operation
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->purchaseDetails->getOrderId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->purchaseDetails->getProductId(), PDO::PARAM_INT);
        $prepare->bindValue(3, $this->purchaseDetails->getQty(), PDO::PARAM_INT);
        $prepare->bindValue(4, $this->purchaseDetails->getProductPrice(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->purchaseDetails->getNetAmount(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        // No parameters to set for update operation
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No parameters to set for update status operation
    }
}

?>
