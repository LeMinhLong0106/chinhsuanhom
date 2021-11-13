<?php
class DanhSachQuyenModel extends DataBase {

    public function getDSQ()
    {
        $qr = "SELECT * FROM danhsachquyen dsq, quyen q, nhomnhanvien nnv 
        WHERE dsq.IDQuyen = q.IDQuyen AND dsq.IDNhom = nnv.IDNhom";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getPhanQuyenById($idNhom, $idQuyen) {
        $qr = "SELECT * FROM danhsachquyen dsq, quyen q, nhomnhanvien nnv 
        WHERE dsq.IDQuyen = q.IDQuyen AND dsq.IDNhom = nnv.IDNhom
        AND dsq.IDQuyen = '$idQuyen' AND dsq.IDNhom = '$idNhom'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    } 
// kt khóa chính 
    public function checkPK($idNhom, $idquyen) {
        $qr = "SELECT * FROM danhsachquyen
        WHERE IDQuyen = '$idquyen' AND IDNhom = '$idNhom'";
        return mysqli_query($this->con, $qr);
    }
    
    public function insert($idNhom, $idquyen) {
        $qr = "INSERT INTO danhsachquyen (IDNhom, IDQuyen) VALUES ('".$idNhom."', '".$idquyen."')";
        return mysqli_query($this->con, $qr);
    }

    public function delete($idNhom, $idQuyen)
    {
        $qr = "DELETE FROM danhsachquyen WHERE IDNhom = '$idNhom' AND IDQUYEN = '$idQuyen'";
        return mysqli_query($this->con, $qr);
    }
}
?>