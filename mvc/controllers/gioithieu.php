<?php
class GioiThieu extends Controller{
    
    function Index(){
    
        //Gọi view
        $this->view("layoutCustomer",
        [
            "page"=>"indexGioithieu"
        ]
        );
    }
}
?>