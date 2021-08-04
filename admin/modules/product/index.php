
<?php  
    $open="product";
    require_once __DIR__."/../../autoload/autoload.php"; 
    if(!isset($_SESSION['id'])){
        redirectUrl("login.php");
    }
    if( getInput('search') !=''){
        $product=$db->fetchJone("sanpham","SELECT * FROM sanpham WHERE TenSanPham like'%".getInput('search') ."%'",0,false);
        
    }
    else{
        $product = $db->fetchAll("sanpham");    
    }
    ?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row" >
                            <h1 class="mt-4">Danh sách sản phẩm</h1>
                            <a href="add.php" class="btn btn-success"style="width:120px;height:40px;margin:30px 25px 25px 25px;"> Thêm Mới</a>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                <i class="fa fa-tachometer-alt fa-w-18"></i>
                               <a href="<?php echo base_url() ?>/admin/"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                        <div class="clearfix"> 
                             <!-- thong báo -->
                             <?php require_once __DIR__."/../../partials/notification.php"; ?>   
                        </div>
                    
                        
                    <div class="card mb-4">
                        <div class="card-header">
                            <svg class="svg-inline--fa fa-table fa-w-16 mr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z"></path>
                            </svg>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="dataTable_length">
                                                <label>
                                                    Show 
                                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select form-control">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    entries
                                                </label>
                                            </div>
                                        </div>
                                        <form class="col-sm-12 col-md-6" method="get">
                                            <div id="dataTable_filter" class="dataTables_filter" style="text-align:left"><label>Search:<input style="width: 730px;"type="search" class="form-control" placeholder="tìm kiếm tên sản phẩm" name="search" aria-controls="dataTable"></label></div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%; text-align: center;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 100px;">STT</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;">Tên Sản Phẩm</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 100px;">Giá Sản Phẩm</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;">Hình Ảnh Sản Phẩm</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 350px;">Mô Tả Sản Phẩm</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 100px;">ID_Loại SP</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;">Lựa Chọn</th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>
                                                    <?php $stt=1; foreach ($product as $item):?>
                                                        <!-- var_dump($category);     -->
                                                        <tr role="row" class="odd">
                                                            <td class=""> <?php echo $stt ?> </td>
                                                            <td class=""> <?php echo $item['TenSanPham'] ?> </td>
                                                            <td class=""> <?php echo $item['GiaSanPham'] ?> </td>
                                                            <td class=""> <?php echo $item['HinhAnhSanPham'] ?> </td>
                                                            <!-- <td> 
                                                              //  <img src="<?php// echo uploads("uploads/") ?>product/<?php //echo $item['HinhAnhSanPham']?>" width="80px" height="80px"alt="">
                                                              <img src="data:image/png;charset=utf8;base64,<?php // echo base64_encode( $item['HinhAnh']);?>" width="80px" height="80px">
                                                            </td> -->
                                                           

                                                            <td class=""> <?php echo $item['MoTaSanPham'] ?> </td>
                                                            <td class=""> <?php echo $item['IDLoaiSanPham'] ?> </td>
                                                            <td class="">   
                                                                <a  class="btn btn-sx btn-info" href="edit.php?id=<?php echo $item['ID']?>"> <i class="fa fa-edit"></i> Sửa </a>
                                                                <a style="margin-left:10px;" class="btn btn-sx btn-success"href="delete.php?id=<?php echo $item['ID']?>"> <i class="fa fa-times"></i> Xóa </a>
                                                            </td>
                                                        </tr>
                                                   <?php $stt++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
       