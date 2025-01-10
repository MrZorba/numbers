<?php

class ProductImage {
    private $product_img_id = 0;
    private $product_id = 0;
    private $img_loc = null;
    private $img_seq_no = null;
    private $img_comment = null;
    private $updated_date = null;

    // Getter and Setter for product_img_id
    public function getProductImgId() {
        return $this->product_img_id;
    }

    public function setProductImgId($product_img_id) {
        $this->product_img_id = $product_img_id;
    }

    // Getter and Setter for product_id
    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    // Getter and Setter for img_loc
    public function getImgLoc() {
        return $this->img_loc;
    }

    public function setImgLoc($img_loc) {
        $this->img_loc = $img_loc;
    }

    // Getter and Setter for img_seq_no
    public function getImgSeqNo() {
        return $this->img_seq_no;
    }

    public function setImgSeqNo($img_seq_no) {
        $this->img_seq_no = $img_seq_no;
    }

    // Getter and Setter for img_comment
    public function getImgComment() {
        return $this->img_comment;
    }

    public function setImgComment($img_comment) {
        $this->img_comment = $img_comment;
    }

    // Getter and Setter for updated_date
    public function getUpdatedDate() {
        return $this->updated_date;
    }

    public function setUpdatedDate($updated_date) {
        $this->updated_date = $updated_date;
    }
}

?>
