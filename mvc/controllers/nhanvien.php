<?php
require_once './mvc/common/validate.php';
class NhanVien extends Controller
{

    public $nvModel;
    public $nnvModel;
    public function __construct()
    {
        $this->nvModel = $this->model("NhanVienModel");
        $this->nnvModel = $this->model("NhomNhanVienModel");
        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYNHANVIEN");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function LayMaNV()
    {
        $maMax = $this->nvModel->getMaMax();
        $maNV = (int)(substr($maMax, 2)) + 1; 
        $NV = "000". (string)$maNV; 
        return "NV" . substr($NV, -4); 
    }
    function Index()
    {
        $maNV = "";
        $tenNV = "";
        $gioiTinh = "";
        $idNhom = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maNV = trim($_POST['maNV']);
            $tenNV = trim($_POST['tenNV']);
            $gioiTinh = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : "";
            $idNhom = $_POST['idNhom'];
        } //mà mặc định là get rồi '-', uawf thi tu get r ma
        
        $listNV = json_decode($this->nvModel->TimKiem($maNV, $tenNV, $gioiTinh, $idNhom), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "nhanvien/indexNV",
                'listNV' => $listNV,
                'listTenNhomNV' => $listTenNhomNV
            ]
        );
    }

    function Details($id)
    {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        //view edit
        if (count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/detailsNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Create()
    {
        $listNV = json_decode($this->nvModel->getNV(), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);

        //tạo mã tự động
        $manv = $this->LayMaNV();
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "nhanvien/createNV",
                "manv" => $manv,
                'listTenNhomNV' => $listTenNhomNV
            ]
        );
    }

    function Store()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $manv = $_POST['manv'];
            $tennv = $_POST['tennv'];
            $gioiTinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sdt = $_POST['sdt'];
            if ($_FILES["hinhanh"]['name'] != NULL) {
                $hinhanh = $_FILES["hinhanh"]['name'];
                move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "public/upload/nguoidung/" . $_FILES["hinhanh"]["name"]);
            }
            $nhomNV = $_POST['nhomNV'];

            validateTenNV($tennv);
            validateNgaySinh($ngaysinh);
            validateDiaChi($diachi);
            validateEmail($email);
            if(validateEmail($email) == null){
                $result = $this->nvModel->checkEmail($email);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error']['email'] = "Email này đã tồn tại!";
                }
            }
            validateMatKhau($password);
            validateSoDienThoai($sdt);
            validateAnhNV($_FILES["hinhanh"]['name']);
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['nv'] = [
                    'tenNV' => $tennv,
                    'gioiTinh' => $gioiTinh,
                    'ngaySinh' => $ngaysinh,
                    'diaChi' => $diachi,
                    'email' => $email,
                    'matKhau' => $password,
                    'soDienThoai' => $sdt,
                    'nnv' => $nhomNV
                ];
                return $this->redirectTo("NhanVien", "Create");
            } else {
                $save = $this->model("NhanVienModel");
                $save->insert($manv, $tennv, $gioiTinh, $ngaysinh, $diachi, $email, md5($password), $sdt, $hinhanh, $nhomNV);
                // $save->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $hinhAnh, $nhomNV);
                $_SESSION['thongbao'] = "Thêm mới nhân viên thành công";
            }
        }

        return $this->redirectTo("NhanVien", "Index");
    }

    function Edit($id)
    {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);

        //view edit
        if (count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/editNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $maNV = $_POST['maNV'];
            $tenNV = $_POST['tenNV'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioitinh'];
            $diaChi = $_POST['diaChi'];
            $sdt = $_POST['sdt'];
            $nhomNV = $_POST['nhomNV'];

            validateTenNV($tenNV);
            validateNgaySinh($ngaySinh);
            validateDiaChi($diaChi);
            validateSoDienThoai($sdt);
            
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['nv'] = [
                    'tenNV' => $tenNV,
                    'gioiTinh' => $gioiTinh,
                    'ngaySinh' => $ngaySinh,
                    'diaChi' => $diaChi,
                    'soDienThoai' => $sdt,
                    'nnv' => $nhomNV
                ];
                return $this->redirectTo("NhanVien", "Edit", ['id' => $maNV]);
            }
            else if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['name'] != "") {
                $hinh = $_FILES['hinhAnh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/nguoidung/" . $tenAnh);
                $this->nvModel->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $tenAnh, $nhomNV);
            } else {
                $this->nvModel->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, null, $nhomNV);
            }

            // if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
                if ($_SESSION['user']['maNV'] == $maNV) {
                    if ($tenAnh != "") {
                        $_SESSION['user']['hinhAnh'] = $tenAnh;
                    }
                    $_SESSION['user']['tenNV'] = $tenNV;
                }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo("NhanVien", "Index");
            // }
        }
    }

    function Delete($id)
    {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        //view edit
        if (count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/deleteNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("NhanVienModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa nhân viên thành công";
        }
        return $this->redirectTo("NhanVien", "Index");
    }
}

