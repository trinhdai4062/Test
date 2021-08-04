


<?php 

 require_once __DIR__."/admin/autoload/autoload.php"; 


    if($_SERVER['REQUEST_METHOD']=='POST'){
       
        $error=[];

        if(postInput('firstname')==''){
            $error['firstname']="Mời bạn nhập tên";
        }
        if(postInput('lastname')==''){
            $error['lastname']="Mời bạn nhập họ";
        }
        if(postInput('address')==''){
            $error['address']="Mời bạn nhập địa chỉ";
        }
        if(postInput('phone')==''){
            $error['phone']="Mời bạn nhập số điện thoại";
        }
        if(postInput('email')==''){
            $error['email']="Mời bạn nhập địa chỉ email";
        }
        if(postInput('password')==''){
            $error['password']="Mời bạn mật khẩu";
        }
        if(postInput('confirm_password')==''){
            $error['confirm_password']="Mời bạn xác nhận mật khẩu";
        }
        if(postInput('password')!=postInput('confirm_password')){
            $error['password']="Mời bạn mật khẩu";
            $error['confirm_password']="Mời bạn xác nhận mật khẩu";
        }
        if(empty($error)){
                // $connect=new mysqli("localhost","root","","id15957850_banhang")or die ("error connect");
                $connect =$db->link;
                $emailquery="SELECT * FROM userss WHERE email=? LIMIT 1";
                $stmt =$connect->prepare($emailquery);
                $stmt->bind_param('s',postInput('email'));
                $stmt->execute();
                $result = $stmt->get_result();
                $usercount = $result->num_rows;
                if($usercount>0){
                    $_SESSION['error']="Email đã tồn tại.";
                }
                if(count($error)===0){
                    $password=password_hash(postInput('password'),PASSWORD_DEFAULT);
                    $token=random_bytes(50);
                    $name=postInput('firstname')." ".postInput('lastname');
                    $email=postInput('email');
                    $phone=postInput('phone');
                    $address=postInput('address');
                    $status=false;
            
                    $sql = "INSERT INTO userss (name,email,phone,address,password,status,token) VALUES (?,?,?,?,?,?,?)";
                    $stmt = $connect->prepare($sql);
                    $stmt->bind_param('sssssis',$name,$email,$phone,$address,$password,$status,$token);
                    if($stmt->execute()){
                        $insert_id=$connect->insert_id;
                        $_SESSION['id']=$insert_id;

                        // sendVerificationEmail($email,$token);
                        $_SESSION['success']="Tạo tài khoản thành công";
                        redirectUrl("/login.php");
                    }
                    
                }
                else{
                    $_SESSION['error']="Tạo tài khoản thất bại";
                }
            }
        }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Register</title>
        <link href="<?php echo uploads("/admin/css/styles.css") ?>" rel="stylesheet" />  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="" class="form-horizontal" method="POST">
                                            <div class="clearfix"> 
                                                <!-- thong báo -->
                                                <?php require_once __DIR__."/admin/partials/notification.php"; ?>   
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" name="firstname" />
                                                        <?php if(isset($error['firstname'])): ?>
                                                            <p class="text-danger"> <?php echo $error['firstname']?> </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" name="lastname" />
                                                        <?php if(isset($error['lastname'])): ?>
                                                            <p class="text-danger"> <?php echo $error['lastname']?> </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputAddress">Address</label>
                                                <input class="form-control py-4" id="inputAddress" type="text" aria-describedby="emailHelp" placeholder="Enter address" name="address" />
                                                <?php if(isset($error['address'])): ?>
                                                    <p class="text-danger"> <?php echo $error['address']?> </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPhone">Phone</label>
                                                <input class="form-control py-4" id="inputPhone" type="number" aria-describedby="number" placeholder="Enter number phone" name="phone" />
                                                <?php if(isset($error['phone'])): ?>
                                                    <p class="text-danger"> <?php echo $error['phone']?> </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
                                                <?php if(isset($error['email'])): ?>
                                                    <p class="text-danger"> <?php echo $error['email']?> </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                                                        <?php if(isset($error['password'])): ?>
                                                            <p class="text-danger"> <?php echo $error['password']?> </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" name="confirm_password" />
                                                        <?php if(isset($error['confirm_password'])): ?>
                                                            <p class="text-danger"> <?php echo $error['confirm_password']?> </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
                                            </div>
                                            <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="#">Create Account</a></div> -->
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="http://localhost:8080/Web_BanHang/public/admin/js/scripts.js"> </script>
    </body>
</html>
