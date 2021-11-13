# Bài tập nhóm môn: Phát triển phần mềm mã nguồn mở

Tên đề tài: Quản lý bán trà sữa.

Ngôn ngữ: PHP, Javascript, HTML, CSS.

Thành viên thực hiện:
  - Mang Bảo,
  - Lê Minh Long,
  - Phan Thanh Hà,
  - Nguyễn Văn Trí,
  - Nguyễn Đức Lộc.

# Hướng dẫn cài đặt và sử dụng

### Kết nối database

Các bạn cần tạo mới một database với tên ```quanlytrasua``` và import file ```quanlytrasua.sql``` để thêm các bảng và dữ liệu mẫu. (Dưới đây là video minh họa)

![insertDB](https://user-images.githubusercontent.com/63081025/139536709-a262de9a-721c-4878-810c-de0ad8dbd709.gif)

### Cách vào giao diện của bên nhân viên

Vì để tăng tính bảo mật, nhóm mình không để bất kì các đường dẫn hay nút bấm nào dẫn đến trang quản trị ở giao diện khách hàng.

Nhân viên của cửa hàng có thể vào trang quản trị bằng cách truy cập vào ```/Login``` để chuyển đến trang đăng nhập. (Dưới đây là video minh họa)

Tài khoản admin:

  - Email: ```hathanh.0113@gmail.com```
  - Password: ```1234```

![dangnhap](https://user-images.githubusercontent.com/63081025/139535110-3a19156c-968b-4652-b171-3ed2e80c1f1d.gif)

# Giới thiệu các chức năng của phần mềm web Quản lý bán trà sữa

## Các chức năng của khách hàng

### Xem thông tin cửa hàng

  - Giới thiệu.
  - Địa chỉ cửa hàng.
  - Thông tin liên hệ

### Xem sản phẩm

  - Xem các sản phẩm nổi bật.
  - Xem các sản phẩm mới.
  - Xem toàn bộ sản phẩm.

### Đặt hàng trực tuyến (Chức năng chính)
 
  - Thêm sản phẩm vào giỏ hàng.
  - Chỉnh sửa giỏ hàng.
  - Gửi đơn hàng.

### Gửi phản hồi

## Các chức năng của nhân viên

### Quản lý danh mục

  - Thêm, sửa, xóa, xem chi tiết đồ uống, loại đồ uống, topping, loại topping.

### Quản lý hóa đơn

  - Xử lý hóa đơn, xuất hóa đơn.

### Quản lý phản hồi

  - Xử lý phản hồi, gửi mail trả lời phản hồi cho khách hàng.

### Quản lý thông tin nhân viên

  - Thêm, sửa, xóa nhân viên.

### Quản lý nhóm nhân viên và phân quyền

  - Thêm, xóa nhóm nhân viên.
  - Phân quyền cho các nhóm nhân viên.

### Quản lý thông tin cá nhân

  - Đổi thông tin cá nhân.
  - Đổi mật khẩu.

### Đăng nhập, đăng xuất.


## Thông tin các tài khoản với các nhóm nhân viên

  - Quản trị hệ thống:    email: ```hathanh.0113@gmail.com```, password: ```1234``` 
  - Quản lý:              email: ```long@gmail.com```,         password: ```1234``` 
  - Thu ngân:             email: ```bao@gmail.com```,          password: ```1234``` 
  - Nhân viên giao hàng:  email: ```tri@gmail.com```,          password: ```1234``` 
                   hoặc:  email: ```loc@gmail.com```,          password: ```1234```
                   
## Ví dụ về chức năng phần quyền

### Nhóm nhân viên: Quản trị hệ thống

![roleAdmin](https://user-images.githubusercontent.com/63081025/139535339-3c3ba2ce-1c60-4e55-936a-1bc4020d9c39.gif)

### Nhóm nhân viên: Thu ngân

![roleThuNGan](https://user-images.githubusercontent.com/63081025/139535346-01671a40-1389-41cf-b649-d27cb50917f2.gif)

# Phân công công việc và quá trình thực hiện đề tài

## Thành viên đảm nhận xây dựng module chính

  - Menu, giỏ hàng, phân quyền, thông tin cá nhân: Phan Thanh Hà
  - Đăng nhập, đăng xuất, quản lý nhân viên, nhóm nhân viên: Nguyễn Văn Trí
  - Phản hồi của khách hàng, quản lý phản hồi, hóa đơn: Mang Bảo
  - Quản lý đồ uống, loại đồ uống: Lê Minh Long
  - Quản lý topping, loại topping: Nguyễn Đức Lộc

## Ngoài ra

*Các thành viên đều tích cực thực hiện tốt và hoàn thành đúng hạn nhiệm vụ được giao (Thông qua lịch sử commit có thể thấy được sự tham gia đầy đủ của tất cả các thành viên trong nhóm).*

*Ngoài đảm nhận những module chính, các thành viên trong nhóm đều có nhưng đóng góp vào các module của thành viên khác để cùng nhau giải quyết những vấn đề phát sinh.*

*Các thành viên đều tham gia đầy đủ vào các buổi học nhóm để đánh giá tiến độ công việc và trao đổi những vấn đề gặp phải.*






