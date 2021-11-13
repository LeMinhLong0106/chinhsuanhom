<?php 
class HasCredentials {
    private $idQuyen;
    public function __construct($idQuyen)
    {
        $this->idQuyen = $idQuyen;
    }
    
    //xác thực quyền truy cập của nhân viên
    public function hasCredentials() {
        $idNhom = $_SESSION['user']['IDNhom'];
        // Nếu là admin thì không cần xét quyền nữa
        if($_SESSION['user']['IDNhom'] == 'ADMIN') return true;

        $qr = "SELECT IDQuyen FROM danhsachquyen WHERE IDNhom = '$idNhom'";

        $db = new Database();
        $rows = mysqli_query($db->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows, MYSQLI_NUM)) {
            $arr[] = $row;
        }
        $flat = false;
        foreach($arr as $q) {
            if($q[0] == $this->idQuyen) {
                $flat = true;
                break;
            }
        }
        return $flat;
    }
}
?>