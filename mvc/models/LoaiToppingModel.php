<?php
class LoaiToppingModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM loaitopping";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    public function getLoaiToppingById($id) {
        $qr = "SELECT * FROM loaitopping WHERE MaLoaiTP = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    public function insert($maltp, $tenltp) {
        $qr = "INSERT INTO loaitopping (MaLoaiTP, TenLoaiTP) VALUES ('".$maltp."', '".$tenltp."')";
        return mysqli_query($this->con, $qr);
    }

    public function checkPK($maltp){
        $result = "SELECT * FROM loaitopping WHERE MaLoaiTP = '$maltp'";
        return mysqli_query($this->con, $result);
    }

    public function update($maltp, $tenltp) {
        $qr = "UPDATE loaitopping SET TenLoaiTP = '$tenltp'  WHERE MaLoaiTP = '$maltp'";   
        // var_dump($tenltp);
        return mysqli_query($this->con, $qr);
    }

    public function delete($maltp)
    {
        $qr = "DELETE FROM loaitopping WHERE MaLoaiTP = '$maltp'";
        return mysqli_query($this->con, $qr);
    }
}
?>