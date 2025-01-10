<?php

class Blog {
    private $id = null;
    private $blogTitle = null;
    private $blogDescription = null;
    private $uploadType = null;
    private $img_loc = null;
    private $updatedDate = null;

    // Getter and Setter for ID
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for Blog Title
    public function getBlogTitle() {
        return $this->blogTitle;
    }

    public function setBlogTitle($blogTitle) {
        $this->blogTitle = $blogTitle;
    }

    // Getter and Setter for Blog Description
    public function getBlogDescription() {
        return $this->blogDescription;
    }

    public function setBlogDescription($blogDescription) {
        $this->blogDescription = $blogDescription;
    }

    // Getter and Setter for Upload Type
    public function getUploadType() {
        return $this->uploadType;
    }

    public function setUploadType($uploadType) {
        $this->uploadType = $uploadType;
    }

    // Getter and Setter for Image Location
    public function getImgLoc() {
        return $this->img_loc;
    }

    public function setImgLoc($img_loc) {
        $this->img_loc = $img_loc;
    }

    // Getter and Setter for Updated Date
    public function getUpdatedDate() {
        return $this->updatedDate;
    }

    public function setUpdatedDate($updatedDate) {
        $this->updatedDate = $updatedDate;
    }
}

