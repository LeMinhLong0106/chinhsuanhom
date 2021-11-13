<style>
    .checkform {
        display: flex;
        justify-content: center;
        margin-top: 8rem;

    }

    .content {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
        border-radius: 8px;
        /* display: ; */
    }

    .title {
        padding-bottom: 1.5rem;
        text-align: center;
    }

    .form-group {
        display: flex;
        margin-bottom: 0.2rem;
        /* justify-content: center; */
        text-align: center;
        margin-top: 1.5rem;
    }

    .form-group1 {
        display: flex;
        /* justify-content: ; */
        align-items: baseline;
        margin-bottom: 0.2rem;
    }

    h3 {
        text-align: center;
    }

    .comeback {
        border: none;
        outline: none;
        background-color: #eaecf4;
        border-radius: 6px;
        padding: 5px;

    }

    .comeback>a {
        text-decoration: none;
    }
</style>
<?php
if (isset($_SESSION['thongbao'])) {
    echo "<div class='alert alert-success'>";
    echo $_SESSION['thongbao'];
    echo "</div>";
    unset($_SESSION['thongbao']);
}

?>

<table class="" cellpadding="0" cellspacing="0" style="font-size:20px; margin-left: auto; margin-right: auto;">
    <tr>
        <td>
            <table cellpadding="2" cellspacing="10">
                <tr>
                    <td colspan="2" style="text-align: center;"><b>THÔNG TIN CHI TIẾT</b></td>
                </tr>
                <tr>
                    <td rowspan="8"><img src="public/upload/nguoidung/<?php echo $data['nv']['hinhAnh'] ?>" width="300" height="300" /></td>
                    <td>Mã nhân viên:</td>
                    <td><?php echo $data['nv']['maNV'] ?></td>
                </tr>
                <tr>
                    <td>Tên nhân viên:</td>
                    <td><?php echo $data['nv']['tenNV'] ?></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <?php
                        if ($data['nv']['gioiTinh'] == 1)
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
                    <td><?php echo $data['nv']['diaChi'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $data['nv']['email'] ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><?php echo $data['nv']['sdt'] ?></td>
                </tr>
                <tr>
                    <td>Nhóm nhân viên:</td>
                    <td><?php echo $data['nv']['TenNhom'] ?></td>
                </tr>

            </table>
        </td>
    </tr>
</table>

<?php
echo "<div style='text-align: center; margin-top: 20px'>";
echo "<a href='NhanVien/Edit/" . $data['nv']['maNV'] . "'>Cập nhật</a> | ";
echo "<a href='NhanVien/Index'>Quay lại</a>"; //javascript:window.history.back(-1);
echo "</div>";
?>