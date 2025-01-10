<?php

class MasterLookUpQueryParameter extends AbstractQueryParameter {

    private $masterLookUp;

    public function __construct(MasterLookUp $masterLookUp) {
        $this->masterLookUp = $masterLookUp;
    }

    public function getRequiredClass() {
        return MasterLookUp::class;
    }

    protected function setDeleteParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->masterLookUp->getLookupCode(), PDO::PARAM_INT);
    }

    protected function setInsertParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->masterLookUp->getLookupName(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->masterLookUp->getLookupMeaning(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->masterLookUp->getValue1(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->masterLookUp->getValue2(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->masterLookUp->getValue3(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->masterLookUp->getValue4(), PDO::PARAM_STR);
    }

    protected function setUpdateParameter(PDOStatement $prepare) {
        $prepare->bindValue(1, $this->masterLookUp->getLookupName(), PDO::PARAM_STR);
        $prepare->bindValue(2, $this->masterLookUp->getLookupMeaning(), PDO::PARAM_STR);
        $prepare->bindValue(3, $this->masterLookUp->getValue1(), PDO::PARAM_STR);
        $prepare->bindValue(4, $this->masterLookUp->getValue2(), PDO::PARAM_STR);
        $prepare->bindValue(5, $this->masterLookUp->getValue3(), PDO::PARAM_STR);
        $prepare->bindValue(6, $this->masterLookUp->getValue4(), PDO::PARAM_STR);
        $prepare->bindValue(7, $this->masterLookUp->getLookupCode(), PDO::PARAM_INT);
    }

    protected function setUpdateStatusParameter(PDOStatement $prepare) {
        // No implementation needed
    }
}

?>
