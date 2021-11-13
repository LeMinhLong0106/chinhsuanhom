<?php
class PhanHoi extends Controller{
    
    function Index(){
        //Gọi view
        return $this->view("layoutCustomer",
        [
            "page"=>"indexPhanhoi",
        ]);
    }

    function GuiPhanHoi($hoTen = "", $sdt = "", $email = "", $noiDung = ""){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["hoTen"])) { 
                $hoTen = $_POST['hoTen']; 
            }
            if(isset($_POST["sdt"])) { 
                $sdt = $_POST['sdt']; 
            }
            if(isset($_POST["email"])) { 
                $email = $_POST['email']; 
            }
            if(isset($_POST["noiDung"])) { 
                $noiDung = $_POST['noiDung']; 
            }
        
            $sent = $this->model("PhanHoiModel");
            $sent->SentPhanHoi($hoTen, $sdt, $email, $noiDung);   
            
        }
        return $this->redirectTo("PhanHoi", "Thankyou");
    }

    function ThankYou() {

        return $this->view("layoutCustomer",
        [
            "page"=>"indexThankyou"
        ]);
    }
}
?>