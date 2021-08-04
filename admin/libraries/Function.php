<?php

function postInput($string){
    return isset($_POST[$string]) ? $_POST[$string]:"";
   
}

function getInput($string){
    return isset($_GET[$string]) ? $_GET[$string]:"";
   
}

function base_url(){
    return $url="http://localhost:8080/BH_Android/";
    //return $url="https://daiok.000webhostapp.com/BH_Android/";
    
}

function modules($url){
    return $k="".base_url()."admin/modules/".$url;
}
function uploads($url){
    return $k="".base_url()."admin/public/".$url;
}

 //  url tro ve 
if ( ! function_exists('redirectUrl'))
{
    function redirectUrl($url = '')
    {
        header("Location: ".base_url(). "{$url}");
        exit();
    }
}
///random
if( !function_exists('random_bytes') )
{
    function random_bytes($length)
    {
        $characters = '123456789qwertyuiopasdfghjklzxcvbnm';
        $characters_length = strlen($characters);
        $output = '';
        for ($i = 0; $i < $length; $i++)
            $output .= $characters[rand(0, $characters_length - 1)];

        return $output;
    }
}

// chuyen doi co dau thành khongdau
function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/','-', $str);
    return $str;
}

if( ! function_exists('str_slug'))
{
    // convert duong dan than thien
    function str_slug($str,$default = '-') {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/',$default, $str);
        return $str;
    }
}

if(!function_exists('xss_clean')){

    function xss_clean($data){
        
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                    // Remove really unwanted tags
                    $old_data = $data;
                    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);

            // we are done...
            return $data;
    }
}


if ( ! function_exists( 'dd' ))
{
    /**
     * @param $data
     */
    function dd( $data ) {
        echo '<pre class="sf-dump" style=" color: #222; overflow: auto;">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';
        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);
        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';
        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
    }
}



if ( ! function_exists('formatPrice'))
{
    // dinh dang lai gia tien
    function formatPrice($number , $sale = 0)
    {

        $price = $sale != 0 ? $price = $number*(100 - $sale)/100  : $number;
        return number_format($price, 0,',','.') ;
    }

}
if ( ! function_exists('money'))
{
    // dinh dang lai gia tien
    function money($number , $sale = 0)
    {

        $price = $sale != 0 ? $price = $number*(100 - $sale)/100  : $number;
        return $price;
    }
}

if( ! function_exists( 'baseServerName'))
{
    // duong dan url ban dau
    function baseServerName()
    {
        return 'http://'.$_SERVER["SERVER_NAME"];
    }
}



if ( ! function_exists( 'curPageURL' ))
{
    /**
     * @return string
     * lay duong dan url hien tai
     * VD
     */
    function curPageURL() {
        $pageURL = "http";
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}

function ColorFind($string,$fild)
{
    if($string != '')
    {
        return str_replace($string,"<span style='color:red;font-size:14px'>".$string."</span>",$fild);
    }
    else
    {
        return $fild;
    }
}
if ( ! function_exists( 'createFolder' ))
{
 /**
  *  Ham tao  thuc muc 
  * return 0  => errors
  * return 1  => success
  *  tao moi thu muc
 **/
 function createFolder($path , $name)
 {
  $respons = 
  [
   'code' => 0,
   'message' => ' Thư mục '.$name.' đã tồn tại ' 
  ];
  if(is_dir($path . $name))
  {
   return $respons;
  }
  $check_create = mkdir( $path . $name, 0777); 
  if($check_create)
  {
   $respons['message']  =  ' Tạo thư mục thành công ';
   $respons['code']  =  1;
   return $respons;
  }
  $respons['message']  = ' Lỗi tạo thư mục';
  return $respons;
 }
}

if( ! function_exists( '' ))
{
 /**
  *  xoa thu muc va file tong thu muc do 
  */
 function deleteFolder($dir = null) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
         if ($object != "." && $object != "..")
         {
           if (filetype($dir."/".$object) == "dir") remove_dir($dir."/".$object);
           else unlink($dir."/".$object);
         }
      }
      reset($objects);
      rmdir($dir);
    }
 }
}

if (!function_exists('get_start_and_time'))
{
    function get_start_and_time($date_range, $config=[])
    {
        $dates = explode(' - ', $date_range);

        $start_date = date('Y-m-d', strtotime($dates[0]));
        $end_date = date('Y-m-d', strtotime($dates[1]));

        return [
            'start' => $start_date,
            'end' => $end_date
        ];
    }
}

?>