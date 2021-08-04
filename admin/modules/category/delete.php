
<?php
        require_once __DIR__."/../../autoload/autoload.php"; 
        $id=intval(getInput('id'));

        $edit_category=$db->fetchID("loaisanpham",$id);
        if(empty($edit_category)){
            $_SESSION['error']="Dữ liệu không tồn tại";
            redirectUrl("/admin/modules/category");
        }
        
        $num=$db->delete("loaisanpham",$id);
        if($num>0){
            $_SESSION['success']="Bạn xóa thành công";
            redirectUrl("/admin/modules/category");
        }
        else{
            $_SESSION['error']="Bạn xóa thất bại";
            // ket noi thats bai
        }
    ?>