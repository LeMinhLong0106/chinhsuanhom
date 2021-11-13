<?php 
require_once './mvc/common/validate.php';
    class login extends controller{

        public $loginmodel;
        public function __construct()
        {
            $this->loginmodel = $this->model("loginmodel");

        }
        
        // function redirect($url) {
        //     header("location: " . $url);
        // }

        public function index(){
            $this->view("login", [

            ]);
        }

        public function login(){
            $result_mess = false;
            if(isset($_POST["submit"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password_input = $_POST["password"];
                // email và password để trống thì in ra lỗi
                validateUser($email);
                validatePassword($password);
                
                if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                    $_SESSION['login'] = ['Email' => $email];
                    return $this->redirectTo("Login", "Index");
                }
                else{
                // mớ này email đúng mk đúng thì vào trang HomeAdmin index
                // email đúng mk sai thì in ra lỗi
                $result = $this->loginmodel->login($email);
                if(mysqli_num_rows($result) > 0){
                    if(mysqli_num_rows($result)){
                        while($row = mysqli_fetch_array($result)){
                            $maNV = $row["maNV"];
                            $tenNV = $row["tenNV"];
                            $email = $row["email"];
                            $password = $row["password"];
                            $hinhanh = $row["hinhAnh"];
                            $IDNhom = $row["IDNhom"];
                        }
                        if((md5($password_input) == $password)){
                            $_SESSION["user"]= [
                                "maNV" => $maNV,
                                "tenNV" => $tenNV,
                                "hinhAnh" => $hinhanh,
                                "IDNhom" => $IDNhom
                            ];
                            $this->redirectTo('HomeAdmin', 'Index');
                        }
                        else{
                            $this->view("login",
                            [
                                "result"=>$result_mess,
                            ]);
                        }
                    } 
                }
                else{
                    $this->view("login",
                    [
                        "result"=>$result_mess,
                    ]);
                }
                }
            }
        }
        
        public function logout(){
            unset($_SESSION["user"]);
            session_destroy();
            $this->view("login",
            [
            ]);
        }
    }
?>  