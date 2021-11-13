<?php
class HoaDonModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM hoadon ORDER BY hoadon.NgayLap DESC";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    //lấy mã
    public function searchMaHDToCreate($id)
    {
        $qr = "SELECT MaHD FROM hoadon WHERE MaHD LIKE '$id%'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getHoaDonById($id)
    {
        $qr = "SELECT * FROM hoadon WHERE MaHD = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function TimKiem($hoten, $tinhtrang, $shipper)
    {
        // Query mặc định
        $qr = "SELECT * FROM hoadon hd WHERE 1";

        // Có tìm mã
        if ($hoten != "") {
            $qr .= " AND hd.HoTen LIKE '%$hoten%'";
        }
        // if ($ngaymua != "") {
        //     $qr .= " AND hd.NgayLap LIKE '%$ngaymua%'";
        // }
        if ($tinhtrang != "") {
            $qr .= " AND hd.TinhTrang = '$tinhtrang'";
        }
        if ($shipper != "") {
            $qr .= " AND hd.MaNV = '$shipper'";
        }

        $qr .= " ORDER BY hd.NgayLap DESC";

        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($maHD, $hoten, $sdt, $diachi, $ghichu, $tongtien, $ngaylap)
    {
        $qr = "INSERT INTO `hoadon` (`MaHD`, `HoTen`, `Sdt`, `DiaChi`, `GhiChu`, `TongTien`, `NgayLap`, `TinhTrang`, `MaNV`) 
        VALUES
        ('$maHD', '$hoten', '$sdt', '$diachi', '$ghichu', $tongtien, '$ngaylap', 1, NULL)";
        $kq = mysqli_query($this->con, $qr);
        return $kq;
    }

    public function update($maHD, $tinhtrang, $maNV)
    {
        $qr = "UPDATE hoadon SET TinhTrang = $tinhtrang, MaNV = '$maNV' WHERE MaHD = '$maHD'";
        return mysqli_query($this->con, $qr);
    }

    public function delete($maHD)
    {
        $qr = "DELETE FROM hoadon WHERE MaHD = '$maHD'";
        return mysqli_query($this->con, $qr);
    }
}
