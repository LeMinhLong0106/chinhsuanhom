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

    table tr:nth-child(even) {
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

    h3 {
        text-align: center;
        padding-top: 1rem;
        padding-bottom: 2rem;
    }
</style>

<section>
    <h3>PHẢN HỒI KHÁCH HÀNG</h3>
    <div class="form-group" style="width: 100%; display: flex; margin-top: 60px;">
        <!-- Show Numbers Of Rows -->
        <div>
            <span style="line-height: 2.4rem; font-weight: 800; margin-right: 1.5rem;">Số dòng hiển thị: </span>
        </div>
        <div style="width: 12%;">
            <select class="form-control" name="state" id="maxRows">
                <option value="5000">Hiện tất cả</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <!-- <option value="15">15</option> -->
                <option value="20">20</option>
                <!-- <option value="50">50</option>
                <option value="70">70</option>
                <option value="100">100</option> -->
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
            <th class="row_head">Số điện thoại</th>
            <th class="row_head">Nội dung</th>
            <th class="row_head">Ngày gửi</th>
            <th class="row_head">Tình trạng</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $stt = 1;
        if (count($data['ph']) == 0) {
            echo "
            <tr>
                <td class='row_body' style='color: red' colspan = '7' class='row_body'>Chưa có phản hồi nào từ khách hàng</td>
            </tr>
            ";
        } else {
            foreach ($data['ph'] as $item) {
                $date = str_replace('-', '/', $item["ngayGui"]);
                echo "
                <tr>
                    <td class='row_body'>" . ($stt++) . "</td>
                    <td class='row_body'>" . $item['hoTen'] . "</td>
                    <td class='row_body'>" . $item['sdt'] . "</td>
                    <td class='row_body'>" . $item['noiDung'] . "</td>
                    <td class='row_body'>" . date('d/m/Y', strtotime($date)) . "</td>";
                if ($item['tinhTrang'] == 1) {
                    echo "<td class='row_body'>Chưa xử lý</td>";
                } else {
                    echo "<td class='row_body'>Đã xử lý</td>";
                }


                echo "
                    <td class='row_body'>
                        <a href='QuanLyPH/Write/" . $item["id"] . "'><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                        <a href='QuanLyPH/Delete/" . $item["id"] . "'><i class='fa fa-trash'></i>
                    </td>
                </tr>
                ";
            }
        }
        ?>
 
    </table>
    <!-- Start Pagination -->
    <?php
    if (count($data['ph']) > 5) {
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