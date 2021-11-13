<?php
    if(isset($_SESSION['thongbao'])) {
        echo "<div class='alert alert-success'>";
        echo $_SESSION['thongbao'];
        echo "</div>";
        unset($_SESSION['thongbao']);
    }
    
?>

<table cellpadding="0" cellspacing="0" style="font-size:20px;margin-left:50px;">
    <tr>
        <td>
            <table cellpadding="2" cellspacing="10">
                <tr><td colspan="2"><b>THÔNG TIN CHI TIẾT</b></td></tr>
                <tr>
                    <td rowspan="8"><img src="public/upload/nguoidung/<?php echo $data['nv']['hinhAnh']?>" width="300" height="300" /></td>
                    <td>Mã nhân viên:</td>
                    <td><?php echo $data['nv']['maNV']?></td>
                </tr>
                <tr>
                    <td>Tên nhân viên:</td>
                    <td><?php echo $data['nv']['tenNV']?></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <?php 
                            if($data['nv']['gioiTinh'] == 1)
                                echo "Nam";
                            else
                                echo "Nữ";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><?php
                            $date = str_replace('-', '/', $data["nv"]["ngaySinh"]);
                            echo date('d/m/Y', strtotime($date));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><?php echo $data['nv']['diaChi']?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $data['nv']['email']?></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><?php echo $data['nv']['sdt']?></td>
                </tr>
                <tr>
                    <td>Nhóm nhân viên:</td>
                    <td><?php echo $data['nv']['TenNhom']?></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
<p style="margin-left:50px;">
    <a href="canhan/edit">Cập nhật thông tin</a> |
    <a href="homeAdmin/index">Quay lại trang chủ</a>
</p>