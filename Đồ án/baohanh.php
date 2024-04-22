<?php
include 'autoload/autoload.php';
$sqlhomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY update_at";

//Truy vấn dữ liệu trong bảng
$Categoryhome = $db->fetchsql($sqlhomecate);
$data = [];
foreach ($Categoryhome as $item) {
    $cateID = intval($item['id']); //lọc các id
    $sql = "SELECT * FROM product WHERE category_id = $cateID ORDER BY ID DESC LIMIT 4";
    $productHome = $db->fetchsql($sql); //truy vấn vô csdl
    $data[$item['name']] = $productHome;
}
$pannel = $db->fetchAll("panel");
$count = count($db->fetchAll("panel"));

$a=1;
?>
<?php include 'header.php'?>

<h2 id="mcetoc_1e4i9liht0">TTK Store Khẳng định Bảo hành, ưu đãi tốt nhất:</h2>
<p>1. Thời gian bảo hành chỉ 3-5 ngày.</p>
<p>2. Bảo hành lần 3 đổi máy khác (Duy nhất tại Việt Nam).</p>
<p>3. Khách hàng có thể Bảo hành tại mọi chi nhánh .</p>
<p>4. Hỗ trợ phần mềm từ xa: 8h30 đến 20h30 .</p>
<p>5. Gói bảo hành mua thêm RẺ nhất.</p>
<p>6. Tất cả các cửa hàng đều có số điện thoại phản ánh chất lượng dịch vụ.</p>
<p>Quý khách sẽ được tặng ngay 1 triệu, nếu nhân viên phục vụ không tốt, không làm đúng quy định Bảo hành.</p>
<h3 id="mcetoc_1e4i9qnbs0"> 1. Thời gian đổi máy, chờ bảo hành:</h3>
<p><strong>Bảo hành thường</strong>:</p>
<p>Quý khách được đổi máy (Nếu có lỗi của nhà sản xuất):  <span style="color: #ff0000;">15 ngày</span> .</p>
<p>Tặng thêm <span style="color: #ff0000;">15 ngày</span> Bảo hành đối với máy ship xa. Thời gian chờ Bảo hành máy là <span style="color: #ff0000;">5-7 ngày</span> làm việc.</p>
<p>Đổi máy khác nếu bảo hành phần cứng lần 3. Không hỗ trợ nhập lại máy.</p>
<p><strong>Bảo hành Vàng</strong>:</p>
<p>Quý khách được đổi máy (Nếu có lỗi của nhà sản xuất):  <span style="color: #ff0000;">30 ngày</span> .</p>
<p>Tặng thêm <span style="color: #ff0000;">30 ngày</span> Bảo hành đối với máy ship xa. Thời gian chờ Bảo hành máy là <span style="color: #ff0000;">3-5 ngày</span> làm việc.</p>
<p>Đổi máy khác nếu bảo hành phần cứng lần 3. Hỗ trợ nhập lại máy với giá cao.</p>
<h3 id="mcetoc_1e4ia5e7r1">2. Nội dung được Bảo hành:</h3>
<p><strong>Bảo hành thường</strong>:</p>
<p>Bảo hành 12 tháng phần cứng.</p>
<p>Hỗ trợ giá thay thế, sửa chữa linh kiện tối đa bằng công thay thế, sửa chữa </span></p>
<p><strong>Bảo hành Vàng</strong>:</p>
<p>Bảo hành 12 tháng phần cứng, <span style="color: #ff0000;">.</p>
<p>Hỗ trợ giá thay thế, sửa chữa linh kiện lên đến <span style="color: #ff0000;">1.000.000</span> cụ thể như sau:</p>
<p>- Hỗ trợ khách 100% số tiền Bảo hànhV (Tối đa bằng giá sửa chữa, thay thế) nếu máy lỗi do người dùng trong 1 tháng đầu.</p>
<p>- Hỗ trợ khách 50% số tiền Bảo hànhV (Tối đa bằng giá sửa chữa, thay thế) nếu máy do người dùng trong 2 tháng đầu(Bảo hànhV 6 tháng) và 3 tháng đầu(Bảo hànhV 12 tháng).</p>
<p>- Hỗ trợ khách 25% số tiền Bảo hànhV (Tối đa bằng giá sửa chữa, thay thế) nếu máy do người dùng trong 3 tháng đầu(Bảo hànhV 6 tháng) và 6 tháng đầu(Bảo hànhV 12 tháng).</p>
<h3 id="mcetoc_1e4ialc1i2">3. Quà tặng:</h3>
<p><strong>Bảo hành thường</strong>:</p>
<p>Tặng chuột .</p>
<p><strong>Bảo hành Vàng</strong>:</p>
<p>Tặng nguồn chuột, phím cơ.</p>
<p>Tặng tai nghe gameming khi mua máy mới. Nếu đã sở hữu phụ kiện quý khách sẽ đc đổi sang phụ kiện khác tương đương .</p>
<p style="text-align: center;"><span style="color: #ff0000;"><strong>Cám ơn Quý khách đã tin tưởng và ủng hộ TTK Store. </strong></span></p>
<p style="text-align: center;"><span style="color: #ff0000;"><strong>Rất mong quý khách lựa chọn gói Bảo hànhV như một hình thức bảo hiểm máy. </strong></span></p>
<p style="text-align: center;"><span style="color: #ff0000;"><strong>TTK Store sẽ rất biết ơn khi chúng tôi có thể phục vụ khách hàng với những ưu đãi, hậu mãi tốt nhất!</strong></span></p>
<p style="text-align: center;"> </p>

