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
        <h3 class="text-center">Bạn chắc chắn muốn xóa loại đồ uống này ?</h3>
        <form action="LoaiDoUong/Confirm/<?php echo $data['ldu']['MaLoaiDU'] ?>" method="post">
            <div class="form-horizontal" style="display:flex; justify-content:center">
                <div style=" margin-left: 10px; width: 350px;">
                    <label class="form-control">Mã loại đồ uống: <?php echo $data['ldu']['MaLoaiDU'] ?> </label>
                    <label class="form-control">Tên loại đồ uống: <?php echo $data['ldu']['TenLoaiDU'] ?> </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-6">
                    <input type="submit" value="Xóa" class="btn btn-primary" />
                </div>
                <div class="col-md-offset-2 col-md-6">
                        <button class="comeback">
                            <a class="" href="LoaiDoUong/Index">Quay lại</a>
                        </button>

                    </div>
            </div>
        </form>
    </div>
</div>