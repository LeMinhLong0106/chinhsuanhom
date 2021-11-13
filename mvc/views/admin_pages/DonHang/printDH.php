<style>
    #parentDiv {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 3rem;
        border-radius: 8px;
    }
</style>
<div id="parentDiv">
    <div style="text-align: center">
        <img src="public/images/logo1.png" width="250" />
        <br />
        63 Tô Hiến Thành, Nha Trang
        <br />
        Delivery: (0258) 3511212
    </div>
    <hr />
    <div style="margin-left: 150px;">
        <div class="row">
            <div class="col-md-6"><b>Số HĐ: </b><?php echo $data['ttkh']['MaHD']; ?> <?php  ?></div>
            <?php $date = str_replace('-', '/', $data['ttkh']['NgayLap']); ?>
            <div class="col-md-6"><b>Ngày mua: </b> <?php echo date('d/m/Y', strtotime($date)); ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><b>Họ tên: </b> <?php echo $data['ttkh']['HoTen'] ?></div>
            <div class="col-md-6"><b>Số điện thoại: </b> <?php echo $data['ttkh']['Sdt'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><b>Địa chỉ: </b> <?php echo $data['ttkh']['DiaChi'] ?></div>
            <div class="col-md-6"><b>Nhân viên giao hàng:</b>
                <?php
                $s = "";
                if ($data['ttkh']['MaNV'] == NULL) {
                    echo $s = "Chưa có";
                } else {
                    foreach ($data['shipper'] as $s) {
                        if ($s['maNV'] == $data['ttkh']['MaNV']) {
                            echo $s['tenNV'];
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <br />
    <h4>Danh sách đồ uống</h4>
    <hr />
    <div>
        <?php
        $tongTien = 0;
        $tongTatCa = 0;
        $tongSL = 0;
        echo '<table class="table table-bordered table-hover customTable">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên đồ uống</th>
                <th>Số lượng</th>
                <th>Kích cỡ</th>
                <th>% Đá</th>
                <th>% Đường</th>
                <th>Topping</th>
                <th>Tiền trà sữa</th>
                <th>Tiền topping</th>
                <th>Thành tiền</th>
                
            </tr>';
        foreach ($data['cthd'] as $key => $item) {
            $tongSL += $item['SoLuong'];
            $tongTienTP = 0;
            $tienTS = 0;
            if ($item['Size'] == "M") {
                $tienTS = $item['DonGia'];
            } else {
                $tienTS = $item['DonGia'] + 5000;
            }


            if (isset($data['cttp']) && count($data['cttp']) > 0) {
                foreach ($data['cttp'] as $tp) {
                    if ($item['MaDU'] == $tp['MaDU']) {
                        $tongTienTP += $tp['DonGia'];
                    }
                }
            }

            $tongTien = $tienTS * $item['SoLuong'] + $tongTienTP * $item['SoLuong'];
            $tongTatCa += $tongTien;

            echo '<tr>
                    <td><img height="100px" width="100px" src="public/upload/douong/' . $item['HinhAnh'] . '" /></td>';
            echo '<td>' . $item['TenDU'] . '</td>';
            echo '<td>' . $item['SoLuong'] . '</td>';
            echo '<td>' . $item['Size'] . '</td>';
            echo '<td>' . $item['PhanTramDa'] . '</td>';
            echo '<td>' . $item['PhanTramDuong'] . '</td>';
            echo '<td>';
            if (isset($data['cttp']) && count($data['cttp']) > 0) {
                foreach ($data['cttp'] as $tp) {
                    if ($item['MaDU'] == $tp['MaDU']) {
                        echo '<span>' . $tp['TenTP'] . '</span><br/>';
                    }
                }
            }
            echo '</td>';
            echo '<td>' . $item["SoLuong"] . ' x ' . $tienTS . '</td>';
            echo '<td>' . $item["SoLuong"] . ' x ' . $tongTienTP . '</td>';
            echo '<td>' . $tongTien . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        // echo '<div style="float:right; font-size: 24px; font-weight:bold; margin-right: 40px">Tổng hóa đơn: '.$tongTatCa.'</div>';
        ?>
    </div>
    <hr />
    <div style="text-align:right;">
        <p>Tổng tiền: <?php echo $tongTatCa ?></p>
    </div>
    <center style="font-weight: bold">Thank you & see you again!!!</center>
</div>
<div style="display: flex; justify-content: space-around;">
    <div style="margin-top: 1.5rem;">
        <a id="printPDF" class="btn btn-primary">In hóa đơn</a>
    </div>
    <div style="margin-top: 1.5rem;">
        <a href="DonHang/Index" class="btn btn-light" style="background-color: #d7d8db;">Trở về</a>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="public/html2pdf.bundle.min.js?v=<?php echo time(); ?>"></script>

<script>
    $("#printPDF").click(function() {
        var element = document.getElementById('parentDiv');
        html2pdf().from(element).set({
            margin: [30, 10, 5, 10],
            pagebreak: {
                avoid: 'tr'
            },
            filename: <?php echo $data['ttkh']['MaHD']; ?> + '.pdf',
            jsPDF: {
                orientation: 'landscape',
                unit: 'pt',
                format: 'letter',
                compressPDF: true
            }
        }).save()
    });
</script>