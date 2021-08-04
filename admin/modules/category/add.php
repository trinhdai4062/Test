
    <?php
        $open="category";
        require_once __DIR__."/../../autoload/autoload.php"; 
        if($_SERVER['REQUEST_METHOD']=='POST'){


            $data=
            [
                "TenLoaiSanPham"=> postInput('name'), 
                "HinhAnhLoaiSanPham"=> postInput('img'),    
                
            ];
            $error=[];
            if(postInput('name')==''){
                $error['name']="Mời bạn nhập tên sản phẩm";
            }
            if(postInput('img')==''){
                $error['img']="Mời bạn nhập đường dẫn hình ảnh";
            }
            // error '' co nghia k co loi

            if(empty($error)){

                $isset=$db->fetchOne("loaisanpham","TenLoaiSanPham='".$data['name']."'");

                if(count($isset)>0) {
                    $_SESSION['error']="Tên loại sản phẩm đã tồn tại";
                }
                else{
                    $id_insert=$db->insert("loaisanpham",$data);
                    if($id_insert>0){
                        $_SESSION['success']="Thêm mới thành công";
                        redirectUrl("/admin/modules/category");
                    }
                    else{
                        $_SESSION['error']="Thêm mới thất bại";
                        // ket noi thats bai
                    }
                }
               
            }
        }
    ?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                            <h1 class="mt-4">Loại sản phẩm </h1>
                            <hr style="margin-top: -5px;">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                <i class="fa fa-tachometer-alt fa-w-18"></i>
                               <a href="<?php echo base_url() ?>/admin/"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Loại sản phẩm</li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="clear-fix">
                              <!-- thong báo -->
                             <?php require_once __DIR__."/../../partials/notification.php"; ?> 
                        </div>                   
                            
                        <div class="row">
                            <div class="col-md-12">
                               
                                <form action="" class="form-horizontal" method="POST">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Thêm loại sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="category" name="name" placeholder="Tên loại sản phẩm">
                                            <?php if(isset($error['name'])): ?>
                                                <p class="text-danger"> <?php echo $error['name']?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top:10px;" for="inputEmail3" class="col-sm-1 control-label">Hình ảnh</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="category" name="img" placeholder="Đường dẫn hình ảnh">
                                            <?php if(isset($error['img'])): ?>
                                                <p class="text-danger"> <?php echo $error['img']?> </p>
                                            <?php endif; ?>
                                        </div>

                                        
                                        <!-- <div class="custom-file col-md-4">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="thunbar">
                                            
                                                <?php //if(isset($error['thunbar'])): ?>
                                                <p class="text-danger"> <?php // echo $error['thunbar']?> </p> 
                                                <?php //endif; ?>
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" style="margin-left:20PX;width:150px;">Lưu</button>
                                    </div>
                                    
                                </form>
                                
                            </div>    
                        </div>

                        
 
                    </div>
                </main>
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
        <?php require_once __DIR__."/../../layouts/footer.php";?>
       