<style>
    #table-id {
        margin-top: 25px;
        font-size: 1rem;
    }

    #table-id th,
    #table-id td {
        text-align: center;
    }

    .row_head,
    .row_body {
        vertical-align: middle !important;
    }

    #table-id tr:nth-child(even) {
        background-color: aqua;
    }

    .pagination-container {
        margin-top: 40px;
    }

    .pagination li:hover {
        cursor: pointer;
    }

    .pagination {
        display: inline-block;
    }

    .pagination li.active {
        background-color: darkseagreen;
        color: white;
        border-radius: 5px;
    }

    .pagination li {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination li:hover:not(.active) {
        background-color: #ddd;
        border-radius: 5px;
    }

    #searchInput {
        /* position: absolute; */
        /* right: 0; */
        line-height: 2.1rem;
        border-radius: 4px;
        outline: none;
        border: 0.1px solid #7877775c;
        margin: 10px;
    }

    .group_head {
        width: 100%;
        display: flex;
        margin-top: 30px;
        position: relative;
    }

    .lable_dong {
        line-height: 2.4rem;
        font-weight: 800;
        margin-right: 1.5rem;
    }

    h3 {
        text-align: center;
        padding-top: 10px;
        padding-bottom: 40px;
    }
</style>

<section>
    <h3>DANH SÁCH ĐƠN ĐẶT HÀNG TRỰC TUYẾN</h3>

    <form action="DonHang/Index" method="POST">
        <table style="margin: auto; width:444px;">
            <tr>
                <td><b>Tên khách hàng: </b></td>
                <td><input type="text" id="hoten" name="hoten" class="form-control" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>"></td>
            </tr>
            
            <tr>
                <td><b>Tình trạng: </b></td>
                <td>
                    <input type="radio" name="tinhtrang" value="0" <?php if (isset($_POST['tinhtrang']) && $_POST['tinhtrang'] == 0) echo "checked"; ?>> Đơn hủy
                    <input style="margin-left: 10px;" type="radio" name="tinhtrang" value="1" <?php if (isset($_POST['tinhtrang']) && $_POST['tinhtrang'] == 1) echo "checked"; ?>> Đơn chờ kiểm
                    <input style="margin-left: 10px;" type="radio" name="tinhtrang" value="2" <?php if (isset($_POST['tinhtrang']) && $_POST['tinhtrang'] == 2) echo "checked"; ?>> Đã giao
                </td>
            </tr>
            <tr>
                <td><b>Shipper: </b></td>
                <td><select name="shipper" class="form-control text-box single-line">
                        <option value="">-------------- Chọn tất cả -------------</option>
                        <?php
                        foreach ($data['listshipper'] as $shipper) {
                            if (isset($_POST['shipper']) && $shipper['maNV'] == $_POST['shipper']) {
                                $s = "selected";
                            } else {
                                $s = "";
                            }
                            echo '<option ' . $s . ' value="' . $shipper['maNV'] . '" class = "form-control">
                                    ' . $shipper['tenNV'] . '
                                </option>';
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-left: 91px;padding-top: 10px;">
                    <input type="submit" value="Tìm kiếm" class="btn btn-primary" name="searchBtn" />
                    <a href="DonHang/Index" class="btn btn-primary">Làm mới</a>
                </td>
            </tr>
        </table>
    </form>

    <div class="form-group group_head">
        <div>
            <span class="lable_dong">Số dòng hiển thị: </span>
        </div>
        <div style="width: 12%;">
            <select class="form-control" name="state" id="maxRows">
                <option value="5000">Hiện tất cả</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
        </div>
    </div>
    <?php
    if (isset($_SESSION['thongbao'])) {
        echo "<div class='alert alert-success'>";
        echo $_SESSION['thongbao'];
        echo "</div>";
        unset($_SESSION['thongbao']);
    }
    if (isset($_SESSION['error']['donhang'])) {
        echo "<div class='alert alert-danger'>";
        echo $_SESSION['error']['donhang'];
        echo "</div>";
        unset($_SESSION['error']['donhang']);
    }
    ?>
    <table class="table table-striped table-class" id="table-id">

        <tr>
            <th class="row_head">STT</th>
            <th class="row_head">Họ tên</th>
            <th class="row_head">Tổng tiền</th>
            <th class="row_head">Ngày mua</th>
            <th class="row_head">Tình trạng</th>
            <th class="row_head">Shipper</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $stt = 1;
        foreach ($data['listHD'] as $item) {
            $date = str_replace('-', '/', $item["NgayLap"]);
            echo "
            <tr>
                <td class='row_body'>" . ($stt++) . "</td>
                <td class='row_body'>" . $item['HoTen'] . "</td>
                <td class='row_body'>" . $item['TongTien'] . "</td>
                <td class='row_body'>" . date('d/m/Y', strtotime($date)) . "</td>";
            if ($item['TinhTrang'] == 0) {
                echo "<td class='row_body'>Đơn hủy</td>";
            } else if ($item['TinhTrang'] == 1) {
                echo "<td class='row_body'>Đơn chờ kiểm</td>";
            } else if ($item['TinhTrang'] == 2) {
                echo "<td class='row_body'>Đã giao hàng</td>";
            }

            if ($item['MaNV'] == null) {
                echo "<td class='row_body'>Chưa có</td>";
            } else {
                foreach ($data['NV'] as $nv) {
                    if ($nv['maNV'] == $item['MaNV']) {
                        echo "<td class='row_body'>" . $nv['tenNV'] . "</td>";
                    }
                }
            }


            echo "
                <td class='row_body'>
                    <a href='DonHang/Check/" . $item["MaHD"] . "'><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                    <a href='DonHang/Details/" . $item["MaHD"] . "'><i class='fa fa-info-circle'></i></a>&nbsp;|&nbsp;
                    <a href='DonHang/Delete/" . $item["MaHD"] . "'><i class='fa fa-trash'></i></a>&nbsp;|&nbsp;
                    <a href='DonHang/Print/" . $item["MaHD"] . "'><i class='fa fa-print'></i></a>
                </td>
            </tr>
            ";
        }

        ?>
        <tr>
            <?php
            $tb = "";
            if (count($data['listHD']) == 0) {
                echo '<td colspan="9" style="text-align: center; color: red;font-weight: bold;">Không tìm thấy đơn hàng liên quan </td>';
            }
            ?>

        </tr>
    </table>
    <!-- Start Pagination -->
    <?php
    if (count($data['listHD']) > 5) {
        echo '
        <div class="pagination-container">
            <nav style="text-align: center;">
                <ul class="pagination">
                    <li data-page="prev" class="page-item">
                        <span>
                            &laquo; <span class="sr-only">(current)
                            </span></span>
                    </li>
                    <!--	Here the JS Function Will Add the Rows -->
                    <li data-page="next" id="prev">
                        <span> &raquo; <span class="sr-only">(current)</span></span>
                    </li>
                </ul>
            </nav>
        </div>
        ';
    } else {
        echo "";
    }
    ?>
    <!-- </div> -->
</section>

<script src="public/admin/Admin/js/phantrang.js"></script>