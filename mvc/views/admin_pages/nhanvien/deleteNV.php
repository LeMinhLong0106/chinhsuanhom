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
        <h3 class="text-center" style="color:red;">Bạn chắc chắn muốn xóa nhân viên này ?</h3>
        <form action="NhanVien/Confirm/<?php echo $data['nv']['maNV'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal" style="display:flex; justify-content:center">
                <?php
                echo '<img style="width: 270px ;height: 315px; display: flex;" src="public/upload/nguoidung/' . $data['nv']['hinhAnh'] . '" />';
                ?>
                <div style=" margin-left: 10px; width: 350px;">
                    <label class="form-control">Mã nhân viên: <?php echo $data['nv']['maNV'] ?> </label>
                    <label class="form-control">Tên nhân viên: <?php echo $data['nv']['tenNV'] ?> </label>

                    <label class="form-control">Giới tính: <td><?php if ($data['nv']['gioiTinh']  == 1)
                                                                    echo "Nam";
                                                                else
                                                                    echo "Nữ";
                                                                ?></td>
                    </label>
                    <label class="form-control">Ngày sinh:
                        <?php
                        $date = str_replace('-', '/', $data['nv']["ngaySinh"]);
                        echo date('d/m/Y', strtotime($date));
                        ?>
                    </label>
                    <label class="form-control">Địa chỉ: <?php echo $data['nv']['diaChi'] ?> </label>
                    <label class="form-control">Số điện thoại: <?php echo $data['nv']['sdt'] ?> </label>
                    <label class="form-control" for="">Nhóm nhân viên: <?php
                                                                        foreach ($data['listTenNhomNV'] as $nhomNV) {
                                                                            if ($data['nv']["IDNhom"] == $nhomNV['IDNhom']) {
                                                                                echo $nhomNV['TenNhom'];
                                                                            }
                                                                        }
                                                                        ?></label>
                </div>
            </div>
            <div class="form-group" style="align-items: baseline;">
                <div class="col-md-offset-2 col-md-6">
                    <input type="submit" value="Xóa" class="btn btn-primary" />

                </div>
                <div class="col-md-offset-2 col-md-6">
                    <button class="comeback">
                        <a href="NhanVien/Index">Quay lại</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>