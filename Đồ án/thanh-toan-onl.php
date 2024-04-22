<?php
include 'autoload/autoload.php';

if (!isset($_SESSION['name_id'])) {
    $_SESSION['success'] = "Bạn phải đăng nhập mới được thanh toán";
    header('location: dang-nhap.php');
} else {
    $user = $db->fetchID("users", intval($_SESSION['name_id']));
    //kiểm tra giỏ hàng có tồn tại sản phẩm không
    
}



include 'header.php';

?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Chọn ngân hàng cần thanh toán </a> </h3>
    </section>
    <form action="xulithanhtoan.php" id="create_form" method="post">

        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="order_type">Loại thanh toán:</label>
            <div class="col-sm-10">
                <select name="order_type" id="order_type" class="form-control">
                    <option value="billpayment">Thanh toán hóa đơn</option>
                </select>
            </div>

        </div> <br>
        <div class="form-group" style="margin-top: 30px; display:none;">
            <label class="control-label col-sm-2" for="order_id">Mã hóa đơn: </label>
            <div class="col-sm-10">
                <input class="form-control" id="order_id" readonly="" name="order_id" type="text" value="<?php echo date("YmdHis") ?>" />
            </div>
        </div> <br>

        <div class="form-group" style="margin-top: 10px;">
            <label class="control-label col-sm-2" for="amount">Số tiền: </label>

            <div class="col-sm-10">

                <input type="amount" readonly="" class="form-control" id="amount" name="amount" value="
             <?php
                $_SESSION['amount'] = $_SESSION['tongtien'] * 95 / 100;
                $tong = $_SESSION['amount'];
                echo  number_format($tong, 0, '.', '.') ?> VNĐ  ">

            </div>
        </div> <br>

        <div class="form-group" style="margin-top: 0px">
            <label for="amount">
                <p hidden> số tiền cần thanh toán: </p>
            </label>
            <div class="col-sm-20">
                <input type="hidden" class="form-control" id="amount" name="amount" type="number" placeholder="số tiền cần viết liền không dấu" value="<?php
                                                                                                                                                        echo $_SESSION['amount'] ?>" />
            </div>
        </div>

        <div class="form-group" style="margin-top: -10px">
            <label class="control-label col-sm-2" for="">Nội dung:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="order_desc" name="order_desc" rows="1">Thanh toán đơn hàng đã đặt mua...</textarea>
            </div>
        </div> <br>

        <div class="form-group" style="margin-top: 30px">
            <label class="control-label col-sm-2" for="bank_code">Ngân hàng</label>
            <div class="col-sm-10">
                <select name="bank_code" id="bank_code" class="form-control">
                    <option value="">Không chọn</option>
                    <option value="NCB" selected> Ngân hàng NCB</option>
                    <option value="AGRIBANK"> Ngân hàng Agribank</option>
                    <option value="SACOMBANK">Ngân hàng SacomBank</option>
                    <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                    <option value="HDBANK">Ngân hàng HDBank</option>
                    <option value="BIDV"> Ngân hàng BIDV</option>
                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>

                </select>
            </div>
        </div>
        <div class="form-group" style="display: none">
            <label for="language">Ngôn ngữ</label>
            <select name="language" id="language" class="form-control">
                <option value="vn">Tiếng Việt</option>
                <option value="en">English</option>
            </select>
        </div>
        <div class="row">

            <div class="form-group">
                <h3>Thông tin hóa đơn (Billing)</h3>
            </div>
            <div class="form-group">
                <label>Họ tên (*)</label>
                <input class="form-control" id="txt_billing_fullname" name="txt_billing_fullname" type="text" value="<?php echo $user['account']; ?>" />
            </div>
            <div class="form-group">
                <label>Email (*)</label>
                <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text" value="<?php echo $user['email']; ?>" />
            </div>
            <div class="form-group">
                <label>Số điện thoại (*)</label>
                <input class="form-control" id="txt_billing_mobile" name="txt_billing_mobile" type="text" value="<?php echo $user['phone']; ?>" />
            </div>
            <div class="form-group">
                <label>Địa chỉ (*)</label>
                <input class="form-control" id="txt_billing_addr1" name="txt_billing_addr1" type="text" value="<?php echo $user['address']; ?>" />
            </div>

            <div class="form-group">

                <div class="form-group" style="margin-top: 30px; margin-bottom: 20px;">

                    <div class="row ">

                        <div class="col-sm-offset-9 col-sm-3">
                            <button type="submit" name='redirect' id='redirect' class="btn btn-primary text-right"> xác nhận </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php include 'footer.php'; ?>