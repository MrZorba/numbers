<?php

class ProductQueryParameter extends AbstractQueryParameter {

    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function getRequiredClass() {
        return Product::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->product->getProductId(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->product->getCateId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->product->getProductName(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->product->getNatureOfProduct(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->product->getIndication(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->product->getUseDirection(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->product->getPacking(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->product->getDescript(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->product->getVegProduct(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->product->getAdditinalDescription(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->product->getType(), PDO::PARAM_STR);
        $prepare->bindValue(11, $this->product->getStatus(), PDO::PARAM_STR);
        $prepare->bindValue(12, $this->product->getProductCode(), PDO::PARAM_STR);
        $prepare->bindValue(13, $this->product->getProductBrand(), PDO::PARAM_STR);
        $prepare->bindValue(14, $this->product->getProductColor(), PDO::PARAM_STR);
        $prepare->bindValue(15, $this->product->getSizeheight(), PDO::PARAM_STR);
        $prepare->bindValue(16, $this->product->getSizelength(), PDO::PARAM_STR);
        $prepare->bindValue(17, $this->product->getLiters(), PDO::PARAM_STR);
        $prepare->bindValue(18, $this->product->getTrap(), PDO::PARAM_STR);
        $prepare->bindValue(19, $this->product->getUpdatedBy(), PDO::PARAM_STR);
        $prepare->bindValue(20, $this->product->getCreatedBy(), PDO::PARAM_STR);
        $prepare->bindValue(21, $this->product->getVendorId(), PDO::PARAM_INT);
        $prepare->bindValue(22, $this->product->getRechargeValidity(), PDO::PARAM_STR);
        $prepare->bindValue(23, $this->product->getNumberStatus(), PDO::PARAM_STR);
        $prepare->bindValue(24, $this->product->getLastCall(), PDO::PARAM_STR);
        $prepare->bindValue(25, $this->product->getNextCall(), PDO::PARAM_STR);
        $prepare->bindValue(26, $this->product->getNumber(), PDO::PARAM_STR);
        $prepare->bindValue(27, $this->product->getBuyerName(), PDO::PARAM_STR);
        $prepare->bindValue(28, $this->product->getCurrentNumber(), PDO::PARAM_STR);
        $prepare->bindValue(29, $this->product->getBuyerContact(), PDO::PARAM_STR);
        $prepare->bindValue(30, $this->product->getFileId(), PDO::PARAM_STR);
        $prepare->bindValue(31, $this->product->getComments(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->product->getCateId(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->product->getProductName(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->product->getNatureOfProduct(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->product->getIndication(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->product->getUseDirection(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->product->getPacking(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->product->getDescript(), PDO::PARAM_STR);
        $prepare->bindValue(8, $this->product->getVegProduct(), PDO::PARAM_STR);
        $prepare->bindValue(9, $this->product->getAdditinalDescription(), PDO::PARAM_STR);
        $prepare->bindValue(10, $this->product->getType(), PDO::PARAM_STR);
        $prepare->bindValue(11, $this->product->getProductCode(), PDO::PARAM_STR);
        $prepare->bindValue(12, $this->product->getProductBrand(), PDO::PARAM_STR);
        $prepare->bindValue(13, $this->product->getProductColor(), PDO::PARAM_STR);
        $prepare->bindValue(14, $this->product->getSizeheight(), PDO::PARAM_STR);
        $prepare->bindValue(15, $this->product->getSizelength(), PDO::PARAM_STR);
        $prepare->bindValue(16, $this->product->getLiters(), PDO::PARAM_STR);
        $prepare->bindValue(17, $this->product->getTrap(), PDO::PARAM_STR);
        $prepare->bindValue(18, $this->product->getUpdatedBy(), PDO::PARAM_STR);
        $prepare->bindValue(19, $this->product->getRechargeValidity(), PDO::PARAM_STR);
        $prepare->bindValue(20, $this->product->getLastCall(), PDO::PARAM_STR);
        $prepare->bindValue(21, $this->product->getNextCall(), PDO::PARAM_STR);
        $prepare->bindValue(22, $this->product->getNumber(), PDO::PARAM_STR);
        $prepare->bindValue(23, $this->product->getBuyerName(), PDO::PARAM_STR);
        $prepare->bindValue(24, $this->product->getCurrentNumber(), PDO::PARAM_STR);
        $prepare->bindValue(25, $this->product->getStatus(), PDO::PARAM_STR);
        $prepare->bindValue(26, $this->product->getBuyerContact(), PDO::PARAM_STR);
        $prepare->bindValue(27, $this->product->getComments(), PDO::PARAM_STR);
        $prepare->bindValue(28, $this->product->getVendorId(), PDO::PARAM_INT);
        $prepare->bindValue(29, $this->product->getProductId(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->product->getStatus(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->product->getCateId(), PDO::PARAM_INT);
    }
}

?>
