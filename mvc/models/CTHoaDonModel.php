<?php
class CTHoaDonModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM chitiethd";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function mergeHoaDonByID($id)
    {
        $qr = "SELECT * 
                FROM hoadon hd
                INNER JOIN chitiethd cthd ON hd.MaHD = cthd.MaHD
                INNER JOIN douong du ON du.MaDU = cthd.MaDU
                -- INNER JOIN cttopping cttp ON cttp.MaDU = du.MaDU AND hd.MaHD = cttp.MaHD
                WHERE hd.MaHD = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    // public function mergeHd_CttpByID($id)
    // {
    //     $qr = "SELECT DISTINCT * 
    //             FROM hoadon hd
    //             LEFT JOIN chitiethd cthd ON hd.MaHD = cthd.MaHD
    //             LEFT JOIN douong du ON du.MaDU = cthd.MaDU
    //             -- LEFT JOIN cttopping cttp ON cttp.MaDU = du.MaDU AND hd.MaHD = cttp.MaHD
    //             WHERE hd.MaHD = '$id'";
    //     $rows = mysqli_query($this->con, $qr);
    //     $arr = array();
    //     while ($row = mysqli_fetch_array($rows)) {
    //         $arr[] = $row;
    //     }
    //     return json_encode($arr);
    // }

    public function insert($maHD, $maDU, $size, $thoigianthem, $soluong, $da, $duong)
    {
        $qr = "INSERT INTO `ChiTietHD` (`MaHD`, `MaDU`, `Size`, `ThoiGianThem`, `SoLuong`, `PhanTramDa`, `PhanTramDuong`) 
        VALUES 
        ('$maHD', '$maDU', '$size', '$thoigianthem', $soluong, $da, $duong)";
        mysqli_query($this->con, $qr);
    }

}
