<style>
    input#ngaySinh {
        background-color: white;
    }

    input,
    checkbox,
    select {
        margin-bottom: 10px;
    }

    label {
        font-weight: bolder;
    }

    .checkform {
        display: flex;
        justify-content: center;
        margin-top: 6rem;
        
    }
    .content{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
        border-radius: 8px;
    }
    .title {
        padding-bottom: 1.5rem;
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

    .shipper {
        border: none;
        outline: none;
        background-color: #eaecf4;
        border-radius: 6px;
        padding: 5px;
    }

    .comeback{
        border: none;
        outline: none;
        background-color: #eaecf4;
        border-radius: 6px;
        padding: 5px;
        
    }

    .comeback > a{
        text-decoration: none;
    }
</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        var fileupload = $("#Avatar");
        var image = $("#FileUpload");
        image.click(function() {
            fileupload.click();
        });
        fileupload.change(function() {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            document.getElementById("hinhAnh").value = fileName;
        });
    });
</script>
<?php
$date = str_replace('-', '/', $data['donhang']['NgayLap']);
?>
<div class="checkform">
    <div class="content">
        <h3 class="title">BẠN CÓ CHẮC MUỐN XÓA ĐƠN NÀY?</h3>

        <form action="DonHang/Confirm/<?php echo $data['donhang']['MaHD'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
                <div class="form-group1">
                    <label for="" class="control-label col-md-4">Họ tên: </label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" value="<?php echo $data['donhang']['HoTen'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="" class="control-label col-md-4">Số điện thoại: </label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" value="<?php echo $data['donhang']['Sdt'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="" class="control-label col-md-4">Địa chỉ: </label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" value="<?php echo $data['donhang']['DiaChi'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="" class="control-label col-md-4">Tổng thanh toán: </label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" value="<?php echo $data['donhang']['TongTien'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="" class="control-label col-md-4">Ngày mua: </label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" value="<?php echo date('d/m/Y', strtotime($date)) ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="" class="control-label col-md-4">Tình trạng: </label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" value="
                        <?php 
                        $tt = ($data['donhang']['TinhTrang'] == 0) ? 'Đơn hủy' : (($data['donhang']['TinhTrang'] == 1) ? 'Đơn chưa kiểm' : 'Đã giao');
                        echo $tt;
                        ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="" class="control-label col-md-4">Người giao hàng: </label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" value="<?php 
                        $s = "";
                        if($data['donhang']['MaNV'] == NULL){
                            echo $s = "Chưa có";
                        }
                        else {
                            foreach($data['shipper'] as $s){
                                if($s['maNV'] == $data['donhang']['MaNV']){
                                    echo $s['tenNV'];
                                }                          
                            }
                        }          
                        ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                        <input type="submit" value="Xóa" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                        <button class="comeback">
                            <a href="DonHang/Index">Quay lại</a>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            dateFormat: "mm/dd/yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "-60:+0"
        });

    });
</script>