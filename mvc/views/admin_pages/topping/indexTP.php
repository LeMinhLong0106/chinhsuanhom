<style>
    table {
        margin-top: 25px;
        font-size: 1rem;
    }

    table th,
    table td {
        text-align: center;
    }
    .dg{
        line-height: 2.1rem;
        border-radius: 4px;
        outline: none;
        border: 0.1px solid #7877775c;
        width: 140px;
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
</style>
<?php
// echo "INDEX Topping";
?>
<section>
    <div class="col-lg-6">
        <a href="Topping/Create">
            <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
        </a>
    </div>
    <h3 class="text-center">DANH SÁCH TOPPING</h3>
    <form action="Topping/Index" method="POST">
        <table style="margin: auto; width:460px;">
            <tr>
                <td><b>Mã topping: </b></td>
                <td><input type="text" id="maTP" name="maTP" class="form-control" value="<?php if (isset($_POST['maTP'])) echo $_POST['maTP']; ?>"></td>
            </tr>
            <tr>
                <td><b>Tên topping: </b></td>
                <td><input type="text" id="tenTP" name="tenTP" class="form-control" value="<?php if (isset($_POST['tenTP'])) echo $_POST['tenTP']; ?>"></td>
            </tr>
            <tr>
                <td><b>Đơn giá: </b></td>
                <td>
                    Từ: <input class="dg" type="number" min= "1" id="dongia1" name="dongia1"  value="<?php if (isset($_POST['dongia1'])) echo $_POST['dongia1']; ?>">
                    Đến: <input  class="dg" type="number" min= "1" id="dongia2" name="dongia2"  value="<?php if (isset($_POST['dongia2'])) echo $_POST['dongia2']; ?>">
                </td>
            </tr>
            <tr>
                <td><b>Loại Topping: </b></td>
                <td align="center" ><select name="MaLoaiTP" class="form-control text-box single-line">
                        <option value="">------ Chọn tất cả ------</option>
                        <?php
                        foreach ($data['listTenLoaiTP'] as $nhomNV) {
                            if ($nhomNV['MaLoaiTP'] == $_POST['MaLoaiTP'] && isset($_POST['MaLoaiTP'])) {
                                $s = "selected";
                            } else {
                                $s = "";
                            }
                            echo '<option ' . $s . ' value="' . $nhomNV['MaLoaiTP'] . '" class = "form-control">' . $nhomNV['TenLoaiTP'] . '</option>';
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-left: 91px;padding-top: 10px;">
                    <input type="submit" value="Tìm kiếm" class="btn btn-primary" name="searchBtn" />
                    <a href="topping/index" class="btn btn-primary">Làm mới</a>
                </td>
            </tr>
        </table>
    </form>

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
            <th class="row_head">Mã topping</th>
            <th class="row_head">Tên topping</th>
            <th class="row_head">Giá</th>
            <th class="row_head">Loại topping</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $i = 1;
        if (count($data['listTP']) > 0) {
            foreach ($data['listTP'] as $item) {
        ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo '<img src="public/upload/topping/' . $item['HinhAnh'] . '"style ="max-width: 50px">'; ?></td>
                    <td><?php echo $item["MaTP"]; ?></td>
                    <td><?php echo $item["TenTP"]; ?></td>
                    <td><?php echo $item['DonGia'] ?></td>
                    <td><?php

                        foreach ($data['listTenLoaiTP'] as $loaiTP) {
                            if ($item["MaLoaiTP"] == $loaiTP['MaLoaiTP']) {
                                echo $loaiTP['TenLoaiTP'];
                            }
                        }

                        ?></td>

                    <td>
                        <?php
                        echo "<a href='Topping/Edit/" . $item["MaTP"] . "'><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;";
                        echo "<a href='Topping/Delete/" . $item["MaTP"] . "'><i class='fa fa-trash'></i></a>&nbsp; ";
                        ?>
                    </td>
                </tr>
        <?php
                $i++;
            }
        } else {
            echo "<tr><td colspan='10' style='text-align:center'>Không có topping bạn tìm</td></tr>";
        }

        ?>

    </table>
    <!-- Start Pagination -->
    <?php
    if (count($data['listTP']) > 5) {
        echo '
        <div class="pagination-container">
            <nav style="text-align: center;">
                <ul class="pagination">
                    <li data-page="prev" class="page-item">
                        <span>
                            &laquo; <span class="sr-only">(current)
                            </span></span>
                    </li>
                    <!--    Here the JS Function Will Add the Rows -->
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