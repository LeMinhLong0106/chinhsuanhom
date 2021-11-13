<h3>ĐỔI MẬT KHẨU</h3>

<div class="mt-3">
    <form action="canhan/saveMK" method="POST">
        <div class="row">
            <div class="mb-3 col-md-12">
                <label for="oldPass" class="form-label"><b>Mật khẩu cũ</b></label>
                <input type="password" class="form-control w-50" id="oldPass" name="oldPass" value="<?php if(isset($_SESSION['dmk']['oldPass'])) echo $_SESSION['dmk']['oldPass']; unset($_SESSION['dmk']['oldPass']); ?>">
                <span class="text-danger"><?php if(isset($_SESSION['error']['oldPass'])) echo $_SESSION['error']['oldPass']; unset($_SESSION['error']['oldPass']); ?></span>
            </div>
            
            <div class="mb-3 col-md-12">
                <label for="newPass" class="form-label"><b>Mật khẩu mới</b></label>
                <input type="password" class="form-control w-50" id="newPass" name="newPass" value="<?php if(isset($_SESSION['dmk']['newPass'])) echo $_SESSION['dmk']['newPass']; unset($_SESSION['dmk']['newPass']); ?>">
                <i style="font-size: small;">(*)Mật khẩu phải chứa ít nhất 8 ký tự, ít nhất 1 số, ít nhất 1 chữ cái viết hoa và ít nhất 1 chữ cái thường</i>
                <br>
                <span class="text-danger"><?php if(isset($_SESSION['error']['newPass'])) echo $_SESSION['error']['newPass']; unset($_SESSION['error']['newPass']); ?></span>
            </div>
            <div class="mb-3 col-md-12">
                <label for="againPass" class="form-label"><b>Nhập lại mật khẩu</b></label>
                <input type="password" class="form-control w-50" id="againPass" name="againPass" value="<?php if(isset($_SESSION['dmk']['againPass'])) echo $_SESSION['dmk']['againPass']; unset($_SESSION['dmk']['againPass']); ?>">
                <span class="text-danger"><?php if(isset($_SESSION['error']['againPass'])) echo $_SESSION['error']['againPass']; unset($_SESSION['error']['againPass']); ?></span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>