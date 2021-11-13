<?php
class PhanHoiModel extends DataBase{
    
    public function listAll(){
        $qr = "SELECT * FROM phanhoi";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getPhanHoiById($id) {
        $qr = "SELECT * FROM phanhoi WHERE id = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function update($id) {
        $qr = "UPDATE phanhoi SET tinhTrang = 2 WHERE id = '$id'";        
        return mysqli_query($this->con, $qr);
    }

    public function delete($id) {
        $qr = "DELETE FROM phanhoi WHERE id = '$id'";
        return mysqli_query($this->con, $qr);
    }

    public function SentPhanHoi($hoTen = "", $sdt = "", $email = "", $noiDung = "")
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");            
        $ngayGui = $date;
        $tinhTrang = 1;
        $qr = "INSERT INTO phanhoi (id, hoTen, sdt, email, noiDung, ngayGui, tinhTrang)
                VALUES ('', '$hoTen', '$sdt', '$email', '$noiDung', '$ngayGui', '$tinhTrang')";

        return mysqli_query($this->con, $qr);
        
    }
}
?>