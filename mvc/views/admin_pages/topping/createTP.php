
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

    h3 {
        text-align: center;
    }
</style>

<div class="checkform">
    <div class="content">
        <h3>THÊM MỚI TOPPING</h3>
        <form action="Topping/Store" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="matp" class="control-label col-md-4"><b>Mã topping</b></label>
                    <div class="col-6">
                        <input type="text" class="form-control text-box single-line" id="matp" name="matp" readonly value="<?php echo $data['matp'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tentp" class="control-label col-md-4"><b>Tên topping</b></label>
                    <div class="col-6">
                        <input type="text" class="form-control text-box single-line" id="tentp" name="tentp" value="<?php if (isset($_SESSION['tp']['tenTP'])) echo $_SESSION['tp']['tenTP'];
                                                                                                                    unset($_SESSION['tp']['tenTP']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenTP'])) {
                                                        echo $_SESSION['error']['tenTP'];
                                                        unset($_SESSION['error']['tenTP']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="dongia" class="control-label col-md-4"><b>Giá</b></label>
                    <div class="col-6">
                        <input type="text" class="form-control text-box single-line" id="dongia" name="dongia" value="<?php if (isset($_SESSION['tp']['donGia'])) echo $_SESSION['tp']['donGia'];
                                                                                                                        unset($_SESSION['tp']['donGia']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['donGia'])) {
                                                        echo $_SESSION['error']['donGia'];
                                                        unset($_SESSION['error']['donGia']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="hinh" class="control-label col-md-4"><b>Ảnh topping</b></label>
                    <div class="col-6">
                        <input type="FILE" id="hinh" name="hinh">
                        <br>
                        <span class="text-danger"><?php if (isset($_SESSION['error']['anhTP'])) {
                                                        echo $_SESSION['error']['anhTP'];
                                                        unset($_SESSION['error']['anhTP']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="loaiTP" class="control-label col-md-4"><b>Loại topping</b></label>
                    <div class="col-6">
                        <select name="loaiTP" class="form-control text-box single-line">
                            <?php
                            foreach ($data['listTenLoaiTP'] as $loaiTP) {
                                if ($loaiTP['MaLoaiTP'] == $_SESSION['tp']['ltp']) {
                                    $s = "selected";
                                    unset($_SESSION['tp']['ltp']);
                                } else {
                                    $s = "";
                                }
                                echo '<option ' . $s . ' value="' . $loaiTP['MaLoaiTP'] . '" class = "form-control">' . $loaiTP['TenLoaiTP'] . '</option>';
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
                        <button class="comeback">
                            <a class="" href="Topping/Index">Quay lại</a>
                        </button>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>