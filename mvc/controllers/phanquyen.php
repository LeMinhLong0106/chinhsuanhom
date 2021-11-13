<?php
class PhanQuyen extends Controller{

    public $nnvModel;
    public $quyenModel;
    public $dsquyenModel;
    public function __construct()
    {
        $this->nnvModel = $this->model("NhomNhanVienModel");
        $this->dsquyenModel = $this->model("DanhSachQuyenModel");
        $this->quyenModel = $this->model('QuyenModel');
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
        else {
            $pq = new HasCredentials("PHANQUYEN");
            if(!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function Index(){
        $listDSQ = json_decode($this->dsquyenModel->getDSQ(), true);
        $this->view("layoutAdmin",
        [
            "page"=>"phanquyen/indexPQ",
            'listDSQ' => $listDSQ
        ]
    );
    }

    function Create()
    {
        $listNNV = json_decode($this->nnvModel->getNNV(), true);
        $listQ = json_decode($this->quyenModel->getQ(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "phanquyen/createPQ",
                "nnv" => $listNNV,
                "quyen" => $listQ
            ]
        );
    }

    function Store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idNhom = $_POST['idNhom'];
            $idQuyen = $_POST['idQuyen'];
            $result = $this->dsquyenModel->checkPK($idNhom, $idQuyen);
            if(mysqli_num_rows($result) > 0) {
                $_SESSION['error']['pv'] = "Phân quyền này đã tồn tại";
                $_SESSION['pv'] = ['idNhom' => $idNhom, 'idQuyen' => $idQuyen];
                return $this->redirectTo('PhanQuyen', 'Create');
            }

            $this->dsquyenModel->insert($idNhom, $idQuyen);
            $_SESSION['thongbao'] = "Thêm mới thành công";
        }
        return $this->redirectTo("PhanQuyen", "Index");
    }


    function Delete($idNhom, $idQuyen)
    {
        $pq = json_decode($this->dsquyenModel->getPhanQuyenById($idNhom, $idQuyen), true);

        //view edit
        if (count($pq) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'phanquyen/deletePQ',
                'pq' => $pq[0],
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($idNhom, $idQuyen)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->dsquyenModel->delete($idNhom, $idQuyen);
        }
        $_SESSION['thongbao'] = "Xóa thành công";
        return $this->redirectTo("PhanQuyen", "Index");
    }

    

}
?>