

</div>
<section id="footer" >
    <div class="container">
        <div class="col-md-3" style="text-align: center;">
            <div class="col-md-3">
                <img src="public/frontend/images/send.png"></div>
                <div class="col-md-9">
                    <span>Giao hàng tận nơi</span>
            <p><b>63 tỉnh thành</b></p>
                </div>
            
        </div>

        <div class="col-md-3" style="text-align: center;">
            <div class="col-md-3">
                <img src="public/frontend/images/flyer.png"></div>
            <div class="col-md-9">
                <span>Sản phẩm</span>
            <p><b>Chính hãng</b></p>
            </div>
        </div>

        <div class="col-md-3" style="text-align: center;">
            <div class="col-md-3">
            <img src="public/frontend/images/support.png"></div>
            <div class="col-md-9"><span>Tư vấn miễn phí
            <p><b>0344517822</b></p></span></div>
            
        </div>

        <div class="col-md-3" style="text-align: center;">
            <div class="col-md-3">
                <img src="public/frontend/images/laptop.png"></div>
            <div class="col-md-9">
                <span>Chính sách đổi trả</span>
            <p><b>Linh hoạt</b></p>
            </div>
        </div>
    </div>
</section>
<section id="footer-button">
    <div class="container-pluid" style="background: #474c5f">
        <div class="container">
            <div class="col-md-3" id="ft-about">
                <p><span class="glyphicon glyphicon-check" style="  color: #689bda"></span> <b>Hỗ trợ Khách hàng</b></p>
                
                <p> <a href="baohanh.php">Trung tâm bảo hành</a></p>
                <p><a href="baohanh.php">Thanh toán và giao hàng</a></p>
                <p><a href="baohanh.php">Dịch vụ sửa chữa và bảo trì</a></p>
            </div>

            <div class="col-md-3" id="ft-about">
                <p><span class="glyphicon glyphicon-check"style="color: #689bda"></span> <b>Chính sách Bảo hành</b></p>
                <!-- <p><a href="baohanh.php">Chính sách đổi trả</a></p> -->
                <p><a href="baohanh.php">Chính sách bảo hành</a></p>
                <!-- <p><a href="baohanh.php">Chính sách thanh toán</a></p>
                <p><a href="baohanh.php">Chính sách trả góp</a></p> -->
                
            </div>
    </div>
</section>
<section id="ft-bottom">
  
</section>
</div>
</div>      
</div>
</div>      
</div>
<script  src="public/frontend/js/slick.min.js"></script>
</body>
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
</script>
