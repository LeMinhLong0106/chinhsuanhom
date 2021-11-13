<?php
class Home extends Controller{

    function Index(){

        // Gọi model
        $sp = $this->model("SanPhamModels");
        // echo $sp->GetSP();

        //Gọi view
        $this->view("layoutCustomer", 
        [
            "page"=>"indexHome",
            "SPn"=>$sp->SanPham_New(),
            "SPh"=>$sp->SanPham_Hot()
        ]
        );
    }

}
?>