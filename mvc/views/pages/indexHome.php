<section class="banner">
    <div class="box_slide_carousel">
        <div class="homi_slide owl-carousel owl-theme">
            <div class="item">
                <img alt="" src="public/images/anh-bia-summer.jpg" class="responsive" draggable="false">
            </div>
            <div class="item">
                <img alt="" src="public/images/tra-sen-2.jpg" class="responsive" draggable="false">
            </div>
            <div class="item">
                <img alt="" src="public/images/3.jpg" class="responsive" draggable="false">
            </div>
        </div>
    </div>
</section>


<section id="menu" class="hm-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="menu_title line_after_heading section_heading">Menu</h2>
                <div class="viewmore_menu_home"><a class="animate_btn" href="Menu" title="Xem thêm tất cả sản phẩm">xem thêm tất cả sản phẩm</a></div>
            </div>
        </div>
        <div class="box-padding">
            <div class="hm_scrollview">
                <div class="hm_block_menu_items">
                    <h1 class="hm_menu_items_title">Món mới</h1>
                    <div class="row">
                        <?php
                        for ($i = 1; $i <= 4; $i++) {
                            $row = mysqli_fetch_array($data["SPn"]);
                            $giaL = $row["DonGia"] + 5000;
                            echo
                            '<div class="col-lg-3 col-md-6 col-6">
                                <a href="Menu/Details/'.$row["MaDU"].'">
                                    <div class="hm_menu_item">
                                        <div class="hm_item_image">
                                            <img src="public/upload/douong/' . $row["HinhAnh"] . '" alt="' . $row["TenDU"] . '" class="img-fluid">
                                        </div>
                                        <div class="hm_item_info">
                                            <div class="item_title">
                                                <h3>' . $row["TenDU"] . '</h3>
                                            </div>
                                            <div class="item_price">
                                                <div class="size">
                                                    <span>M</span><br>
                                                    <span>' . $row["DonGia"] . ' ₫</span>
                                                </div>
                                                
                                                <div class="size">
                                                    <span>L</span><br>
                                                    <span>' . $giaL . ' ₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
                <div class="hm_block_menu_items">
                    <h1 class="hm_menu_items_title">Bán chạy</h1>
                    <div class="row">
                        <?php
                        for ($i = 1; $i <= 4; $i++) {
                            $row = mysqli_fetch_array($data["SPh"]);
                            $giaL = $row["DonGia"] + 5000;
                            echo
                            '<div class="col-lg-3 col-md-6 col-6">
                                <a href="Menu/Details/'.$row["MaDU"].'">
                                    <div class="hm_menu_item">
                                        <div class="hm_item_image">
                                            <img src="public/upload/douong/' . $row["HinhAnh"] . '" alt="' . $row["TenDU"] . '" class="img-fluid">
                                        </div>
                                        <div class="hm_item_info">
                                            <div class="item_title">
                                                <h3>' . $row["TenDU"] . '</h3>
                                            </div>
                                            <div class="item_price">
                                                <div class="size">
                                                    <span>M</span><br>
                                                    <span>' . $row["DonGia"] . ' ₫</span>
                                                </div>
                                                
                                                <div class="size">
                                                    <span>L</span><br>
                                                    <span>' . $giaL . ' ₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="store" class="hm-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <h2 class="store_title line_after_heading section_heading">cửa hàng</h2>
            </div>
            <div class="col-md-5">
                <div class="select text-center">
                    <div class="select-content">
                        <h1>Homita Coffee and Tea House</h1>
                        <h3>Tìm kiếm cửa hàng</h3>
                        <div class="box-setup">
                            <select id="homiaddress" style="display: none;">
                                <option value="0" disabled="" selected="">Chọn cửa hàng Homita</option>
                                <option value="homi_3">CH 11 Lý Quốc Sư, Vạn Thạnh, Nha Trang</option>
                                <option value="homi_4">CH 102 Quang Trung, Lộc Thọ, Nha Trang</option>
                                <option value="homi_5">CH 12 Võ Thị Sáu, Phước Long, Nha Trang</option>
                                <option value="homi_6">CH 745 đường 2/4, Nha Trang</option>
                                <option value="homi_9">CH 1A Bắc Sơn, Vĩnh Hải, Nha Trang</option>
                                <option value="homi_7">CH 400 đường 23/10, Ngọc Hiệp, Nha Trang</option>
                                <option value="homi_10">CH 195 đường 22/8, Cam Thuận, Cam Ranh</option>
                                <option value="homi_8">CH 342 – 344 đường 2/4, Nha Trang</option>
                                <option value="homi_12">CH 2A Cao Bá Quát, Nha Trang</option>
                                <option value="homi_13">CH 44 Lý Tự Trọng, Diên Khánh</option>
                                <option value="homi_14">CH 469 Thống Nhất, Phan Rang – Tháp Chàm</option>
                                <option value="homi_15">CH 150 Nguyễn Chí Thanh, Cam Nghĩa, Cam Ranh, Khánh Hòa.</option>
                                <option value="homi_16">CH 40 Nguyễn Văn Trỗi, Cẩm Thủy, Cẩm Phả, Quảng Ninh.</option>
                            </select>
                            <div class="nice-select" tabindex="0"><span class="current">Chọn cửa hàng Homita</span>
                                <ul class="list">
                                    <li data-value="0" class="option selected disabled">Chọn cửa hàng Homita</li>
                                    <li data-value="homi_3" class="option">CH 11 Lý Quốc Sư, Vạn Thạnh, Nha Trang</li>
                                    <li data-value="homi_4" class="option">CH 102 Quang Trung, Lộc Thọ, Nha Trang</li>
                                    <li data-value="homi_5" class="option">CH 12 Võ Thị Sáu, Phước Long, Nha Trang</li>
                                    <li data-value="homi_6" class="option">CH 745 đường 2/4, Nha Trang</li>
                                    <li data-value="homi_9" class="option">CH 1A Bắc Sơn, Vĩnh Hải, Nha Trang</li>
                                    <li data-value="homi_7" class="option">CH 400 đường 23/10, Ngọc Hiệp, Nha Trang</li>
                                    <li data-value="homi_10" class="option">CH 195 đường 22/8, Cam Thuận, Cam Ranh</li>
                                    <li data-value="homi_8" class="option">CH 342 – 344 đường 2/4, Nha Trang</li>
                                    <li data-value="homi_12" class="option">CH 2A Cao Bá Quát, Nha Trang</li>
                                    <li data-value="homi_13" class="option">CH 44 Lý Tự Trọng, Diên Khánh</li>
                                    <li data-value="homi_14" class="option">CH 469 Thống Nhất, Phan Rang – Tháp Chàm</li>
                                    <li data-value="homi_15" class="option">CH 150 Nguyễn Chí Thanh, Cam Nghĩa, Cam Ranh, Khánh Hòa.</li>
                                    <li data-value="homi_16" class="option">CH 40 Nguyễn Văn Trỗi, Cẩm Thủy, Cẩm Phả, Quảng Ninh.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="show_homi-house">
                            <div class="homi-house" data-value="homi_3">
                                <h2 class="text-center m-bottom">CH 11 Lý Quốc Sư, Vạn Thạnh, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>1 Lý Quốc Sư, Vạn Thạnh, Thành phố Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3561.199</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_4">
                                <h2 class="text-center m-bottom">CH 102 Quang Trung, Lộc Thọ, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>102 Quang Trung, Lộc Thọ, Thành phố Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3523.833</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_5">
                                <h2 class="text-center m-bottom">CH 12 Võ Thị Sáu, Phước Long, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>12 Võ Thị Sáu, Phước Long, Thành phố Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3880.655</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_6">
                                <h2 class="text-center m-bottom">CH 745 đường 2/4, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>745 đường 2/4, Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3561.199</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_9">
                                <h2 class="text-center m-bottom">CH 1A Bắc Sơn, Vĩnh Hải, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>1 Bắc Sơn, Vĩnh Hải, Thành phố Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0935.083.565</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_7">
                                <h2 class="text-center m-bottom">CH 400 đường 23/10, Ngọc Hiệp, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>14 Đường 23/10, Vĩnh Hiệp, Thành phố Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3891.911</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_10">
                                <h2 class="text-center m-bottom">CH 195 đường 22/8, Cam Thuận, Cam Ranh</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>195 Đường 23/10, Cam Thuận, Cam Ranh</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0889.414.040</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_8">
                                <h2 class="text-center m-bottom">CH 342 – 344 đường 2/4, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>342 – 344 đường 2/4, Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0376.439.903</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_12">
                                <h2 class="text-center m-bottom">CH 2A Cao Bá Quát, Nha Trang</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>2A Cao Bá Quát, Nha Trang</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3561.199</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_13">
                                <h2 class="text-center m-bottom">CH 44 Lý Tự Trọng, Diên Khánh</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>44 Lý Tự Trọng, Diên Khánh</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3561.199</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_14">
                                <h2 class="text-center m-bottom">CH 469 Thống Nhất, Phan Rang – Tháp Chàm</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>469 Thống Nhất, Phan Rang – Tháp Chàm</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3561.199</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_15">
                                <h2 class="text-center m-bottom">CH 150 Nguyễn Chí Thanh, Cam Nghĩa, Cam Ranh, Khánh Hòa.</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>150 Nguyễn Chí Thanh, Cam Nghĩa, Cam Ranh, Khánh Hòa.</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3561.199</li>
                                </ul>
                            </div>
                            <div class="homi-house" data-value="homi_16">
                                <h2 class="text-center m-bottom">CH 40 Nguyễn Văn Trỗi, Cẩm Thủy, Cẩm Phả, Quảng Ninh.</h2>
                                <ul class="homicontactList">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>40 Nguyễn Văn Trỗi, Cẩm Thủy, Cẩm Phả, Quảng Ninh.</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>0258.3561.199</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="homimaps active">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15595.854094109663!2d109.18712051729925!3d12.250747739182286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shomita!5e0!3m2!1svi!2s!4v1571303097022!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="homimaps" data-maps="homi_3">
                    <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15595.851599015072!2d109.17699249748496!3d12.250789954495456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8bb94d19c76880c4!2zVHLDoCBT4buvYSBIb21pdGE!5e0!3m2!1svi!2s!4v1571306266819!5m2!1svi!2s" style="border:0;" width="100%"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_4">
                    <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15595.851599015072!2d109.17699249748496!3d12.250789954495456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067044671b1a7%3A0x2fe8649d16b057e2!2sHomita%20Coffee%20%26%20Tea%20House!5e0!3m2!1svi!2s!4v1571303330997!5m2!1svi!2s" style="border:0;" width="100%"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_5">
                    <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.5264541966267!2d109.19599391528978!3d12.212591534380344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170674e366ede1b%3A0x6797010c262f2362!2zMTIgVsO1IFRo4buLIFPDoXUsIFBoxrDhu5tjIFRydW5nLCBUaMOgbmggcGjhu5EgTmhhIFRyYW5nLCBLaMOhbmggSMOyYSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1571306333236!5m2!1svi!2s" style="border:0;" width="100%"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.7412124395323!2d109.19425391481472!3d12.265784091321638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170678cfa33fdbb%3A0x34a502c2afd0bd0e!2zNzQ1IMSQxrDhu51uZyAyLzQsIFbEqW5oIFRo4buNLCBUaMOgbmggcGjhu5EgTmhhIFRyYW5nLCBLaMOhbmggSMOyYSA2NTAwMDA!5e0!3m2!1svi!2s!4v1617008720584!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_9">
                    <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1949.2763224393348!2d109.20181300966871!3d12.278523935703488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067e57d7f75a1%3A0xd96a902dd3dd77bf!2zMSBC4bqvYyBTxqFuLCBWxKluaCBI4bqjaSwgVGjDoG5oIHBo4buRIE5oYSBUcmFuZywgS2jDoW5oIEjDsmEgNjUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1571306575287!5m2!1svi!2s" style="border:0;" width="100%"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_7">
                    <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2756.9447558666047!2d109.16765014042105!3d12.25445990494989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8b502ad76000af40!2sHomita!5e0!3m2!1svi!2s!4v1571306485269!5m2!1svi!2s" style="border:0;" width="100%"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_10">
                    <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.609676317408!2d109.17473309162115!3d12.251936715847327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31705d775c2db825%3A0xf8c7a178fe490c7e!2zMTk1IMSQxrDhu51uZyAyMy8xMCwgUGjGsMahbmcgc8ahbiwgVGjDoG5oIHBo4buRIE5oYSBUcmFuZywgS2jDoW5oIEjDsmEgNjUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1571306616587!5m2!1svi!2s" style="border:0;" width="100%"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.4780110374254!2d109.19031521481502!3d12.28356269130986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067f940d764ef%3A0x4ab15286934f3a65!2zMzQyIMSQxrDhu51uZyAyLzQsIFbEqW5oIEjhuqNpLCBUaMOgbmggcGjhu5EgTmhhIFRyYW5nLCBLaMOhbmggSMOyYSA2NTAwMDA!5e0!3m2!1svi!2s!4v1617008816256!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.1047017443802!2d109.18243651481451!3d12.241189491337972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31705d86d1567e09%3A0xf24a8602fbc5749f!2zMiBDYW8gQsOhIFF1w6F0LCBQaMaw4bubYyBUaeG6v24sIFRow6BuaCBwaOG7kSBOaGEgVHJhbmcsIEtow6FuaCBIw7JhIDY1MDAwMA!5e0!3m2!1svi!2s!4v1617008863469!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_13">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.8857344161593!2d109.09637621481464!3d12.256011191328206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31705c812a6dd4cb%3A0x7bbd8d22a93cc501!2zNDQgTMO9IFThu7EgVHLhu41uZywgRGnDqm4gS2jDoW5oLCBLaMOhbmggSMOyYSA2NTAwMDA!5e0!3m2!1svi!2s!4v1617008900565!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_14">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.806705471826!2d108.98862641480791!3d11.565710391788924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170d02c624720c9%3A0xfa41a2ae20952ef1!2zNDY5IFRo4buRbmcgTmjhuqV0LCBLaW5oIERpbmgsIFBoYW4gUmFuZy1UaMOhcCBDaMOgbSwgTmluaCBUaHXhuq1u!5e0!3m2!1svi!2s!4v1617008952629!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_15">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.8073401045453!2d109.19248421481198!3d11.987829091506534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31708cd69aaebc21%3A0x4004d34b8b573e82!2zMTUwIE5ndXnhu4VuIENow60gVGhhbmgsIENhbSBOZ2jEqWEsIENhbSBSYW5oLCBLaMOhbmggSMOyYQ!5e0!3m2!1svi!2s!4v1617009506565!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="homimaps" data-maps="homi_16">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5934474735445!2d107.26125391493231!3d21.008927886009136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314afe4bac4374db%3A0x20720f0eaa1406ba!2zNDAgTmd1eeG7hW4gVsSDbiBUcuG7l2ksIEPhuqltIFRodSwgQ-G6qW0gUGjhuqMsIFF14bqjbmcgTmluaA!5e0!3m2!1svi!2s!4v1617009580428!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>