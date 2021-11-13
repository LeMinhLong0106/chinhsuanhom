<?php
require_once './mvc/common/validate.php';
class LoaiDoUong extends Controller
{
    public $lduModel;

    public function __construct()
    {
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


    function Index()
    {
        $listLDU = json_decode($this->lduModel->listAll(), true);
        // trả về list đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaidouong/indexLDU",
                'listLDU' => $listLDU
            ]
        );
    }

    function Create()
    {
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaidouong/createLDU"
            ]
        );
    }

    function Edit($id)
    {
        $ldu = json_decode($this->lduModel->getLoaiDoUongById($id), true);
        //view edit
        if (count($ldu) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaidouong/editLDU',
                'ldu' => $ldu[0],
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        // thêm thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["maldu"])) {
                $maldu = $_POST['maldu'];
            }
            if (isset($_POST["tenldu"])) {
                $tenldu = $_POST['tenldu'];
            }
            validateMaLDU($maldu);
            if (!isset($_SESSION['error']['maLDU'])) {
                $result = $this->lduModel->checkPK($maldu);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error']['maLDU'] = "Mã loại đồ uống đã tồn tại";
                }
            }
            validateTenLDU($tenldu);
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                // Lấy lại giá trị trước khi redirect về
                $_SESSION['ldu'] = ['maLDU' => $maldu, 'tenLDU' => $tenldu];
                return $this->redirectTo("LoaiDoUong", "Create");
            } else {
                $save = $this->model("LoaiDoUongModel");
                $save->insert($maldu, $tenldu);
                $_SESSION['thongbao'] = "Thêm mới loại đồ uống thành công";
            }
        }

        return $this->redirectTo("LoaiDoUong", "Index");
    }

    function Save()
    {
        //sửa thành công, lưu
        //return redirectTo("DoUong", "Index")
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maldu = $_POST['maldu'];
            $tenldu = $_POST['tenldu'];
            validateTenLDU($tenldu);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['ldu'] = [
                    'tenLDU' => $tenldu,
                ];
                return $this->redirectTo("LoaiDoUong", "Edit", ['id' => $maldu]);
            } else {
                $this->lduModel->update($maldu, $tenldu);
            }

            // if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
            $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            return $this->redirectTo("LoaiDoUong", "Index");
            // }
        }
    }



    function Delete($id)
    {
        $ldu = json_decode($this->lduModel->getLoaiDoUongById($id), true);

        //view edit
        if (count($ldu) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaidouong/deleteLDU',
                'ldu' => $ldu[0],
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("LoaiDoUongModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa loại đồ uống thành công";
        }
        return $this->redirectTo("LoaiDoUong", "Index");
    }
}
