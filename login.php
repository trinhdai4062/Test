<?php
require_once __DIR__."/admin/autoload/autoload.php"; 
if($_SERVER['REQUEST_METHOD']=='POST'){
        $password=postInput('password');
        $email=postInput('email');
      
       $error=[];
       if(postInput('email')==''){
           $error['email']="Mời bạn nhập địa chỉ email";
       }
       if(postInput('password')==''){
           $error['password']="Mời bạn nhập mật khẩu";
       }
       if(empty($error)){
        //$connect=new mysqli("localhost","root","","id15957850_banhang")or die ("error connect");
        $connect=$db->link;
        $sql="SELECT * FROM userss  WHERE email=? LIMIT 1";
        $stmt =$connect->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result=$stmt->get_result();
        $users=$result->fetch_assoc();
        if(password_verify($password,$users['password'])){
            $_SESSION['id']=$users['id'];
            $_SESSION['success']="Login thành công.";
            redirectUrl("/admin/index.php");
        }
        else{
            $_SESSION['error']="Thông tin tài khoản không chính xác.";
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
        <title>Login</title>  
        <link href="<?php echo uploads("/admin/css/styles.css") ?>" rel="stylesheet" />  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="">
                                            <div class="clearfix"> 
                                                <!-- thong báo -->
                                                <?php require_once __DIR__."/admin/partials/notification.php"; ?>   
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address"  name="email"/>
                                                <?php if(isset($error['email'])): ?>
                                                    <p class="text-danger"> <?php echo $error['email']?> </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password"/>
                                                <?php if(isset($error['password'])): ?>
                                                    <p class="text-danger"> <?php echo $error['password']?> </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="<?php echo base_url() ?>/password.php">Forgot Password? </a>
                                                <button class="btn btn-primary"> Login </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
        <script src="<?php echo base_url() ?>/admin/public/admin/js/scripts.js"></script>
    </body>
</html>
