<?php

class MasterLookUp {
    
    private $LookupCode = 0;
    private $LookupName = null;
    private $LookupMeaning = null;
    private $value1 = null;
    private $value2 = null;
    private $value3 = null;
    private $value4 = null;

    // Getter and Setter for LookupCode
    public function getLookupCode() {
        return $this->LookupCode;
    }

    public function setLookupCode($lookupCode) {
        $this->LookupCode = $lookupCode;
    }

    // Getter and Setter for LookupName
    public function getLookupName() {
        return $this->LookupName;
    }

    public function setLookupName($lookupName) {
        $this->LookupName = $lookupName;
    }

    // Getter and Setter for LookupMeaning
    public function getLookupMeaning() {
        return $this->LookupMeaning;
    }

    public function setLookupMeaning($lookupMeaning) {
        $this->LookupMeaning = $lookupMeaning;
    }

    // Getter and Setter for Value1
    public function getValue1() {
        return $this->value1;
    }

    public function setValue1($value1) {
        $this->value1 = $value1;
    }

    // Getter and Setter for Value2
    public function getValue2() {
        return $this->value2;
    }

    public function setValue2($value2) {
        $this->value2 = $value2;
    }

    // Getter and Setter for Value3
    public function getValue3() {
        return $this->value3;
    }

    public function setValue3($value3) {
        $this->value3 = $value3;
    }

    // Getter and Setter for Value4
    public function getValue4() {
        return $this->value4;
    }

    public function setValue4($value4) {
        $this->value4 = $value4;
    }
}

?>
