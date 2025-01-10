<?php

class ProductOtherDetailQueryParameter extends AbstractQueryParameter {

    private $productOtherDetail;

    public function __construct(ProductOtherDetail $productOtherDetail) {
        $this->productOtherDetail = $productOtherDetail;
    }

    public function getRequiredClass() {
        return ProductOtherDetail::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->productOtherDetail->getProductId(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->productOtherDetail->getProductId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->productOtherDetail->getRateInRupee(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->productOtherDetail->getRateInDollar(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->productOtherDetail->getDiscount(), PDO::PARAM_INT);
        $prepare->bindValue(5, $this->productOtherDetail->getFlatDiscountedRate(), PDO::PARAM_INT);
        $prepare->bindValue(6, $this->productOtherDetail->getRateWhite(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->productOtherDetail->getRateIvory(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->productOtherDetail->getRateBlack(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->productOtherDetail->getUpdatedBy(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->productOtherDetail->getCreatedBy(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->productOtherDetail->getRateInRupee(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->productOtherDetail->getRateInDollar(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->productOtherDetail->getDiscount(), PDO::PARAM_INT);
        $prepare->bindValue(4, $this->productOtherDetail->getFlatDiscountedRate(), PDO::PARAM_INT);
        $prepare->bindValue(5, $this->productOtherDetail->getRateWhite(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->productOtherDetail->getRateIvory(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->productOtherDetail->getRateBlack(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->productOtherDetail->getUpdatedBy(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->productOtherDetail->getProductId(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No implementation needed
    }
}

?>
