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
if (isset($_SESSION['ldu']['tenLDU'])) {
    $tenLDU = $_SESSION['ldu']['tenLDU'];
    unset($_SESSION['ldu']['tenLDU']);
} else {
    $tenLDU = $data['ldu']['TenLoaiDU'];
}
?>

<div class="checkform">
    <div class="content">
        <h3>CẬP NHẬT THÔNG TIN LOẠI ĐỒ UỐNG</h3>
        <form action="LoaiDoUong/Save/<?php echo $data['ldu']['MaLoaiDU'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="maldu" class="control-label col-md-4"><b>Mã loại đồ uống</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="maldu" name="maldu" readonly value="<?php echo $data['ldu']['MaLoaiDU']; ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenldu" class="control-label col-md-4"><b>Tên loại đồ uống</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tenldu" name="tenldu" value="<?php echo $tenLDU; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenLDU'])) {
                                                        echo $_SESSION['error']['tenLDU'];
                                                        unset($_SESSION['error']['tenLDU']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Lưu" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                        <a class="comeback" href="LoaiDoUong/Index">Quay lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>