<?php
class ToppingModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM topping";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getMaMax()
    {
        $qr = "SELECT MaTP FROM topping ORDER BY MaTP DESC LIMIT 0,1";
        $row = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($row);
        return $result['MaTP'];
    }

    public function getToppingById($id) {
        $qr = "SELECT * FROM topping,loaitopping WHERE topping.MaLoaiTP = loaitopping.MaLoaiTP AND MaTP = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function update($matp, $tentp, $dongia, $anhtp, $loaiTP)
    {
        if($anhtp != null){
            $qr = "UPDATE topping SET TenTP = '$tentp', DonGia = '$dongia', HinhAnh ='$anhtp', MaLoaiTP = '$loaiTP' WHERE MaTP = '$matp'";
        } else {
            $qr = "UPDATE topping SET TenTP = '$tentp', DonGia = '$dongia', MaLoaiTP = '$loaiTP' WHERE MaTP = '$matp'";
        }       
        return mysqli_query($this->con, $qr);
    }

    public function delete($matp) {
        $qr = "DELETE FROM topping WHERE MaTP = '$matp'";
        return mysqli_query($this->con, $qr);
    }

    public function insert($matp, $tentp, $dongia, $anhtp, $loaiTP)
    {
        $qr = "INSERT INTO topping VALUES ('" . $matp . "', '" . $tentp . "','" . $dongia . "', '" . $anhtp . "', '" . $loaiTP . "')";
        return mysqli_query($this->con, $qr);
    }
    public function TimKiem($maTP, $ten,  $MaLoaiTP, $dongia1, $dongia2)
    {
        // Query mặc định khi chưa truyền tham số tìm kiếm nào
        $qr = "select tp.*, ltp.TenLoaiTP from topping tp, loaitopping ltp
                where tp.MaLoaiTP = ltp.MaLoaiTP" ;
        
        // Có tìm mã
        if($maTP != "") {
            $qr .= " and tp.MaTP LIKE '%$maTP%'";
        }
        if($ten != "") {
            $qr .= " and tp.TenTP LIKE '%$ten%'";
        }
        if($MaLoaiTP != "") {
            $qr .= " and tp.MaLoaiTP = '$MaLoaiTP'";
        }
        if($dongia1 != "" && $dongia2 != "") {
            $qr .= " and tp.DonGia BETWEEN '$dongia1' and '$dongia2'";
        }
        if($dongia1 == "" && $dongia2 != "") {
            $qr .= " and tp.DonGia BETWEEN '0' and '$dongia2'";
        }
        if($dongia1 != "" && $dongia2 == "") {
            $a = PHP_INT_MAX ;
            $qr .= " and tp.DonGia BETWEEN '$dongia1' and '$a'";
        }

        $qr .= " ORDER BY tp.MaTP ";

        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>