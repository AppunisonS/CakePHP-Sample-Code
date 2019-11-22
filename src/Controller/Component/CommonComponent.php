<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class CommonComponent extends Component {

    function uploadFile($path, $fileData) {
        $extArr = explode('.', $fileData['name']);
        $ext = end($extArr);
        $filename = md5(microtime()) . '.' . $ext;
        $url = $path . $filename;
        if (move_uploaded_file($fileData['tmp_name'], $url))
            return $filename;
        else
            return '';
    }
/**
     * common IMAGE Process Function
     *
     * parameters are location , path , extension,and crop image portion coordinates
     * create four different size image and one original
     *
     * Add by varun
     */
  



    /**
     * Common Authorization Function
     *
     * Used for Developer users
     *
     * Added by varun
     */
   
  
      /**
     * common IMAGE Process Function
     *
     * parameters are location , path , extension,and crop image portion coordinates
     * create four different size image and one original
     *
     * Add by varun
     */
    public function imageProcessingFun($location = null, $filePath = null, $ext = null, $dataX = null, $dataY = null, $dataWidth = null, $dataHeight = null, $ImgOriginalName = null, $copy = null)
    {

        if ($copy == 2) {
            $prefix = ['large_'];
            $arraywidth = ['200'];
            $arrayHeight = ['200'];


        } else {
            $prefix = ['small_', 'Medium_', 'large_', 'extralarge_'];
            $arraywidth = ['50', '100', '200', '300'];
            $arrayHeight = ['50', '100', '200', '300'];
        }

        for ($i = 0; $i <= count($prefix) - 1; $i++) {
            $image_p = imagecreatetruecolor($arraywidth[$i], $arrayHeight[$i]);
            $image = $ext == 'png' ? imagecreatefrompng($filePath) : imagecreatefromjpeg($filePath);
            imagecopyresampled($image_p, $image, 0, 0, $dataX, $dataY, $arraywidth[$i], $arraywidth[$i], $dataWidth, $dataHeight);
            $ext == 'png' ? imagepng($image_p, "$location/$prefix[$i]$ImgOriginalName", null) : imagejpeg($image_p, "$location/$prefix[$i]$ImgOriginalName", 80);
        }
    }
}
?>