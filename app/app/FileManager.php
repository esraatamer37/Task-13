<?php 



class FileManager {

    public function upload($file)
    {
        $imgTem = $file['tmp_name'];
        $imgName = $file['name'];
        
        $nameArr = explode( '.' , $imgName);
    
        $ext = end($nameArr);
    
        $path = './images/' . time() . '.' . $ext;
    
        move_uploaded_file($imgTem, $path);

        return $path;
    }

    public function remove($path)
    {
        unlink($path);
    }
}