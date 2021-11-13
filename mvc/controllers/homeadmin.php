<?php
class HomeAdmin extends Controller{

    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }

    function Index(){
        $this->view("layoutAdmin",[
            "page"=>"index",
        ]);
    }
}
?>