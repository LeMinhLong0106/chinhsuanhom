<?php
class GioHang extends Controller {
    public $hoadonModel;
    public $cthoadonModel;
    public $cttoppingModel;
    public function __construct()
    {
        $this->hoadonModel = $this->model("HoaDonModel");
        $this->cthoadonModel = $this->model("CTHoaDonModel");
        $this->cttoppingModel = $this->model("CTToppingModel");
    }

    public function index() {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $this->view("layoutCustomer", [
            "page" => "indexGioHang"
        ]);
    }
    
    public function taoDonHang() {
        if(isset($_POST['submitBtn'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            // Thêm hóa đơn
            $maHD = "";
            $strMa = "2" . date("dmY");
            $listMaHD = json_decode($this->hoadonModel->searchMaHDToCreate($strMa), true);
            if (count($listMaHD) == 0)
            {
                $maHD = $strMa . "0001";
                echo $maHD;
            }
            else
            {
                $arrMa = [];
                foreach($listMaHD as $ma) {
                    array_push($arrMa, $ma['MaHD']);
                }
                var_dump($arrMa);
                $maMax = max($arrMa);
                echo $maMax."<br>";
                $temp = substr($maMax, 9) + 1;
                echo $temp."<br>";
                $maHD = $strMa . "000" . $temp;
                echo $maHD."<br>";
            }
            $hoten = $_POST['hoTen'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diaChi'];
            $ngaylap = (string)date("Y-m-d H:i:s");
            $ghichu = isset($_POST['ghiChu']) ? $_POST['ghiChu'] : "";
            $tongtien = $_POST['tongtien'];
            $this->hoadonModel->insert($maHD, $hoten, $sdt, $diachi, $ghichu, $tongtien, $ngaylap);

            // Thêm chi tiết hóa đơn
            $listItemInCart = $_SESSION["cart"];
            foreach ($listItemInCart as $item)
            {
                $this->cthoadonModel->insert($maHD, $item['doUong']['MaDU'], $item['size'], $item['thoigianthem'], $item['soluong'], $item['da'] ,$item['duong']);
                if (isset($item['listTP']) && count($item['listTP']) > 0)
                {
                    foreach ($item['listTP'] as $tp)
                    {
                        $this->cttoppingModel->insert($maHD, $item['doUong']['MaDU'], $item['thoigianthem'], $tp['MaTP'], $item['soluong']);
                    }
                }
            }
            unset($_SESSION["cart"]);
            return $this->redirectTo("GioHang", "Announce");
        }
    }

    public function Delete($id) {
        $listItemInCart = $_SESSION["cart"];
        array_splice($listItemInCart, $id, 1);
        $_SESSION["cart"] = $listItemInCart;
        return $this->redirectTo("GioHang", "Index");
    }

    public function DeleteAll() {
        unset($_SESSION["cart"]);
        return $this->redirectTo("GioHang", "Index");
    }

    //trang thông báo đặt hành thành công
    public function Announce() {
        return $this->view('layoutCustomer', [
            'page' => 'announceGioHang'
        ]);
    }

    public function ThayDoiSL($id)
    {
        if(isset($_POST['changeSL'])) {
            $listItemInCart = $_SESSION["cart"];
            $listItemInCart[$id]['soluong'] = $_POST['changeSL'];
            $_SESSION["cart"] = $listItemInCart;
            return $this->redirectTo("GioHang", "Index");
        }
    }

    public function temp()
    {
        if(isset($_SESSION['cart'])) {
            echo '<pre>';
            print_r($_SESSION['cart']);
            echo '</pre>';
        }
    } 
} 
?>