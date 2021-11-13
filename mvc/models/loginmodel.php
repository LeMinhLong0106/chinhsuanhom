<?php
    class loginmodel extends DataBase{
        // public function checkLogin($email, $password){ // trả về true nếu tìm thấy, ngược lại
        //     // connect database
        //     // Query tìm xem có username, password trong bảng k
        //     // kiểm tra số bản ghi lớn hơn 0 => true;
        //     // ngược lại false;
        //     $qr = "SELECT * FROM nhanvien WHERE email = '$email' AND password = '$password'";
        //     $rows = mysqli_query($this->con, $qr);
        //     $arr = array(); 
        //     while($row = mysqli_fetch_array($rows)) {
        //         $arr[] = $row;
        //     }
        //     return json_encode($arr); //qua kia kiểm tra, neesucount*(manger) > 0 thì cho qua view home rồi gán session bnawngf phần tử đầu mảng này
        // }
        public function login($email){
            $sql = "SELECT * FROM nhanvien WHERE email='$email'";
            return mysqli_query($this->con,$sql);
        }
    }
?>