<?php 
include'autoload/autoload.php';
include('PHPMailer-5.2.26/class.smtp.php');//gọi thư viện gửi mail
    include "PHPMailer-5.2.26/class.phpmailer.php";//gọi thư viện gửi mail
$id = intval(getInput('id'));
$user = $db->fetchID('users',$id);

$data=[      
            "password" => MD5(postInput("password")),

    ];
if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        	$error=[];
        	if(postInput('password')=='')
            {
                 $error['password']= "Bạn chưa nhập password";
            }
            if($data['password'] != MD5(postInput("re_password")))
            {
                $error['password']= "Password không khớp";
            }

            if(empty($error))
        {   //câu lênh cho upload file            
    
        //kiểm tra trùng tên
            
            //insert dữ liệu
            $id_update = $db->update("users",$data,array('id' =>$id ));

            if($id_update > 0 )
            {   //Đăng ký
                $title = 'Đổi mật khẩu thành công';
                $content = 'Xin chào, yêu cầu đổi mật khẩu đã được thực hiện thành công..!! Bạn có thể đăng nhập vào tài khoản ngay lúc này.';
                $nTo = $user['email'];
                $mTo =  $user['email'];
                $diachicc =  $user['email'];
                //sendMail từ lớp function
                $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
                if($mail!=1)
                
                echo 'Co loi!';

                $_SESSION['success']="Đổi mật khẩu thành công, mời bạn đăng nhập !!!";
                 //Gửi mail đơn hàng thành công 
                
                header('location: dang-nhap.php');//redirecAdmin chuyển về các trang
                
                
            }
            else
            {
                //THêm thất bại
    
                $_SESSION['error']="Bạn đang sử dụng mật khẩu cũ, hãy sử dụng mật khẩu khác";
                
            }
         
        }
        }
        
       





include'header.php';

 ?>   

<div class="col-md-9 bor" style="border-radius: 5px;padding-bottom: 40px;">
    <?php if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error'];
                unset($_SESSION['error']) ?>
        </div>
        <?php endif ?>
    <section class="" style="margin-bottom: 13px; margin-top: 5px;">
        <h3 class="title-main" style="border-bottom: none;" ><a href=""> Đổi mật khẩu</a> </h3>
    </section>
    
    <form class="form-horizontal" action="" method="POST">
    <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-4" for="pwd">Mật khẩu:</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password" required="" >
                <?php if(isset($error['password'])): ?>
                <p class="text-danger"><?php echo $error['password'];?></p>
                <?php endif ?>
            </div>
    </div>
    <div class="form-group" style="margin-top: 20px;">
            <label class="control-label col-sm-4" for="pwd" style="padding-top: 0;">Nhập lại mật khẩu:</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="pwd" placeholder="Nhập lại mật khẩu" name="re_password" required="">
                <?php if(isset($error['re_password'])): ?>
                <p class="text-danger"><?php echo $error['re_password'];?></p>
                <?php endif ?>
            </div>
        </div>
    <div class="form-group" style="margin-top: 25px; margin-bottom: 20px;">
        <div class="col-sm-offset-7 col-sm-3">
            <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>
</div>

 <?php include'footer.php'; ?>