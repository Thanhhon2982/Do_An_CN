<?php 
    include'autoload/autoload.php';
    include'header.php';
    $id = intval(getInput('id'));
    //lấy tất cả dữ liệu trong bảng thông qua id
    $input = $db->fetchID("page",$id);
    //chọn tên và id từ bảng với điều kiện page_id=$id
    $sqlhomecate = "SELECT name, id FROM category WHERE page_id=$id";
    //Lấy tất cả dữ liệu có trong bảng qua câu lệnh 
    $Categoryhome = $db->fetchsql($sqlhomecate);
    
    $data=[];
    foreach($Categoryhome as $item)
    {
    $idcate = intval($item['id']);
    $sql = "SELECT * FROM product WHERE category_id = $idcate";
    $productHome = $db->fetchsql($sql);
    $data[$item['name']] = $productHome;
    }
    

    
    
    
    
    
    
    
    
    
    ?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <?php foreach($data as $key=>$value): ?>
        <h3 class="title-main" ><a href=""> <?php echo $key;?> </a> </h3>
        <div class="showitem clearfix">
            <?php foreach($value as $item):?>
            <!--Ảnh-->
            <div class="col-md-3 item-product ">
                <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                <img src="<?php echo uploads()?>/product/<?php echo $item['thumbal'] ?>" class="" width="100%" height="180" >
                </a>
                <!--Tên sp-->
                <div class="info-item">
                    <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a>
                    <?php if($item['sale']>0): ?>
                    <!--Giá-->
                    <p><strike class="sale"><?php echo formatprice($item['price']); ?></strike>  <b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b>     
                    </p>
                    <?php else: ?>
                    <p><b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b>    </p>
                    <?php endif ?>
                    <a style= "background: #f42e2e; color: #ffffff;"href="giohang/addcart.php?id=<?php echo $item['id'] ?>" class="btn btn-default"> Mua hàng</a>
                </div>
                <!--Chi tiết sp-->
                <div class="hidenitem">
                    <!--<p><a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                    <p><a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></p>
                    <p><a href="giohang/addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>-->
                </div>
            </div>
            <?php endforeach?>
        </div>
        <?php endforeach?>
    </section>
</div>
<?php include'footer.php'; ?>