<?php
class NhanVienModel extends DataBase {
    public function getNV()
    {
        $qr = "SELECT * FROM nhanvien";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getMaMax()
    {
        $qr = "SELECT maNV FROM nhanvien ORDER BY maNV DESC LIMIT 0,1";
        $row = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($row);
        return $result['maNV'];
    }

    public function getNhanVienById($id)
    {
        $qr = "SELECT * FROM nhanvien, nhomnhanvien WHERE nhanvien.IDNhom = nhomnhanvien.IDNhom AND nhanvien.maNV = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    //lấy danh sách shiper
    public function listShipper()
    {
        $qr = "SELECT * FROM nhanvien, nhomnhanvien WHERE nhanvien.IDNhom = nhomnhanvien.IDNhom AND nhanvien.IDNhom = 'SHIPPER'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getShipperById($id)
    {
        $qr = "SELECT * FROM nhanvien, nhomnhanvien WHERE nhanvien.IDNhom = nhomnhanvien.IDNhom 
        AND nhanvien.IDNhom = 'SHIPPER' AND nhanvien.maNV = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($manv, $tennv, $gioitinh, $ngaysinh, $diachi, $email, $password, $sdt, $hinhanh, $nhomNV)
    {
        $qr = "INSERT INTO nhanvien VALUES ('" . $manv . "', '" . $tennv . "','" . $gioitinh . "', '" . $ngaysinh . "', '" . $diachi . "','" . $email . "','" . $password . "', '" . $sdt . "', '" . $hinhanh .  "', '" . $nhomNV . "')";
        return mysqli_query($this->con, $qr);
    }

    public function delete($manv) {
        $qr = "DELETE FROM nhanvien WHERE maNV = '$manv'";
        return mysqli_query($this->con, $qr);
    }

    public function update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $hinhAnh, $nhomNV)
    {

        // Có update hình ảnh
        if($hinhAnh != null){
            $qr = "UPDATE nhanvien SET tenNV = '$tenNV',
            ngaySinh = '$ngaySinh', gioiTinh = '$gioiTinh', diaChi = '$diaChi',
            hinhAnh = '$hinhAnh', sdt ='$sdt', IDNhom = '$nhomNV' WHERE maNV = '$maNV'";
        }
        else {
            $qr = "UPDATE nhanvien SET tenNV = '$tenNV',
            ngaySinh = '$ngaySinh', gioiTinh = '$gioiTinh', diaChi = '$diaChi',
            sdt ='$sdt', IDNhom = '$nhomNV' WHERE maNV = '$maNV'";
        }
        return mysqli_query($this->con, $qr);
    }

    public function doiMK($maNV, $matKhauMoi) {
        $qr = "UPDATE nhanvien SET password = '$matKhauMoi' WHERE maNV = '$maNV'";
        return mysqli_query($this->con, $qr);
    }

    public function TimKiem($maNV, $tenNV, $gioiTinh, $idNhom)
    {
        // Query mặc định khi chưa truyền tham số tìm kiếm nào
        $qr = "select nv.*, nnv.TenNhom from nhanvien nv, nhomnhanvien nnv
				where nv.IDNhom = nnv.IDNhom";
        
        // Có tìm mã
        if($maNV != "") {
            $qr .= " and nv.maNV LIKE '%$maNV%'";
        }
        if($tenNV != "") {
            $qr .= " and nv.tenNV LIKE '%$tenNV%'";
        }
        if($gioiTinh != "") {
            $qr .= " and nv.gioiTinh = '$gioiTinh'";
        }
        if($idNhom != "") {
            $qr .= " and nv.IDNhom = '$idNhom'";
        }
        $qr .= " ORDER BY nv.maNV ";

        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function checkEmail($email){
        $result = "SELECT * FROM nhanvien WHERE email = '$email'";
        return mysqli_query($this->con, $result);
    }

    
}
?>