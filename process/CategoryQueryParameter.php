<?php

class CategoryQueryParameter extends AbstractQueryParameter {

    private $categories;

    public function __construct(Category $categories) {
        $this->categories = $categories;
    }

    public function getRequiredClass() {
        return Category::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->categories->getCate_id(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->categories->getCate_parent_id(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->categories->getCate_name(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->categories->getCate_descript(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->categories->getCate_img_loc(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->categories->getCate_parent_id(), PDO::PARAM_INT);
        $prepare->bindValue(2, $this->categories->getCate_name(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->categories->getCate_descript(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->categories->getCate_img_loc(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->categories->getCate_id(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->categories->getStatus(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->categories->getCate_id(), PDO::PARAM_INT);
    }
}

?>
