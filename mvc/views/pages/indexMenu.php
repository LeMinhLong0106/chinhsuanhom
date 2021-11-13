<section id="menu" class="product" style="margin-top: -100px;">
    <div class="page-header">
        <img alt="page=header" src="public/images/page-header.jpg" class="img-fluid">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 stickySidebar">
                <aside class="menu-box sticky">
                    <h1>MENU</h1>
                    <div class="menu-link">
                        <ul>
                            <?php
                            foreach ($data['listLDU'] as $item) {
                                echo '<li>';
                                echo '<a class="menu_scroll_link" title="' . $item['TenLoaiDU'] . '" href="#' . $item['MaLoaiDU'] . '">' . $item['TenLoaiDU'] . '</a>';
                                echo '</li>';
                            }
                            ?>
                            <li>
                                <a class='menu_scroll_link' title="Topping" href="#Topping">Topping</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8">
                <div class="hm_scrollview">
                    <?php
                    foreach ($data['listLDU'] as $ldu) {
                        echo '<div class="hm_block_menu_items" id="' . $ldu["MaLoaiDU"] . '">';
                        echo '<h1 class="hm_menu_items_title">' . $ldu["TenLoaiDU"] . '</h1>';
                        echo '<div class="row">';
                        foreach ($data['listDU'] as $du) {
                            if ($du["MaLoaiDU"] == $ldu["MaLoaiDU"]) {
                                echo '<div class="col-lg-4 col-md-6 col-6">';
                                echo '<a href="Menu/Details/' . $du["MaDU"] . '">';
                                echo '<div class="hm_menu_item">';
                                echo '<div class="hm_item_image">';
                                echo '<img src="public/upload/douong/' . $du["HinhAnh"] . '" alt="' . $du["TenDU"] . '" class="img-fluid">';
                                echo '</div>
                                        <div class="hm_item_info">
                                            <div class="item_title">';
                                echo '<h3>' . $du["TenDU"] . '</h3>';
                                echo '</div>
                                        <div class="item_price">
                                            <div class="size">
                                                <span>M</span><br>';
                                echo '<span>' . $du['DonGia'] . ' ₫</span>
                                                            </div>';
                                $giaL = $du['DonGia'] + 5000;
                                echo '<div class="size">
                                                        <span>L</span><br>
                                                        <span>' . $giaL . ' ₫</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                            }
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    <div class="hm_block_menu_items" id="Topping">
                        <h1 class="hm_menu_items_title">Topping</h1>
                        <div class="row">
                            <?php
                            foreach ($data['listTP'] as $tp) {
                                echo '<div class="col-lg-4 col-md-6 col-6">
                                    <div class="hm_menu_item">
                                        <div class="hm_item_image">';
                                echo '<img src="public/upload/topping/' . $tp["HinhAnh"] . '" alt="' . $tp["TenTP"] . '" class="img-fluid">';
                                echo '</div>
                                            <div class="hm_item_info">
                                                <div class="item_title">';
                                echo '<h3>' . $tp["TenTP"] . '</h3>';
                                echo '</div>
                                                <div class="item_price">
                                                    <div class="size">
                                                        <span>' . $tp["DonGia"] . ' ₫</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>