<section id="menu" class="contact-w3ls" id="contact" style="padding-top: 0;">
    <div class="page-header">
        <img alt="page=header" src="public/images/page-header.jpg" class="img-fluid">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 contact-w3-agile2" data-aos="flip-left">
                <div class="contact-agileits">
                    <h5 style="color:black; font-size:18px">Những đóng góp, những ý kiến của bạn sẽ giúp cửa hàng của chúng tôi hoàn thiện hơn.</h5>
                    <br />
                    <form action="PhanHoi/GuiPhanHoi" method="post" name="sentMessage" id="contactForm">
                        <div class="control-group form-group">

                            <label class="contact-p1">Họ và tên:</label>
                            <input type="text" class="form-control" name="hoTen" id="name" required style="font-size: 15px">
                            <p class="help-block"></p>

                        </div>
                        <div class="control-group form-group">

                            <label class="contact-p1">Số điện thoại:</label>
                            <input type="tel" class="form-control" name="sdt" id="phone" required style="font-size: 15px">
                            <p class="help-block"></p>

                        </div>
                        <div class="control-group form-group">

                            <label class="contact-p1">Địa chỉ email:</label>
                            <input type="email" class="form-control" name="email" id="email" required style="font-size: 15px">
                            <p class="help-block"></p>

                        </div>

                        <div class="control-group form-group">
                            <label class="contact-p1">Nội dung:</label>
                            <textarea name="noiDung" rows="4" cols="50" class="form-control" id="noiDung" required style="font-size: 15px"></textarea>
                            <p class="help-block"></p>

                        </div>
                        <input type="submit" name="sub" value="Gửi ngay" class="btn btn-primary" style="margin: 0 auto">
                    </form>
                </div>
                <br />
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>