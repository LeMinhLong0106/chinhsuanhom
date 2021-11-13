<?php
class Menu extends Controller{

    public $duModel;
    public $lduModel;
    public $tpModel;
    public $ltpModel;

    public function __construct()
    {
        $this->duModel = $this->model("DoUongModel");
        $this->lduModel = $this->model("LoaiDoUongModel");
        $this->tpModel = $this->model("ToppingModel");
        $this->ltpModel = $this->model("LoaiToppingModel");
    }

    public function Index(){
        $listLDU = json_decode($this->lduModel->listAll(), true);
        $listDU = json_decode($this->duModel->listAll(), true);
        $listTP = json_decode($this->tpModel->listAll(), true);
        $this->view("layoutCustomer", [
            'page' => 'indexMenu',
            'listLDU' => $listLDU,
            'listDU' => $listDU,
            'listTP' => $listTP
        ]);
    }

    public function Details($id){
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTP = json_decode($this->tpModel->listAll(), true);
        if(count($du) > 0) {
            $this->view("layoutCustomer", [
                'page' => 'detailsMenu',
                'du' => $du[0],
                'listTP' => $listTP,
            ]);
        }
        else
            echo "Không tìm thấy";
        
    }

    public function AddToCart() {
        if(isset($_POST['submitBtn'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $DU = json_decode($this->duModel->getDoUongById($_POST['MaDU']), true);

            //kiểm tra kh có chọn topping hay ko
            $len = isset($_POST['listTP']) ? count($_POST['listTP']) : 0;

            if (!isset($_SESSION['cart']))
            {
                //nếu ko tồn tại giỏ hàng thì tạo gh mới
                $_SESSION['cart'] = [];
            }
            //gán 1 sesion mới
            $listItemInCart = $_SESSION['cart'];

            if(count($listItemInCart) > 0) {
                //kt trong giỏ hàng có tồn tại hay ko

                foreach ($listItemInCart as $item)
                {
                    if ($item['doUong']['MaDU'] == $_POST['MaDU'] && 
                    $item['size'] == $_POST['size'] && 
                    $item['da'] == $_POST['ice'] && 
                    $item['duong'] == $_POST['sugar'] && 
                    count($item['listTP']) == $len)
                    {
                        $flag = false;//mặc định là đã có hàng trong giỏ
                        if (isset($_POST['listTP']))
                        {
                            $temp = [];
                            foreach ($item['listTP'] as $tp) {
                                array_push($temp, $tp['MaTP']);
                            }
                            for ($count = 0; $count < count($_POST['listTP']); $count++)
                            {
                                if (in_array($_POST['listTP'][$count], $temp))//có topping
                                {
                                    continue;
                                }
                                else
                                {
                                    $flag = true;//topping khác những lần trước
                                    break;//đưa vào giỏ hàng
                                }
                            }
                        }
                        if ($flag == false)
                        {
                            $_SESSION['error']['menu'] = "Đã tồn tại tùy chọn này trong giỏ hàng, bạn có thể vào giỏ hàng để thay đổi số lượng.";
                            return $this->redirectTo("Menu", "Details", ["id" => $_POST['MaDU']]);
                        }
                    }
                }
            }
            //giỏ hàng đnag trống thì cho id đồ uống đàu tiên là 1
            if(count($_SESSION['cart']) == 0) {
                $id = 1;
            }
            else {
                //end() lấy phần từ cuối cùng để xét các câu lệnh khác (xóa sp)
                $endItem = end($_SESSION['cart']);
                $id = $endItem['id'] + 1;
            }

            $doUong = $DU[0];
            $size = $_POST['size'];
            $soluong = $_POST['quantity'];
            $thoigianthem = date("Y-m-d H:i:s");
            $da = $_POST['ice'];
            $duong = $_POST['sugar'];
            $listToppings = []; 

            //kt danh sách toping
            if (isset($_POST['listTP']) && count($_POST['listTP']) > 0)
            {
                foreach ($_POST['listTP'] as $maTP)
                {
                    $TP = json_decode($this->tpModel->getToppingById($maTP), true);
                    array_push($listToppings, $TP[0]);
                }
            }

            $picked_item = [
                'id' => $id,
                'doUong' => $doUong,
                'size' => $size,
                'soluong' => $soluong,
                'thoigianthem' => $thoigianthem,
                'da' => $da,
                'duong' => $duong,
                'listTP' => $listToppings
            ];
            
            array_push($listItemInCart, $picked_item);
            $_SESSION['cart'] = $listItemInCart;

            $this->redirectTo("Menu", "Index");
        }
    }
}
?>