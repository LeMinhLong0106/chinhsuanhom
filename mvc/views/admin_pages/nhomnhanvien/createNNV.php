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
        <h3>THÊM MỚI NHÓM NHÂN VIÊN</h3>

        <form action="NhomNhanVien/Store" method="post">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="idNhom" class="control-label col-md-4"><b>Mã nhóm</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="idNhom" name="idNhom" value="<?php if (isset($_SESSION['nnv']['maNNV'])) echo $_SESSION['nnv']['maNNV'];
                                                                                                                        unset($_SESSION['nnv']['maNNV']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['maNNV'])) {
                                                        echo $_SESSION['error']['maNNV'];
                                                        unset($_SESSION['error']['maNNV']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenNhom" class="control-label col-md-4"><b>Tên nhóm</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tenNhom" name="tenNhom" value="<?php if (isset($_SESSION['nnv']['tenNNV'])) echo $_SESSION['nnv']['tenNNV'];
                                                                                                                        unset($_SESSION['nnv']['tenNNV']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenNNV'])) {
                                                        echo $_SESSION['error']['tenNNV'];
                                                        unset($_SESSION['error']['tenNNV']); // tạm tạm rồi, làm vài phát nữa :v, làm
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                        <a class="comeback" href="javascript:window.history.back(-1);">Quay lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>