<?php
class DonHang extends Controller
{

    public $dhModel;
    public $cthdModel;
    public $nvModel;
    public $cttpModel;

    public function __construct()
    {
        $this->dhModel = $this->model("HoaDonModel");
        $this->nvModel = $this->model("NhanVienModel");
        $this->cthdModel = $this->model("CTHoaDonModel");
        $this->cttpModel = $this->model("CTToppingModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYHOADON");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function Index()
    {
        $hoten = "";
        // $ngaymua = "";
        $tinhtrang = "";
        $shipper = "";
        $year = 2000;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hoten = trim($_POST['hoten']);
            // $ngaymua = $_POST['ngaymua'];
            // $ngaymua = str_replace('/', '-', $ngaymua);
            // $ngaymua = date('Y-m-d', strtotime($ngaymua));
            $tinhtrang = isset($_POST['tinhtrang']) ? $_POST['tinhtrang'] : "";
            $shipper = $_POST['shipper'];
        }

        // if (substr($ngaymua, 0, -6) <= $year)
        //     $ngaymua = "";

        // echo $ngaymua;
        //giải mã json thành mảng (có key, value)
        $listHD = json_decode($this->dhModel->TimKiem($hoten,  $tinhtrang, $shipper), true);
        $NV = json_decode($this->nvModel->getNV(), true);
        $listShipper = json_decode($this->nvModel->listShipper(), true);

        $this->view("layoutAdmin", [
            'page' => 'donhang/indexDH',
            'listHD' => $listHD,
            'listshipper' => $listShipper,
            'NV' => $NV
        ]);
    }
    //kiểm đơn (giống edit)
    function Check($id)
    {
        $listDH = json_decode($this->dhModel->getHoaDonById($id), true);
        $listShipper = json_decode($this->nvModel->listShipper(), true);
        // var_dump($listDH[0]['TinhTrang']);

        if (count($listDH) > 0) {
            if ($listDH[0]['TinhTrang'] == 1) {
                //view edit
                $this->view("layoutAdmin", [
                    'page' => 'donhang/checkDH',
                    'listDH' => $listDH[0],
                    'listShipper' => $listShipper
                ]);
            } else if ($listDH[0]['TinhTrang'] == 2 || $listDH[0]['TinhTrang'] == 0) {
                $_SESSION['error']['donhang'] = "Đơn bạn chọn đã giao hoặc đã hủy, không thể thao tác !";
                return $this->redirectTo("DonHang", "Index");
            }
        } else {
            echo "Ops! Có vẻ bạn thao tác sai rồi";
        }
    }
    //lưu lại thay đổi trong  đơn đã kiểm
    function Save($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tinhtrang"])) {
                $tinhtrang = $_POST['tinhtrang'];
            }
            if (isset($_POST["shipper"])) {
                $maNV = $_POST['shipper'];
            }

            $save = $this->model("HoaDonModel");
            $save->update($id, $tinhtrang, $maNV);
            $_SESSION['thongbao'] = "Đơn đã được kiểm !";
        }
        return $this->redirectTo("DonHang", "Index");
    }

    function Details($id)
    {
        $cthd = "";
        $hd = json_decode($this->dhModel->getHoaDonById($id), true);
        $cttpid = json_decode($this->cttpModel->getCTTPById($id), true);

        $shipper = json_decode($this->nvModel->listShipper(), true);
        $cttp = json_decode($this->cttpModel->mergeTopping($id), true);
        $ttkh = json_decode($this->cthdModel->mergeHoaDonByID($id), true);

        if (isset($cttpid[0]["MaHD"])) {
            if ($hd[0]["MaHD"] == $cttpid[0]["MaHD"]) {
                $cthd = json_decode($this->cthdModel->mergeHd_CttpByID($id), true);
                // echo "OK";
            }
        } else {
            $cthd = json_decode($this->cthdModel->mergeHoaDonByID($id), true);
            // echo "NO";
        }

        if (count($cthd) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'donhang/detailsDH',
                'cthd' => $cthd,
                'shipper' => $shipper,
                'cttp' => $cttp,
                'ttkh' => $ttkh[0]
            ]);
        } else {
            echo "Ops! Có vẻ bạn thao tác sai rồi";
        }
    }

    function Print($id)
    {
        $cthd = "";
        $hd = json_decode($this->dhModel->getHoaDonById($id), true);
        $cttpid = json_decode($this->cttpModel->getCTTPById($id), true);

        $shipper = json_decode($this->nvModel->listShipper(), true);
        $cttp = json_decode($this->cttpModel->mergeTopping($id), true);
        $ttkh = json_decode($this->cthdModel->mergeHoaDonByID($id), true);

        if (isset($cttpid[0]["MaHD"])) {
            if ($hd[0]["MaHD"] == $cttpid[0]["MaHD"]) {
                $cthd = json_decode($this->cthdModel->mergeHd_CttpByID($id), true);
                // echo "OK";
            }
        } else {
            $cthd = json_decode($this->cthdModel->mergeHoaDonByID($id), true);
            // echo "NO";
        }

        if (count($cthd) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'donhang/printDH',
                'cthd' => $cthd,
                'shipper' => $shipper,
                'cttp' => $cttp,
                'ttkh' => $ttkh[0]
            ]);
        } else {
            echo "Ops! Có vẻ bạn thao tác sai rồi";
        }
    }

    function Delete($id)
    {
        $donhang = json_decode($this->dhModel->getHoaDonById($id), true);
        $shipper = json_decode($this->nvModel->listShipper(), true);

        if (count($donhang) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'donhang/deleteDH',
                'donhang' => $donhang[0],
                'shipper' => $shipper
            ]);
        } else {
            echo "Ops! Có vẻ bạn thao tác sai rồi";
        }
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("HoaDonModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Đơn hàng đã được xóa !";
        }
        return $this->redirectTo("DonHang", "Index");
    }

    // function TimKiem()
    // {
    //     $NV = json_decode($this->nvModel->getNV(), true);
    //     $listShipper = json_decode($this->nvModel->listShipper(), true);

    //     if (isset($_POST['tukhoa'])) {
    //         $tukhoa = $_POST['tukhoa'];
    //         $db_tk = json_decode($this->dhModel->TimKiemDH($tukhoa), true);
    //     }

    //     $this->view("layoutAdmin", [
    //         'page' => 'donhang/timkiem',
    //         'NV' => $NV,
    //         'listshipper' => $listShipper,
    //         "timkiem" => $db_tk,
    //     ]);
    // }
}
