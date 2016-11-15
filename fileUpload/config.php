<?php
    class myUtil_FILE
    {
        /**
        * @brief 提供下载功能，中英文的内容均支持
        * @param $file 文件所在路径
        * @param $fileName 文件名称
        **/
        public static function download($file,$fileName){
            $fileName=iconv("utf-8","gb2312",$fileName); 
            $filePath = $file.$fileName;
            if(!file_exists($filePath)){
                echo "no file";
                return;
            }
            $fi = fopen($filePath,'r');
            $file_size = filesize($filePath);
            //提供下载功能，需要告诉客户端传输的是文件,主要就是Header的设置
            Header("Content-type:application/octet-stream");
            Header("Accept-Ranges:bytes");
            Header("Accept-Length:".$file_size);
            Header("Content-Disposition:attachment;filename=".$fileName);
            $buffer = 1024;
            $file_count = 0;
            while(!feof($fi) && $file_count < $file_size){
                $file_count+=$buffer;
                echo fread($fi,$buffer);
            }
               fclose($fi);
        }
        public static function upload($fileSavePath,$fileParamName){
            $name = $_FILES["file"]["name"];
            //$name = $time.$name;
            move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$name");

        }

        public static function createNewFile($fileName,$filePath){

        }

        public static function addContent($file,$content){

        }

        public static function readContent($file,$filePath){
            
        }
    }
?>