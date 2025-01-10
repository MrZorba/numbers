<?php

class Category {
    private $cate_id = 0;
    private $cate_parent_id = 0;
    private $cate_name = null;
    private $parent_cate_name = null;
    private $cate_descript = null;
    private $cate_UpdatedDate = null; // Use DateTime or string depending on how you handle dates
    private $cate_img_loc = null; 
    private $status = null;

    // Getter and Setter for Category ID
    public function getCateId() {
        return $this->cate_id;
    }

    public function setCateId($cate_id) {
        $this->cate_id = $cate_id;
    }

    // Getter and Setter for Parent Category ID
    public function getCateParentId() {
        return $this->cate_parent_id;
    }

    public function setCateParentId($cate_parent_id) {
        $this->cate_parent_id = $cate_parent_id;
    }

    // Getter and Setter for Category Name
    public function getCateName() {
        return $this->cate_name;
    }

    public function setCateName($cate_name) {
        $this->cate_name = $cate_name;
    }

    // Getter and Setter for Parent Category Name
    public function getParentCateName() {
        return $this->parent_cate_name;
    }

    public function setParentCateName($parent_cate_name) {
        $this->parent_cate_name = $parent_cate_name;
    }

    // Getter and Setter for Category Description
    public function getCateDescript() {
        return $this->cate_descript;
    }

    public function setCateDescript($cate_descript) {
        $this->cate_descript = $cate_descript;
    }

    // Getter and Setter for Category Updated Date
    public function getCateUpdatedDate() {
        return $this->cate_UpdatedDate;
    }

    public function setCateUpdatedDate($cate_UpdatedDate) {
        if ($cate_UpdatedDate instanceof DateTime) {
            $this->cate_UpdatedDate = $cate_UpdatedDate->format('Y-m-d H:i:s');
        } else {
            $this->cate_UpdatedDate = $cate_UpdatedDate; // Assuming it's a string or null
        }
    }

    // Getter and Setter for Category Image Location
    public function getCateImgLoc() {
        return $this->cate_img_loc;
    }

    public function setCateImgLoc($cate_img_loc) {
        $this->cate_img_loc = $cate_img_loc;
    }

    // Getter and Setter for Status
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}

