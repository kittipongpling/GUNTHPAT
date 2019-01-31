<?php
require_once("BaseModel.php");

class Gallery extends BaseModel{
    
    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getgallery() {
        $sql = " SELECT *
        FROM `tb_gallery`
        LEFT JOIN tb_gallery_type ON tb_gallery.gallery_type_id = tb_gallery_type.gallery_type_id
        WHERE 1
        ORDER BY tb_gallery.gallery_id
        ";
        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    
    function getgalleryHead() {
        $sql = " SELECT *
        FROM `tb_gallery_head`
        WHERE 1
        ORDER BY tb_gallery_head.gallery_head_id
        ";
        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

        
    function editGalleryHead($gallery_head_id, $gallery_head_sub_title) {
        
        $sql = "UPDATE `tb_gallery_head` SET `gallery_head_sub_title` = '$gallery_head_sub_title' WHERE `tb_gallery_head`.`gallery_head_id` = 1 
        ";
        // echo "<pre>";
        // print_r( $sql);
        // echo "</pre>";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    
    
    function getGalleryRecommened() {
        $sql = " SELECT *
        FROM `tb_gallery`
        LEFT JOIN tb_gallery_type ON tb_gallery.gallery_type_id = tb_gallery_type.gallery_type_id 
        WHERE tb_gallery.gallery_recommened = 1
        ORDER BY tb_gallery.gallery_id
        ";
        // echo "<pre>";
        // print_r();
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getGalleryType() {
        $sql = " SELECT * 
        FROM `tb_gallery_type` 
        WHERE 1
        ORDER BY tb_gallery_type.gallery_type_id
        ";
        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function deleteGallery($gallery_id) {
        $sql = "DELETE 
        FROM `tb_gallery` 
        WHERE `tb_gallery`.`gallery_id` = '$gallery_id'
        ";
        // echo "<pre>";
        // print_r();
        // echo "</pre>";
       

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }
    
    
    function editGalleryRecommened($gallery_id,$gallery_recommened) {
      
        $sql = "UPDATE `tb_gallery` SET `gallery_recommened` = '$gallery_recommened' WHERE `tb_gallery`.`gallery_id` = '$gallery_id'
        ";
        echo "<pre>";
        print_r( $sql);
        echo "</pre>";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    function editGallery($gallery_id,$data = []) {
        $data['gallery_name']=mysqli_real_escape_string(static::$db,$data['gallery_name']);
        $data['gallery_type_id']=mysqli_real_escape_string(static::$db,$data['gallery_type_id']);
        $data['gallery_img']=mysqli_real_escape_string(static::$db,$data['gallery_img']);

        $sql = "UPDATE `tb_gallery` 
        SET `gallery_name` = '".$data['gallery_name']."', 
         `gallery_type_id` = '".$data['gallery_type_id']."', 
         `gallery_img` = '".$data['gallery_img']."'
        WHERE `tb_gallery`.`gallery_id` = '$gallery_id'
        ";
        echo "<pre>";
        print_r( $sql);
        echo "</pre>";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function addGallery($data = []) {
        $data['gallery_name']=mysqli_real_escape_string(static::$db,$data['gallery_name']);
        $data['gallery_type_id']=mysqli_real_escape_string(static::$db,$data['gallery_type_id']);
        $data['gallery_img']=mysqli_real_escape_string(static::$db,$data['gallery_img']);

        $sql = "INSERT INTO `tb_gallery`(
            `gallery_id`, 
            `gallery_name`, 
            `gallery_img`, 
            `gallery_type_id`) 
            VALUES (
                NULL, 
                '".$data['gallery_name']."', 
                '".$data['gallery_img']."' ,
                '".$data['`gallery_type_id`,']."'
                )
        
        
        ";
        echo "<pre>";
        print_r( $sql);
        echo "</pre>";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

}
?>