<?php
require_once './mvc/common/validate.php';
class DoUong extends Controller
{
    public $duModel;
    public $lduModel;

    public function __construct()
    {
        //load model
        $this->duModel = $this->model("DoUongModel");
        $this->lduModel = $this->model("LoaiDoUongModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function LayMaDU()
    {
        $maMax = $this->duModel->getMaMax();
        echo $maMax."<br>";
        $maDU = (int)(substr($maMax, 2)) + 1;
        echo $maDU;
        $DU = "000" . (string)$maDU;
        echo "<br>" . $DU; 
        echo "<br>DU" . substr($DU, -4);
        return "DU" . substr($DU, -4);
    }

    function Index()
    {
        $maDU = "";
        $tenDU = "";
        $banChay = "";
        $MaLoaiDU = "";
        $dongia1 = $dongia2 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maDU = trim($_POST['maDU']);
            $tenDU = trim($_POST['tenDU']);
            $banChay = isset($_POST['banChay']) ? $_POST['banChay'] : "";
            $MaLoaiDU = $_POST['MaLoaiDU'];
            $dongia1 = trim($_POST['dongia1']);
            $dongia2 = trim($_POST['dongia2']);
        } //mà mặc định là get rồi '-', uawf thi tu get r ma

        $listDU = json_decode($this->duModel->TimKiem($maDU, $tenDU, $banChay, $MaLoaiDU, $dongia1, $dongia2), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "douong/indexDU",
                'listDU' => $listDU,
                'listTenLoaiDU' => $listTenLoaiDU,
            ]
        );
    }

    function Create()
    {
        $listDU = json_decode($this->duModel->listAll(), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);

        //tạo mã tự động
        $madu = $this->LayMaDU();

        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "douong/createDU",
                "madu" => $madu,
                'listTenLoaiDU' => $listTenLoaiDU
            ]
        );
    }

    function Edit($id)
    {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);

        //view edit
        if (count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/editDU',
                'du' => $du[0],
                'listTenLoaiDU' => $listTenLoaiDU
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $madu = $_POST['madu'];
            $tendu = $_POST['tendu'];
            $dongia = $_POST['dongia'];
            if ($_FILES["hinh"]['name'] != NULL) {
                $hinh = $_FILES["hinh"]['name'];
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/douong/" . $_FILES["hinh"]["name"]);
            }
            $ngaythem = $_POST['ngaythem'];
            $banChay = $_POST['banchay'];
            $loaiDU = $_POST['loaiDU'];

            validateTenDU($tendu);
            validateGia($dongia);
            validateAnhDU($_FILES["hinh"]['name']);
            validateNgayThem($ngaythem);
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['du'] = [
                    'tenDU' => $tendu,
                    'donGia' => $dongia,
                    'ngayThem' => $ngaythem,
                    'banChay' => $banChay,
                    'ldu' => $loaiDU
                ];
                return $this->redirectTo("DoUong", "Create");
            } else {
                $save = $this->model("DoUongModel");
                $save->insert($madu, $tendu, $dongia, $hinh, $ngaythem, $banChay, $loaiDU);
                $_SESSION['thongbao'] = "Thêm mới đồ uống thành công";
            }
        }

        return $this->redirectTo("DoUong", "Index");
    }



    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $madu = $_POST['madu'];
            $tendu = $_POST['tendu'];
            $dongia = $_POST['dongia'];
            $ngaythem = $_POST['ngaythem'];
            // $banChay = $_POST['banchay'] || '0';
            $banChay = isset($_POST['banchay']) ? $_POST['banchay']  : '0';
            $loaiDU = $_POST['loaiDU'];


            validateTenDU($tendu);
            validateGia($dongia);
            validateNgayThem($ngaythem);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['du'] = [
                    'tenDU' => $tendu,
                    'donGia' => $dongia,
                    'ngayThem' => $ngaythem,
                    'banChay' => $banChay,
                    'ldu' => $loaiDU
                ];
                return $this->redirectTo("DoUong", "Edit", ['id' => $madu]);
            } else if (isset($_FILES['hinh']) && $_FILES['hinh']['name'] != "") {
                $hinh = $_FILES['hinh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/douong/" . $tenAnh);
                // $result = $this->duModel->update($madu, $tendu, $dongia, $tenAnh, $ngaythem, $banChay, $loaiDU);
                $save = $this->model("DoUongModel");
                $save->update($madu, $tendu, $dongia, $tenAnh, $ngaythem, $banChay, $loaiDU);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            } else {
                // $result = $this->duModel->update($madu, $tendu, $dongia, null, $ngaythem, $banChay, $loaiDU);
                $save = $this->model("DoUongModel");
                $save->update($madu, $tendu, $dongia, null, $ngaythem, $banChay, $loaiDU);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            }

            // if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
            //     $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            //     return $this->redirectTo("DoUong", "Index");
            // }

        }
        return $this->redirectTo("DoUong", "Index");
    }

    function Delete($id)
    {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        //view edit
        if (count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/deleteDU',
                'du' => $du[0],
                'listTenLoaiDU' => $listTenLoaiDU
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("DoUongModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = " Xóa đồ uống thành công";
        }
        return $this->redirectTo("DoUong", "Index");
    }
}
