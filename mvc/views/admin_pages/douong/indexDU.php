<style>
    table {
        margin-top: 25px;
        font-size: 1rem;
    }

    table th,
    table td {
        text-align: center;
    }

    .row_head,
    .row_body {
        vertical-align: middle !important;
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

    h3 {
        padding-top: 1rem;
        padding-bottom: 2rem;
    }
    .dg{
        line-height: 2.1rem;
        border-radius: 4px;
        outline: none;
        border: 0.1px solid #7877775c;
        width: 140px;
    }
</style>
<section>
    <div class="col-lg-6">
        <a href="DoUong/Create">
            <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
        </a>
    </div>
    <h3 class="text-center">DANH SÁCH ĐỒ UỐNG</h3>
    <form action="DoUong/Index" method="POST">
        <table style="margin: auto; width:460px;">
            <tr>
                <td><b>Mã đồ uống: </b></td>
                <td><input type="text" id="maDU" name="maDU" class="form-control" value="<?php if (isset($_POST['maDU'])) echo $_POST['maDU']; ?>"></td>
            </tr>
            <tr>
                <td><b>Tên đồ uống: </b></td>
                <td><input type="text" id="tenDU" name="tenDU" class="form-control" value="<?php if (isset($_POST['tenDU'])) echo $_POST['tenDU']; ?>"></td>
            </tr>
            <tr>
                <td><b>Đơn giá: </b></td>
                <td>
                    Từ: <input class="dg" type="number" min= "1" id="dongia1" name="dongia1"  value="<?php if (isset($_POST['dongia1'])) echo $_POST['dongia1']; ?>">
                    Đến: <input  class="dg" type="number" min= "1" id="dongia2" name="dongia2"  value="<?php if (isset($_POST['dongia2'])) echo $_POST['dongia2']; ?>">
                </td>
            </tr>
            <tr>
                <td><b>Bán chạy: </b></td>
                <td>
                    <!-- <input type="radio" name="banChay" value="1" <?php if (isset($_POST['banChay']) && $_POST['banChay'] == '1') echo "checked"; ?>> Bán chạy
                    <input style="margin-left: 10px;" type="radio" name="banChay" value="0" <?php if (isset($_POST['banChay']) && $_POST['banChay'] == '0') echo "checked"; ?>> Không -->

                    <input type="checkbox" name="banChay" value="1" <?php if (isset($_POST['banChay']) && $_POST['banChay'] == 1) echo "checked"; ?>> Bán chạy


                </td>
            </tr>
            <tr>
                <td><b>Loại đồ uống: </b></td>
                <td><select name="MaLoaiDU" class="form-control text-box single-line">
                        <option value="">------ Chọn tất cả ------</option>
                        <?php
                        foreach ($data['listTenLoaiDU'] as $nhomNV) {
                            if ($nhomNV['MaLoaiDU'] == $_POST['MaLoaiDU'] && isset($_POST['MaLoaiDU'])) {
                                $s = "selected";
                            } else {
                                $s = "";
                            }
                            echo '<option ' . $s . ' value="' . $nhomNV['MaLoaiDU'] . '" class = "form-control">' . $nhomNV['TenLoaiDU'] . '</option>';
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-left: 91px;padding-top: 10px;">
                    <input type="submit" value="Tìm kiếm" class="btn btn-primary" name="searchBtn" />
                    <a href="douong/index" class="btn btn-primary">Làm mới</a>
                </td>
            </tr>
        </table>
    </form>
    <!-- <div class="row">
        <div class="col-lg-6">
            <a href="DoUong/Create">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
            </a>
        </div>

        <div class="col-lg-6" style="position: relative;">
            <form action="DoUong/TimKiem" method="POST">
                <div class="form-group" style="display: flex; position: absolute; right: 0;">
                    <input style="width: 300px;" type="text" class="form-control" placeholder="Tìm kiếm..." id="tukhoa" name="tukhoa" value="<?php if (isset($_POST['tukhoa'])) echo $_POST['tukhoa']; ?>">
                    <input type="submit" value="Tìm kiếm">
                </div>
            </form>
        </div>
    </div> -->
    <?php
    if (isset($_SESSION['thongbao'])) {
        echo "<div class='alert alert-success'>";
        echo $_SESSION['thongbao'];
        echo "</div>";
        unset($_SESSION['thongbao']);
    }
    ?>
    <div class="form-group" style="width: 100%; display: none; margin-top: 60px;">
        <!-- Show Numbers Of Rows -->
        <div>
            <span style="line-height: 2.4rem; font-weight: 800; margin-right: 1.5rem;">Số dòng hiển thị: </span>
        </div>
        <div style="width: 12%;">
            <select class="form-control" name="state" id="maxRows">
                <option value="5000">Hiện tất cả</option>
                <option value="5">5</option>
                <!-- <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option> -->
            </select>
        </div>
    </div>
    <table class="table table-striped table-class" id="table-id">
        <tr>
            <th class="row_head">STT</th>
            <th class="row_head">Hình ảnh</th>
            <th class="row_head">Mã đồ uống</th>
            <th class="row_head">Tên đồ uống</th>
            <th class="row_head">Giá</th>
            <th class="row_head">Ngày thêm</th>
            <th class="row_head">Bán chạy</th>
            <th class="row_head">Loại đồ uống</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $i = 1;
        if (count($data['listDU']) > 0) {
            foreach ($data['listDU'] as $item) {
        ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo '<img src="public/upload/douong/' . $item['HinhAnh'] . '"style ="max-width: 50px">'; ?></td>
                    <td><?php echo $item["MaDU"]; ?></td>
                    <td><?php echo $item["TenDU"]; ?></td>
                    <td><?php echo $item['DonGia'] ?></td>
                    <td><?php
                        $date = str_replace('-', '/', $item["NgayThem"]);
                        echo date('d/m/Y', strtotime($date));
                        ?></td>
                    <td><?php if ($item["BanChay"] == 1)
                            echo "X";
                        else
                            echo " "; ?>
                    </td>

                    <td><?php

                        foreach ($data['listTenLoaiDU'] as $loaiDU) {
                            if ($item["MaLoaiDU"] == $loaiDU['MaLoaiDU']) {
                                echo $loaiDU['TenLoaiDU'];
                            }
                        }

                        ?></td>

                    <td>
                        <?php
                        echo "<a href='DoUong/Edit/" . $item["MaDU"] . "'><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;";
                        echo "<a href='DoUong/Delete/" . $item["MaDU"] . "'><i class='fa fa-trash'></i></a>&nbsp; ";
                        ?>
                    </td>
                </tr>
        <?php
                $i++;
            }
        } else {
            echo "<tr><td colspan='10' style='text-align:center'>Không có đồ uống bạn tìm</td></tr>";
        }

        ?>

    </table>
    <!-- Start Pagination -->
    <?php
    if (count($data['listDU']) > 5) {
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


</section>

<script src="public/admin/Admin/js/phantrang.js"></script>