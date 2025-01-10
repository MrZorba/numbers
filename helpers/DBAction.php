<?php

class DBAction {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function executeDML($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function executeDMLToGetId($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $this->pdo->lastInsertId();
    }

    public function executeBatchUpdate($sql, $parameters = []) {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare($sql);
            foreach ($parameters as $param) {
                $stmt->execute($param);
            }
            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }

    public function getSingleData($sql, $params = [], $fetchMode = PDO::FETCH_ASSOC) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch($fetchMode);
    }

    public function getDataList($sql, $params = [], $fetchMode = PDO::FETCH_ASSOC) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll($fetchMode);
    }

    public function delete($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function update($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public static function main() {
        try {
            // Create a new PDO instance
            $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=numberwale", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dbAction = new DBAction($pdo);

            // Example usage
            $result = $dbAction->getDataList("SELECT * FROM users", []);
            var_dump($result);

        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    }
}