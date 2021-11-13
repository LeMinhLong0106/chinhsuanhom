<?php
class NhomNhanVienModel extends DataBase {

    public function getNNV()
    {
        $qr = "SELECT * FROM nhomnhanvien";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getNhomNhanVienById($id) {
        $qr = "SELECT * FROM nhomnhanvien WHERE IDNhom = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    
    
    public function insert($idNhom, $tenNhom) {
        $qr = "INSERT INTO nhomnhanvien (IDNhom, TenNhom) VALUES ('".$idNhom."', '".$tenNhom."')";
        return mysqli_query($this->con, $qr);
    }

    public function checkPK($idNhom){
        $result = "SELECT * FROM nhomnhanvien WHERE IDNhom = '$idNhom'";
        return mysqli_query($this->con, $result);
    }

    public function delete($idNhom)
    {
        $qr = "DELETE FROM nhomnhanvien WHERE IDNhom = '$idNhom'";
        return mysqli_query($this->con, $qr);
    }

    // public function search($searchTenNhom){
    //     $strSQL = "SELECT *
    //             FROM nhomnhanvien
    //             WHERE TenNhom LIKE '$searchTenNhom'";
    //             return mysqli_query($this->con, $strSQL);
    // }
   
}
?>