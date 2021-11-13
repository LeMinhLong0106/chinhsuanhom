<?php
class QuanLyPH extends Controller
{

    public $phModel;

    public function __construct()
    {
        $this->phModel = $this->model("PhanHoiModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYPHANHOI");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function Index()
    {
        $ph = json_decode($this->phModel->listAll(), true);

        //Gọi view
        return $this->view(
            "layoutAdmin",
            [
                "page" => "phanhoi/indexPH",
                "ph" => $ph,
            ]
        );
    }

    //viết phản hồi cho khách
    function Write($id)
    {
        $ph = json_decode($this->phModel->getPhanHoiById($id), true);

        if (count($ph) > 0) {
            //1 chưa xử lý
            if ($ph[0]['tinhTrang'] == 1) {
                //view edit
                return $this->view("layoutAdmin", [
                    'page' => 'phanhoi/writePH',
                    'ph' => $ph[0],
                ]);
            } else if ($ph[0]['tinhTrang'] == 2) {
                $_SESSION['error']['donhang'] = "Phản hồi này đã được xử lý trước đó !";
                return $this->redirectTo("QuanLyPH", "Index");
            }
        } else {
            echo "Ops! Có vẻ bạn thao tác sai rồi";
        }
    }

    function SendMail($id)
    {
        require "PHPMailer/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
        require "PHPMailer/src/SMTP.php"; //nhúng thư viện vào để dùng
        require 'PHPMailer/src/Exception.php'; //nhúng thư viện vào để dùng
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
        // $ph = json_decode($this->phModel->getPhanHoiById($id), true);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tenkh"])) {
                $tenkh = $_POST['tinhttenkhrang'];
            }
            if (isset($_POST["email"])) {
                $email = $_POST['email'];
            }
            if (isset($_POST["noidung"])) {
                $noidung = $_POST['noidung'];
            }

            try {
                $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                $mail->isSMTP();
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $nguoigui = 'trasuahomita@gmail.com';
                $matkhau = 'baobao12c4';
                $tennguoigui = $_SESSION["user"]["tenNV"];
                $mail->Username = $nguoigui; // SMTP username
                $mail->Password = $matkhau;   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($nguoigui, $tennguoigui);
                $to = $email;
                $to_name = $tenkh;

                $mail->addAddress($to, $to_name); //mail và tên người nhận  
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Trả lời phản hồi';
                $noidungthu = $noidung;
                $mail->Body = $noidungthu;
                $mail->smtpConnect(array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                $save = $this->model("PhanHoiModel");
                $save->update($id);
                // echo 'Đã gửi mail xong';
                $_SESSION['thongbao'] = "Đã gửi mail thành công !";
            } catch (Exception $e) {
                // echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                $_SESSION['error']['donhang'] = "Mail không gửi được. Lỗi: " . $mail->ErrorInfo;
            }
        }
        return $this->redirectTo("QuanLyPH", "Index");
    }

    function Delete($id)
    {
        $ph = json_decode($this->phModel->getPhanHoiById($id), true);

        if (count($ph) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'phanhoi/deletePH',
                'ph' => $ph[0]
            ]);
        } else {
            echo "Ops! Có vẻ bạn thao tác sai rồi";
        }
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("PhanHoiModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Đã xóa thành công phản hồi !";
        }
        return $this->redirectTo("QuanLyPH", "Index");
    }
}
