<?php
//require_once '../../mvc/common/validate.php'; //sao lại k đúng nhờ , cay @@
require_once './mvc/common/validate.php';
class NhomNhanVien extends Controller{

    public $nnvModel;
    public function __construct()
    {
        $this->nnvModel = $this->model("NhomNhanVienModel");
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
        else {
            $pq = new HasCredentials("QUANLYNHOMNHANVIEN");
            if(!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function Index(){
        $listNNV = json_decode($this->nnvModel->getNNV(), true);
        $this->view("layoutAdmin",
        [
            "page"=>"nhomnhanvien/indexNNV",
            'listNNV' => $listNNV
        ]
    );
    }

    function Create()
    {
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "nhomnhanvien/createNNV"
            ]
        );
    }

    function Store()
    {
        // thêm thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["idNhom"])) {
                $idNhom = $_POST['idNhom'];
            }
            if (isset($_POST["tenNhom"])) {
                $tenNhom = $_POST['tenNhom'];
            }
            validateMaNNV($idNhom);
            // Đã nhập, tiếp theo ktra khóa
            if(!isset($_SESSION['error']['maNNV'])) {
                $result = $this->nnvModel->checkPK($idNhom);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error']['maNNV'] = "Mã nhóm nhân viên đã tồn tại";
                }
            }
            // Kiểm tra nhập liệu tên
            validateTenNNV($tenNhom);
            // 1 trong 2 trường có lỗi gì đó
            if(isset($_SESSION['error']) && count($_SESSION['error']) > 0){
                // Lấy lại giá trị trước khi redirect về
                $_SESSION['nnv'] = ['maNNV' => $idNhom, 'tenNNV' => $tenNhom];
                return $this->redirectTo("NhomNhanVien", "Create");
            }
            
            else{
                $save = $this->model("NhomNhanVienModel");
                $save->insert($idNhom, $tenNhom);
                $_SESSION['thongbao'] = "Thêm mới nhóm nhân viên thành công";
            }
        }
        return $this->redirectTo("NhomNhanVien", "Index");
    }


    function Delete($id)
    {
        $nnv = json_decode($this->nnvModel->getNhomNhanVienById($id), true);

        //view edit
        if (count($nnv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhomnhanvien/deleteNNV',
                'nnv' => $nnv[0],
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("NhomNhanVienModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa nhóm nhân viên thành công";
        }
        return $this->redirectTo("NhomNhanVien", "Index");
    }

    // function SearchNNV($searchTenNhom){
    //     $searchTenNhom = "";
    //     if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['searchBtn']) && $_GET['searchBtn'] != "") {
    //         $searchTenNhom = $_GET['tenNhom'];
    //         $confirm = $this->model("NhomNhanVienModel");
    //         $confirm->delete($searchTenNhom);
    //     }
    // }



}
?>