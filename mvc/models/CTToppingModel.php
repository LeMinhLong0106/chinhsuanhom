<?php
class CTToppingModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM cttopping";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function mergeTopping($id)
    {
        $qr = "SELECT * 
                FROM cttopping cttp
                INNER JOIN topping tp ON tp.MaTP = cttp.MaTP
                WHERE MaHD = '$id'
                ";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getCTTPById($id)
    {
        $qr = "SELECT * FROM cttopping
                WHERE MaHD = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($maHD, $maDU, $thoigianthem, $maTP, $sl)
    {
        $qr = "INSERT INTO `cttopping` (`MaHD`, `MaDU`, `ThoiGianThem`, `MaTP`, `SoLuong`) 
        VALUES 
        ('$maHD', '$maDU', '$thoigianthem', '$maTP', $sl)";
        mysqli_query($this->con, $qr);
    }
}
