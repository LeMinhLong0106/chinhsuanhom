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
        <h3>THÊM MỚI LOẠI TOPPING</h3>

        <form action="LoaiTopping/Store" method="post">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="maltp" class="control-label col-md-4"><b>Mã loại topping</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="maltp" name="maltp" value="<?php if (isset($_SESSION['ltp']['maLTP'])) echo $_SESSION['ltp']['maLTP'];
                                                                                                                    unset($_SESSION['ltp']['maLTP']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['maLTP'])) {
                                                        echo $_SESSION['error']['maLTP'];
                                                        unset($_SESSION['error']['maLTP']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenltp" class="control-label col-md-4"><b>Tên loại topping</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tenltp" name="tenltp" value="<?php if (isset($_SESSION['ltp']['tenLTP'])) echo $_SESSION['ltp']['tenLTP'];
                                                                                                                        unset($_SESSION['ltp']['tenLTP']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenLTP'])) {
                                                        echo $_SESSION['error']['tenLTP'];
                                                        unset($_SESSION['error']['tenLTP']); // tạm tạm rồi, làm vài phát nữa :v, làm
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                        <button class="comeback">
                            <a class="" href="LoaiTopping/Index">Quay lại</a>
                        </button>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>