<?php
class LoaiDoUongModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM loaidouong";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getLoaiDoUongById($id) {
        $qr = "SELECT * FROM loaidouong WHERE MaLoaiDU = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($maldu, $tenldu) {
        $qr = "INSERT INTO loaidouong (MaLoaiDU, TenLoaiDU) VALUES ('".$maldu."', '".$tenldu."')";
        return mysqli_query($this->con, $qr);
    }

    public function checkPK($maldu){
        $result = "SELECT * FROM loaidouong WHERE MaLoaiDU = '$maldu'";
        return mysqli_query($this->con, $result);
    }

    public function update($maldu, $tenldu) {
        $qr = "UPDATE loaidouong SET TenLoaiDU = '$tenldu'  WHERE MaLoaiDU = '$maldu'";   
        // var_dump($tenldu);
        return mysqli_query($this->con, $qr);
    }

    public function delete($maldu)
    {
        $qr = "DELETE FROM loaidouong WHERE MaLoaiDU = '$maldu'";
        return mysqli_query($this->con, $qr);
    }
}
?>