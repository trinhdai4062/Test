
    <?php
        $open="product";
        require_once __DIR__."/../../autoload/autoload.php"; 
        //danh muc san pham
        $category=$db->fetchAll("loaisanpham");

        $id=intval(getInput('id'));
        $edit_product=$db->fetchID("sanpham",$id);
        if(empty($edit_product)){
            $_SESSION['error']="Dữ liệu không tồn tại";
            redirectUrl("/admin/modules/product");
        }


        if($_SERVER['REQUEST_METHOD']=='POST'){

            //$id_lsp=$db->fetchJone("loaisanpham","SELECT ID FROM loaisanpham WHERE TenLoaiSanPham ='".postInput('TenLoaiSanPham') ."'",0,false);
            $data=
            [
                "TenSanPham"=> postInput('TenSanPham'),   
                "GiaSanPham"=> postInput("GiaSanPham"),
                "HinhAnhSanPham"=>postInput('HinhAnhSanPham'),
                "MoTaSanPham"=>postInput('MoTaSanPham'),
                "IDLoaiSanPham"=>postInput('IDLoaiSanPham'),
            ];
            // print($id_lsp['ID']);
            $error=[];
           
            // error '' co nghia k co loi

            if($edit_product['TenSanPham'] !=$data['TenSanPham']){
                if(postInput('TenSanPham')==''){
                    $error['TenSanPham']="Mời bạn nhập tên sản phẩm";
                }
                if(postInput('GiaSanPham')==''){
                    $error['GiaSanPham']="Mời bạn nhập giá sản phẩm";
                }
                if(postInput('HinhAnhSanPham')==''){
                    $error['HinhAnhSanPham']="Mời bạn nhập dường dẫn hình ảnh";
                }
                if(postInput('MoTaSanPham')==''){
                    $error['MoTaSanPham']="Mời bạn nhập nội dung sản phẩm";
                }
                if(postInput('IDLoaiSanPham')==''){
                    $error['IDLoaiSanPham']="Mời bạn chọn id loại sản phẩm";
                }
            
                if(empty($error)){
                    $isset=$db->fetchOne("sanpham","TenSanPham='".$data['TenSanPham']."'");
                    if(count($isset)>0){
                        $_SESSION['error']="Tên sản phẩm đã tồn tại.";
                    }
                    else{
                        $id_update=$db->update("sanpham",$data,array("ID"=>$id));
                        if($id_update>0){
                            $_SESSION['success']="Cập nhật thành công";
                            redirectUrl("/admin/modules/product");
                        }
                        else{
                            $_SESSION['error']="Cập nhật thất bại";
                            // ket noi thats bai
                        }
                    }
                    
                }
            }
            else{

                if(empty($error)){
                    $isset=$db->fetchOne("sanpham","TenSanPham='".$data['TenSanPham']."'");
                    if(count($isset)>0){
                        $_SESSION['error']="Tên sản phẩm đã tồn tại.";
                    }
                    else{
                        $id_update=$db->update("sanpham",$data,array("ID"=>$id));
                        if($id_update>0){
                            $_SESSION['success']="Cập nhật thành công";
                            redirectUrl("/admin/modules/product");
                        }
                        else{
                            $_SESSION['error']="Cập nhật thất bại";
                            // ket noi thats bai
                        }
                    }
                    
                }
            }
        }
    ?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                            <h1 class="mt-4">Sửa sản phẩm</h1>
                            <hr style="margin-top: -5px;">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                <i class="fa fa-tachometer-alt fa-w-18"></i>
                               <a href="<?php echo base_url() ?>/admin/"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                            <li class="breadcrumb-item active">Sửa sản phẩm</li>
                        </ol>
                        <div class="clear-fix">
                              <!-- thong báo -->
                             <?php require_once __DIR__."/../../partials/notification.php"; ?> 
                        </div>                   
                            
                        <div class="row">
                            <div class="col-md-12">
                               
                                <form action="" class="form-horizontal" method="POST">
                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Tên Loại Sản phẩm</label>
                                        <div class="col-sm-10">
                                            <select class="form-control col-md-12" name="IDLoaiSanPham" id="">
                                                <option value="">-- Mời bạn chọn id loại sản phẩm --</option>
                                                <?php foreach ($category as $item): ?>
                                                    <option value="<?php echo $item['ID']; ?>">  <?php echo $item['ID']; ?> </option>                                                 
                                                <?php endforeach ?>    
                                            </select>
                                           
                                            <?php if(isset($error['IDLoaiSanPham'])): ?>
                                                <p class="text-danger"> <?php echo $error['IDLoaiSanPham']?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="category" name="TenSanPham" placeholder="Tên sản phẩm">
                                            <?php if(isset($error['TenSanPham'])): ?>
                                                <p class="text-danger"> <?php echo $error['TenSanPham']?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="category" name="GiaSanPham" placeholder="9.000.000">
                                            <?php if(isset($error['GiaSanPham'])): ?>
                                                <p class="text-danger"> <?php echo $error['GiaSanPham']?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="HinhAnhSanPham" placeholder="Dường dẫn hình ảnh sản phẩm">
                                            <?php if(isset($error['HinhAnhSanPham'])): ?>
                                                <p class="text-danger"> <?php echo $error['HinhAnhSanPham']?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Nội dung </label>
                                        <div class="col-sm-10">
                                            <textarea name="MoTaSanPham" class="form-control" rows="8"> </textarea>
                                            <?php if(isset($error['MoTaSanPham'])): ?>
                                                <p class="text-danger"> <?php echo $error['MoTaSanPham']?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group" style="display: flex;margin:25px 0 20px 0;">
                                        <label  style="margin-top:10px;"for="inputEmail3" class="col-sm-1 control-label">Giảm giá</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" id="category" name="sale" placeholder="10 %" value="0">
                                        </div>
                                        <label style="margin-top:10px;" for="inputEmail3" class="col-sm-1 control-label">Hình ảnh</label>
                                        <div class="custom-file col-md-4">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="thunbar">
                                            
                                                <?php// if(isset($error['thunbar'])): ?>
                                                <p class="text-danger"> <?php // echo $error['thunbar']?> </p> 
                                                <?php //endif; ?>
                                        </div>
                                        
                                    </div> -->
                                  
                                   
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
       