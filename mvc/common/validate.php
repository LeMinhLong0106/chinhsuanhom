<?php
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function validateMaNNV($inputMaNNV)
  {
      if (empty($inputMaNNV)) {
          $_SESSION['error']['maNNV'] = "Mã nhóm nhân viên không được để trống";
      }
  }

  function validateTenNNV($inputTenNNV)
  {
      if (empty($inputTenNNV)) {
          $_SESSION['error']['tenNNV'] = "Tên nhóm nhân viên không được để trống";
      }
  }

  function validateTenNV($inputTenNV)
  {
      if (empty($inputTenNV)) {
          $_SESSION['error']['tenNV'] = "Tên nhân viên không được để trống";
      }
  }

  function validateNgaySinh($inputNgaySinh)
  {
      if (empty($inputNgaySinh)) {
          $_SESSION['error']['ngaySinh'] = "Ngày sinh không được để trống";
      }
  }
  function validateDiaChi($inputDiaChi)
  {
      if (empty($inputDiaChi)) {
          $_SESSION['error']['diaChi'] = "Địa chỉ không được để trống";
      }
  }
  function validateEmail($inputEmail)
  {
      if ($inputEmail == null) {
          $_SESSION['error']['email'] = "Email không được để trống";
      }
      elseif (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error']['email'] = "Định dạng email không hợp lệ";
      }
  }
  function validateMatKhau($inputMatKhau)
  {
      if ($inputMatKhau == null) {
          $_SESSION['error']['matKhau'] = "Mật khẩu không được để trống";
      }
      elseif (strlen($inputMatKhau) < 8) {
        $_SESSION['error']['matKhau'] = "Mật khẩu của bạn phải chứa ít nhất 8 ký tự";
      }
      elseif(!preg_match("#[0-9]+#",$inputMatKhau)) {
        $_SESSION['error']['matKhau'] = "Mật khẩu của bạn phải chứa ít nhất 1 số";
      }
      elseif(!preg_match("#[A-Z]+#",$inputMatKhau)) {
        $_SESSION['error']['matKhau'] = "Mật khẩu của bạn phải chứa ít nhất 1 chữ cái viết hoa";
      }
      elseif(!preg_match("#[a-z]+#",$inputMatKhau)) {
        $_SESSION['error']['matKhau'] = "Mật khẩu của bạn phải chứa ít nhất 1 chữ cái thường";
    }  
  }
  function validateSoDienThoai($inputSoDienThoai)
  {
      if (empty($inputSoDienThoai)) {
          $_SESSION['error']['soDienThoai'] = "Số điện thoại không được để trống";
      }
      else if(strlen($inputSoDienThoai) != 10) {
        $_SESSION['error']['soDienThoai'] = "Số điện thoại phải là 10 ký tự";
      }
      if (!preg_match ("/^[0-9]*$/", $inputSoDienThoai) ){  
        $_SESSION['error']['soDienThoai'] = "Bạn chỉ được nhập giá trị số nguyên dương vào trường này";
      }

  }
  function validateAnhNV($inputAnhNV)
  {
      if ($inputAnhNV == null) {
          $_SESSION['error']['anhNV'] = "Vui lòng chọn ảnh nhân viên";
      }
  }

  function validateMatKhauMoi($inputMatKhau)
  {
      if ($inputMatKhau == null) { 
          $_SESSION['error']['newPass'] = "Mật khẩu mới không được để trống";
      }
      elseif (strlen($inputMatKhau) < 8) {
        $_SESSION['error']['newPass'] = "Mật khẩu của bạn phải chứa ít nhất 8 ký tự";
      }
      elseif(!preg_match("#[0-9]+#",$inputMatKhau)) {
        $_SESSION['error']['newPass'] = "Mật khẩu của bạn phải chứa ít nhất 1 số";
      }
      elseif(!preg_match("#[A-Z]+#",$inputMatKhau)) {
        $_SESSION['error']['newPass'] = "Mật khẩu của bạn phải chứa ít nhất 1 chữ cái viết hoa";
      }
      elseif(!preg_match("#[a-z]+#",$inputMatKhau)) {
        $_SESSION['error']['newPass'] = "Mật khẩu của bạn phải chứa ít nhất 1 chữ cái thường";
    }  
  }

  function validateTenDU($inputTenDU)
  {
      if (empty($inputTenDU)) {
          $_SESSION['error']['tenDU'] = "Tên đồ uống không được để trống";
      }
  }

  function validateGia($inputGia)
  {
      if (empty($inputGia)) {
          $_SESSION['error']['donGia'] = "Giá đồ uống không được để trống";
      }
      if (!preg_match ("/^[0-9]*$/", $inputGia) ){  
        $_SESSION['error']['donGia'] = "Bạn chỉ được nhập giá trị số nguyên dương vào trường này";
      }
  }

  function validateAnhDU($inputAnhDU)
  {
      if ($inputAnhDU == null) {
          $_SESSION['error']['anhDU'] = "Vui lòng chọn ảnh đồ uống";
      }
  }

  function validateNgayThem($inputNgayThem)
  {
      if (empty($inputNgayThem)) {
          $_SESSION['error']['ngayThem'] = "Ngày thêm không được để trống";
      }
  }

  function validateMaLDU($inputMaLDU)
  {
      if (empty($inputMaLDU)) {
          $_SESSION['error']['maLDU'] = "Mã loại đồ uống không được để trống";
      }
  }

  function validateTenLDU($inputTenLDU)
  {
      if (empty($inputTenLDU)) {
          $_SESSION['error']['tenLDU'] = "Tên loại đồ uống không được để trống";
      }
  }

  function validateTenTP($inputTenTP)
  {
      if (empty($inputTenTP)) {
          $_SESSION['error']['tenTP'] = "Tên topping không được để trống";
      }
  }

  function validateGiaTP($inputGiaTP)
  {
      if (empty($inputGiaTP)) {
          $_SESSION['error']['donGia'] = "Giá topping không được để trống";
      }
      if (!preg_match ("/^[0-9]*$/", $inputGiaTP) ){  
        $_SESSION['error']['donGia'] = "Bạn chỉ được nhập giá trị số nguyên dương vào trường này";
      }
  }

  function validateAnhTP($inputAnhTP)
  {
      if ($inputAnhTP == null) {
          $_SESSION['error']['anhTP'] = "Vui lòng chọn ảnh topping";
      }
  }

  function validateMaLTP($inputMaLTP)
  {
      if (empty($inputMaLTP)) {
          $_SESSION['error']['maLTP'] = "Mã loại topping không được để trống";
      }
  }

  function validateTenLTP($inputTenLTP)
  {
      if (empty($inputTenLTP)) {
          $_SESSION['error']['tenLTP'] = "Tên loại topping không được để trống";
      }
  }

  function validateUser($inputEmail)
  {
      if ($inputEmail == null) {
          $_SESSION['error']['Email'] = "Tên tài khoản không được để trống";
      }
  }

  function validatePassword($inputPassword)
  {
      if ($inputPassword == null) {
          $_SESSION['error']['Password'] = "Mật khẩu không được để trống";
      }
  }
?>

  



