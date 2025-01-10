<?php

class ProductImageQueryParameter extends AbstractQueryParameter {

    private $productImage;

    public function __construct(ProductImage $productImage) {
        $this->productImage = $productImage;
    }

    public function getRequiredClass() {
        return ProductImage::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->productImage->getProductImgId(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->productImage->getProductId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->productImage->getImgLoc(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->productImage->getImgSeqNo(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->productImage->getImgComment(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->productImage->getImgSeqNo(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->productImage->getImgComment(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->productImage->getProductImgId(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No implementation needed
    }
}

?>
