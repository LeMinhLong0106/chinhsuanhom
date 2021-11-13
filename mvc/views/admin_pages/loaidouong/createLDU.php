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
        <h3>THÊM MỚI LOẠI ĐỒ UỐNG</h3>

        <form action="LoaiDoUong/Store" method="post">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="maldu" class="control-label col-md-5"><b>Mã loại đồ uống</b></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control text-box single-line" id="maldu" name="maldu" value="<?php if (isset($_SESSION['ldu']['maLDU'])) echo $_SESSION['ldu']['maLDU'];
                                                                                                                    unset($_SESSION['ldu']['maLDU']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['maLDU'])) {
                                                        echo $_SESSION['error']['maLDU'];
                                                        unset($_SESSION['error']['maLDU']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenldu" class="control-label col-md-5"><b>Tên loại đồ uống</b></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control text-box single-line" id="tenldu" name="tenldu" value="<?php if (isset($_SESSION['ldu']['tenLDU'])) echo $_SESSION['ldu']['tenLDU'];
                                                                                                                        unset($_SESSION['ldu']['tenLDU']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenLDU'])) {
                                                        echo $_SESSION['error']['tenLDU'];
                                                        unset($_SESSION['error']['tenLDU']); // tạm tạm rồi, làm vài phát nữa :v, làm
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                        <button class="comeback">
                            <a class="" href="LoaiDoUong/Index">Quay lại</a>
                        </button>

                    </div>
                </div>


            </div>
        </form>
    </div>
</div>