<?php
class DoUongModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM douong";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    //lấy mã đồ uống lớn nhất
    public function getMaMax()
    {
        //lấy ra 1 bảng ghi có mã lớn nhất
        $qr = "SELECT MaDU FROM douong ORDER BY MaDU DESC LIMIT 0,1";
        $row = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($row);
        return $result['MaDU'];
    }

    public function getDoUongById($id)
    {
        $qr = "SELECT * FROM douong,loaidouong WHERE douong.MaLoaiDU = loaidouong.MaLoaiDU AND MaDU = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($madu, $tendu, $dongia, $anhdu, $ngaythem, $banchay, $loaiDU)
    {
        $qr = "INSERT INTO douong VALUES ('" . $madu . "', '" . $tendu . "','" . $dongia . "', '" . $anhdu . "', '" . $ngaythem . "','" . $banchay . "', '" . $loaiDU . "')";
        return mysqli_query($this->con, $qr);
    }

    public function update($madu, $tendu, $dongia, $anhdu, $ngaythem, $banchay, $loaiDU)
    {
        if($anhdu != null){
            $qr = "UPDATE douong SET TenDU = '$tendu', DonGia = '$dongia', HinhAnh ='$anhdu', 
            NgayThem = '$ngaythem', BanCHay  = '$banchay', MaLoaiDU = '$loaiDU' WHERE MaDU = '$madu'";
        } else {
            $qr = "UPDATE douong SET TenDU = '$tendu', DonGia = '$dongia', 
            NgayThem = '$ngaythem', BanCHay  = '$banchay', MaLoaiDU = '$loaiDU' WHERE MaDU = '$madu'";
        }
        return mysqli_query($this->con, $qr);
    }

    public function delete($madu)
    {
        $qr = "DELETE FROM douong WHERE MaDU = '$madu'";
        return mysqli_query($this->con, $qr);
    }

    // public function TimKiemDU($tukhoa)
    // {
    //     $qr = "select * from douong left join loaidouong on douong.MaLoaiDU = loaidouong.MaLoaiDU 
	// 			where 1 and TenDU like '%$tukhoa%' or MaDU like '%$tukhoa%' 
    //             or DonGia like '%$tukhoa%' or TenLoaiDU like '%$tukhoa%'";
    //     $rows = mysqli_query($this->con, $qr);
    //     $arr = array();
    //     while ($row = mysqli_fetch_array($rows)) {
    //         $arr[] = $row;
    //     }
    //     return json_encode($arr);
    // }

    public function TimKiem($maDU, $ten, $banChay, $MaLoaiDU, $dongia1, $dongia2)
    {
        // Query mặc định khi chưa truyền tham số tìm kiếm nào
        $qr = "select du.*, ldu.TenLoaiDU from douong du, loaidouong ldu
				where du.MaLoaiDU = ldu.MaLoaiDU" ;
        
        // Có tìm mã
        if($maDU != "") {
            $qr .= " and du.MaDU LIKE '%$maDU%'";
        }
        if($ten != "") {
            $qr .= " and du.TenDU LIKE '%$ten%'";
        }
        if($banChay != "") {
            $qr .= " and du.BanChay = '$banChay'";
        }
        if($MaLoaiDU != "") {
            $qr .= " and du.MaLoaiDU = '$MaLoaiDU'";
        }
        if($dongia1 != "" && $dongia2 != "") {
            $qr .= " and du.DonGia BETWEEN '$dongia1' and '$dongia2'";
        }
        if($dongia1 == "" && $dongia2 != "") {
            $qr .= " and du.DonGia BETWEEN '0' and '$dongia2'";
        }
        if($dongia1 != "" && $dongia2 == "") {
            $a = PHP_INT_MAX ;
            $qr .= " and du.DonGia BETWEEN '$dongia1' and '$a'";
        }

        $qr .= " ORDER BY du.MaDU ";

        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
