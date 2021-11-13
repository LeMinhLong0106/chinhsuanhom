<?php
class App {
    // xử lý URL (chia thành các controller, action, param)
    protected $controller = "Home";
    protected $action = "Index";
    protected $params = [];
    
    function __construct(){
        
        $arr = $this->UrlProcess();
        
        // Xử lý controller
        if(isset($arr[0])){
            if(file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "./mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;

        // Xử lý action
        if(isset($arr[1])){ // isset kiểm tra phần tử có tồn tại trong mảng ko
            if(method_exists($this->controller, $arr[1])){ // method_exists kiểm tra hàm có tồn tại trong class hay không
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Xử lý params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function UrlProcess(){
        if(isset($_GET["url"])){
            // explode cắt theo dấu "/"
            // trim loại bỏ khoảng trắng, filter_var đảm bảo track theo dấu /
            return explode("/", filter_var(trim($_GET["url"], "/")));            
        }
    }
}
?>
