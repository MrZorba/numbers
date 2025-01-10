<?php

abstract class AbstractQueryParameter {

    private $sql = null;
    private $action = 0;

    public function createPreparedStatement(PDO $pdo) {
        $prepare = $pdo->prepare($this->sql);
        $this->setParameter($this->action, $prepare);
        return $prepare;
    }

    private function setParameter($action, PDOStatement $prepare) {
        if ($action == GeneralConstants::INSERT) {
            $this->setInsertParameter($prepare);
        } elseif ($action == GeneralConstants::UPDATE) {
            $this->setUpdateParameter($prepare);
        } elseif ($action == GeneralConstants::DELETE) {
            $this->setDeleteParameter($prepare);
        } elseif ($action == GeneralConstants::STATUS_UPDATE) {
            $this->setUpdateStatusParameter($prepare);
        }
    }

    protected abstract function setInsertParameter(PDOStatement $prepare);
    protected abstract function setUpdateParameter(PDOStatement $prepare);
    protected abstract function setDeleteParameter(PDOStatement $prepare);
    protected abstract function setUpdateStatusParameter(PDOStatement $prepare);

    public function getAction() {
        return $this->action;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function getSql() {
        return $this->sql;
    }

    public function setSql($sql) {
        $this->sql = $sql;
    }

    // In PHP, there's no direct equivalent to Java's Class type
    // This method should be implemented by concrete classes
    abstract public function getRequiredClass();
}

class GeneralConstants {
    const INSERT = 1;
    const UPDATE = 2;
    const DELETE = 3;
    const STATUS_UPDATE = 4;
}

?>