<h3 id="mcetoc_1f2gm5q2i2">Những điểm nối bật của trung tâm sửa chữa </h3>
<p>1. Trung tâm  là hệ thống sửa chữa duy nhất ở Việt Nam có mặt song song cùng với hệ thống bán hàng.  có mặt tại tất cả các chi nhánh của TTK Store. Đặc biệt tất cả các mức độ sửa chữa  đầu có: Bảo hành, Phầm mềm, Unbrick, Thay thế, Sửa Main ...</p>
<p>2.  có trung tâm đào tạo học viên sửa chữa tại cả 3 miền: Bắc, Trung, Nam. Đây là điều kiện thuận lợi để chúng tôi có được đội ngũ nhân viên kỹ thuật lành nghề, có kinh nghiệm nhiều năm.</p>
<p>3. Duy nhất tại Việt Nam,  thực hiện đầy đủ quy trình: nhận test máy, sửa chữa thay thế, test máy kỹ sau khi sửa và trước khi gửi lại khách hàng.</p>
<p>4. Thông tin bảo hành và sửa máy được quản lý online. Quý khách dễ dàng cập nhật thông tin và kiểm tra lại sau này ở đường link sau: <a href="https://localhost/banhang">https://localhost/banhang</a></p>
<p>5. Tất cả các trung tâm đều có số Hotline phản ảnh chất lượng dịch vụ. Trực tiếp tổng công ty sẽ tiếp nhận và giải đáp mọi thắc mắc của Quý khách. Quý khách sẽ yên tâm tuyệt đối khi bảo hành, sửa chữa tại cửa hàng của chúng tôi.</p>

<p>Nếu còn bất cứ thắc mắc nào về dịch vụ hay bạn có gặp phải bất kỳ hư hỏng gì với thiết bị của mình, hãy liên hệ ngay với chúng tôi để được hỗ trợ tốt nhất. Hân hạnh phục vụ quý khách! <p><strong>Hệ thống sửa chữa  <span style="color: #ff6600;">NTH Store</span></strong></p>
<p><span style="color: #0000ff;">Tại Thành Phố Hồ Chí Minh</span></p>
Địa Chỉ: 622/10 Cộng Hòa, Phường 13, Tân Bình </br>
<span style="color: #ff0000;">Hotline:<strong> 0344517822</strong>
<?php include 'footer.php' ?>