<?php
class QuyenModel extends DataBase {

    public function getQ()
    {
        $qr = "SELECT * FROM quyen";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>