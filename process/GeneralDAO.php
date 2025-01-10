<?php
class GeneralDAO {

    public function getCateDetails($id) {
        $cateName = "";
        $con = null;
        $stmt = null;
        $res = null;
        try {
            $dbcon = new DBConnection();
            $con = $dbcon->getCon();
            $query = "SELECT * FROM categories WHERE cate_id = :id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                $cateName = $res['cate_name'];
            }
        } catch (Exception $e) {
            echo 'Exception: ' . $e->getMessage();
        } finally {
            $this->close($con, $stmt, $res);
        }
        return $cateName;
    }

    public function getVendorDetails($id) {
        $cateName = "";
        $con = null;
        $stmt = null;
        $res = null;
        try {
            $dbcon = new DBConnection();
            $con = $dbcon->getCon();
            $query = "SELECT * FROM vendorDetails WHERE id = :id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                $cateName = $res['firstname'];
            }
        } catch (Exception $e) {
            echo 'Exception: ' . $e->getMessage();
        } finally {
            $this->close($con, $stmt, $res);
        }
        return $cateName;
    }

    public function getImageUploadDetails($id) {
        $cateName = "";
        $con = null;
        $stmt = null;
        $res = null;
        try {
            $dbcon = new DBConnection();
            $con = $dbcon->getCon();
            $query = "SELECT COUNT(*) FROM ProductImageDetails WHERE product_id = :id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                $cateName = $res['COUNT(*)'];
            }
        } catch (Exception $e) {
            echo 'Exception: ' . $e->getMessage();
        } finally {
            $this->close($con, $stmt, $res);
        }
        return $cateName;
    }

    private function close($con, $stmt, $res) {
        if ($res !== null) {
            $res = null;
        }
        if ($stmt !== null) {
            $stmt = null;
        }
        if ($con !== null) {
            $con = null;
        }
    }
}
?>
