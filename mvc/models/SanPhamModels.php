<?php
class SanPhamModels extends DataBase{

    public function GetSP(){
        // cách nối bảng: , loaidouong WHERE douong.MaLoaiDU = loaidouong.MaLoaiDU GROUP BY douong.MaLoaiDU
        $qr = "SELECT * FROM douong";
        return mysqli_query($this->con, $qr);
    }

    public function SanPham_New(){
        // Xếp theo ngày/tháng giảm dần => sản phẩm có ngày/ tháng thêm gần nhất đứng trước
        $qr = "SELECT * FROM douong ORDER BY NgayThem DESC";
        return mysqli_query($this->con, $qr);
    } 

    public function SanPham_Hot(){
        // Bán chạy 'true'
        $qr = "SELECT * FROM douong WHERE BanChay = 1";
        return mysqli_query($this->con, $qr);
    } 

    public function LoaiDoUong(){
        $qr = "SELECT * FROM loaidouong";
        return mysqli_query($this->con, $qr);
    } 

    public function Topping(){
        $qr = "SELECT * FROM topping";
        return mysqli_query($this->con, $qr);
    }
}
?>