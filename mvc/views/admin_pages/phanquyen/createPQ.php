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
        <h3>THÊM MỚI PHÂN QUYỀN</h3>
        <?php
        if (isset($_SESSION['error']['pv'])) {
            echo '<div class="alert alert-danger">';
            echo $_SESSION['error']['pv'];
            echo '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <form action="PhanQuyen/Store" method="post">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="idNhom" class="control-label col-md-5"><b>Nhóm nhân viên</b></label>
                    <div class="col-md-7">
                        <select name="idNhom" id="idNhom" class="form-control">

                            <?php
                            foreach ($data['nnv'] as $item) {
                                if ($item['IDNhom'] == $_SESSION['pv']['idNhom']) {
                                    echo "<option value='" . $item['IDNhom'] . "' selected>" . $item['TenNhom'] . "</option>";
                                    unset($_SESSION['pv']['idNhom']);
                                } else {
                                    echo "<option value='" . $item['IDNhom'] . "'>" . $item['TenNhom'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="form-group1">
                    <label for="tenNhom" class="control-label col-md-5"><b>Quyền</b></label>
                    <div class="col-md-7">
                        <select name="idQuyen" id="idQuyen" class="form-control">>
                            <?php
                            foreach ($data['quyen'] as $item) {
                                if ($item['IDQuyen'] == $_SESSION['pv']['idQuyen']) {
                                    echo "<option value='" . $item['IDQuyen'] . "' selected>" . $item['TenQuyen'] . "</option>";
                                    unset($_SESSION['pv']['idQuyen']);
                                } else {
                                    echo "<option value='" . $item['IDQuyen'] . "'>" . $item['TenQuyen'] . "</option>";
                                }
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
                        <a class="comeback" href="phanquyen/index">Quay lại</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>