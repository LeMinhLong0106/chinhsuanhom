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
<div class="checkform">
    <div class="content">
        <h3>THÊM MỚI NHÂN VIÊN</h3>
        <form action="NhanVien/Store" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="manv" class="control-label col-md-4"><b>Mã nhân viên</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="manv" name="manv" readonly value="<?php echo $data['manv'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tennv" class="control-label col-md-4"><b>Tên nhân viên</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tennv" name="tennv" value="<?php if (isset($_SESSION['nv']['tenNV'])) echo $_SESSION['nv']['tenNV'];
                                                                                                                    unset($_SESSION['nv']['tenNV']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenNV'])) {
                                                        echo $_SESSION['error']['tenNV'];
                                                        unset($_SESSION['error']['tenNV']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label style="margin-left: 10px;padding-top:10px;" for="gioitinh" class="control-label col-md-4"><b>Giới tính</b></label>
                    <div class="col-md-8">
                        <input style="margin-left: 15px;" type="radio" name="gioitinh" value="1" <?php if (!isset($_SESSION['nv']['gioiTinh']) || (isset($_SESSION['nv']['gioiTinh']) && $_SESSION['nv']['gioiTinh'] == '1')) echo "checked"; ?>> Nam
                        <input style="margin-left: 10px;" type="radio" name="gioitinh" value="0" <?php if (isset($_SESSION['nv']['gioiTinh']) && $_SESSION['nv']['gioiTinh'] == '0') echo "checked";
                                                                                                    unset($_SESSION['nv']['gioiTinh']); ?>> Nữ
                    </div>
                </div>

                <div class="form-group1">
                    <label for="ngaysinh" class="control-label col-md-4"><b>Ngày sinh</b></label>
                    <div class="col-md-8">
                        <input type="date" class="form-control text-box single-line" id="ngaysinh" name="ngaysinh" value="<?php if (isset($_SESSION['nv']['ngaySinh'])) echo $_SESSION['nv']['ngaySinh'];
                                                                                                                            unset($_SESSION['nv']['ngaySinh']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['ngaySinh'])) {
                                                        echo $_SESSION['error']['ngaySinh'];
                                                        unset($_SESSION['error']['ngaySinh']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="diachi" class="control-label col-md-4"><b>Địa chỉ</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="diachi" name="diachi" value="<?php if (isset($_SESSION['nv']['diaChi'])) echo $_SESSION['nv']['diaChi'];
                                                                                                                        unset($_SESSION['nv']['diaChi']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['diaChi'])) {
                                                        echo $_SESSION['error']['diaChi'];
                                                        unset($_SESSION['error']['diaChi']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="email" class="control-label col-md-4"><b>Email</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="email" name="email" value="<?php if (isset($_SESSION['nv']['email'])) echo $_SESSION['nv']['email'];
                                                                                                                    unset($_SESSION['nv']['email']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['email'])) {
                                                        echo $_SESSION['error']['email'];
                                                        unset($_SESSION['error']['email']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="password" class="control-label col-md-4"><b>Mật khẩu</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="password" name="password" value="<?php if (isset($_SESSION['nv']['matKhau'])) echo $_SESSION['nv']['matKhau'];
                                                                                                                            unset($_SESSION['nv']['matKhau']); ?>">
                        <i style="font-size: small;">(*)Mật khẩu phải chứa ít nhất 8 ký tự, ít nhất 1 số, ít nhất 1 chữ cái viết hoa và ít nhất 1 chữ cái thường</i>
                        <br>
                        <span class="text-danger"><?php if (isset($_SESSION['error']['matKhau'])) {
                                                        echo $_SESSION['error']['matKhau'];
                                                        unset($_SESSION['error']['matKhau']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="sdt" class="control-label col-md-4"><b>Số điện thoại</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="sdt" name="sdt" value="<?php if (isset($_SESSION['nv']['soDienThoai'])) echo $_SESSION['nv']['soDienThoai'];
                                                                                                                unset($_SESSION['nv']['soDienThoai']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['soDienThoai'])) {
                                                        echo $_SESSION['error']['soDienThoai'];
                                                        unset($_SESSION['error']['soDienThoai']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="hinhanh" class="control-label col-md-4"><b>Ảnh nhân viên</b></label>
                    <div class="col-md-8">
                        <input type="FILE" id="hinhanh" name="hinhanh">
                        <br>
                        <span class="text-danger"><?php if (isset($_SESSION['error']['anhNV'])) {
                                                        echo $_SESSION['error']['anhNV'];
                                                        unset($_SESSION['error']['anhNV']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="nhomNV" class="control-label col-md-4"><b>Nhóm nhân viên</b></label>
                    <div class="col-md-8">
                        <select name="nhomNV" class="form-control text-box single-line">
                            <?php
                            foreach ($data['listTenNhomNV'] as $nhomNV) {
                                if ($nhomNV['IDNhom'] == $_SESSION['nv']['nnv']) {
                                    $s = "selected";
                                    unset($_SESSION['nv']['nnv']);
                                } else {
                                    $s = "";
                                }
                                echo '<option ' . $s . ' value="' . $nhomNV['IDNhom'] . '" class = "form-control">' . $nhomNV['TenNhom'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                        <a class="comeback" href="nhanvien/index">Quay lại</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
