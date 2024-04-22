<?php 

$open="thongke";
$admin = $db->fetchAll('transaction');

 $don=0;
$sum = 0;
    
    //phân trang
    if(isset($_GET['page']))
    {
        $p=$_GET['page'];
    }
    else{
        $p=1;
    }
    //truy vấn dữ liệu với điều kiện status
    $sql = "SELECT * FROM transaction WHERE status = 1 ORDER BY id DESC";
     $sqli = "SELECT * FROM transaction WHERE  huy = 1 ORDER BY id DESC";
    //tổng số sản phẩm
    $total = count($db->fetchsql($sql));
      $stt = count($db->fetchsql($sqli));

       $don = $total - $stt;

    // phân trang với điều kiện total
    $transaction=$db->fetchJones('transaction',$sql,$total,$p,5,true);
    $tinhtong = $db->fetchsql($sql);
    $sotrang = $transaction['page'];
    //Hủy trang dư
    unset($transaction['page']); 
    $path = $_SERVER['SCRIPT_NAME']; //lấy tên server name hiện tại

?>


                 <div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Thống kê thanh toán</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày</th>
                            <th>Chi tiết</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            //duyệt dữ liệu transac
                             foreach ($transaction as $row):?>
                         <?php if(($row['status']==1 && $row['huy']==0)) : ?>
                        <?php
                            //lấy id user
                            $a = intval($row['users_id']);
                            //truy vấn dữ liệu user
                            $user =$db->fetchID("users",$a);
                            
                             ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $user['account'] ?></td>
                            <td><?php echo $row['update_at']  ?></td>
                            <td><a href="transaction/donhang.php?id=<?php echo $row['id'] ?>" class="btn btn-xs btn-primary"><i class="fa fa-refresh" style="color: #fff;"></i> Chi tiết</a></td>
                            <td><?php echo formatprice($row['amount']) ?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr >
                          <th style="text-align: right">Tổng đơn hàng:

                            <?php    echo $don ?>
                          
                        </th>

                        <th style="text-align: right">Tổng cộng:
                            <?php foreach ($tinhtong as $value):?>
                            <?php $sum =$sum+ $value['amount']?>
                            <?php endforeach ?>
                            <?php echo formatprice($sum) ?>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class="pull-right">
                <nav aria-label="page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <!--phân trang-->
                            <a class="page-link" href="<?php echo $path ?>?page=<?php echo $p-1==0?1:$p-1 ?>" tabindex="-1">Previous</a>
                        </li>
                        <?php for ($i=1; $i <=$sotrang ; $i++):  ?>
                        <li class="<?php ($p==$i)? active:'' ?>"><a class="" href="<?php echo $path ?>?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php endfor ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $path ?>?page=<?php echo $p+1<$i?$p+1:$p ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

                    
           









