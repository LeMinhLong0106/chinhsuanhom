<?php
require_once './mvc/common/validate.php';
class LoaiTopping extends Controller
{
    public $ltpModel;

    public function __construct()
    {
        $this->ltpModel = $this->model("LoaiToppingModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        }
        else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if(!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }


    function Index()
    {
        $listLTP = json_decode($this->ltpModel->listAll(), true);
        // trả về list topping
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaitopping/indexLTP",
                'listLTP' => $listLTP
            ]
        );
    }

    function Create()
    {
        // thêm mới topping
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaitopping/createLTP"
            ]
        );
    }

    function Edit($id)
    {
        $ltp = json_decode($this->ltpModel->getLoaiToppingById($id), true);
        //view edit
        if (count($ltp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaitopping/editLTP',
                'ltp' => $ltp[0],
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        // thêm thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["maltp"])) {
                $maltp = $_POST['maltp'];
            }
            if (isset($_POST["tenltp"])) {
                $tenltp = $_POST['tenltp'];
            }
            validateMaLTP($maltp);
            if(!isset($_SESSION['error']['maLTP'])) {
                $result = $this->ltpModel->checkPK($maltp);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error']['maLTP'] = "Mã loại topping đã tồn tại";
                }
            }
            validateTenLTP($tenltp);
            if(isset($_SESSION['error']) && count($_SESSION['error']) > 0){
                // Lấy lại giá trị trước khi redirect về
                $_SESSION['ltp'] = ['maLTP' => $maltp, 'tenLTP' => $tenltp];
                return $this->redirectTo("LoaiTopping", "Create");
            }
            
            else{
                $save = $this->model("LoaiToppingModel");
                $save->insert($maltp, $tenltp);
                $_SESSION['thongbao'] = "Thêm mới loại topping thành công";
            }
            
        }

        return $this->redirectTo("LoaiTopping", "Index");
    }


    function Save($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maltp = $_POST['maltp'];
            $tenltp = $_POST['tenltp'];
            validateTenLTP($tenltp);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['ltp'] = [
                    'tenLTP' => $tenltp,
                ];
                return $this->redirectTo("LoaiTopping", "Edit", ['id' => $maltp]);
            }else{
                $this->ltpModel->update($maltp, $tenltp);
            }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo("LoaiTopping", "Index");

        }
    }

    function Delete($id)
    {
        $ltp = json_decode($this->ltpModel->getLoaiToppingById($id), true);

        //view edit
        if (count($ltp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaitopping/deleteLTP',
                'ltp' => $ltp[0],
            ]);
        } else
            echo "Không tìm thấy";
    }
    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("LoaiToppingModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa loại topping thành công";
        }
        return $this->redirectTo("LoaiTopping", "Index");
    }
}
