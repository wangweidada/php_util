<?php
//TODO:1,PHP 如何新建文件夹
//2,PHP $_FILES全局变量的解析
//3,PHP 如何操作file并向其中写入数据
//
  require_once("config.php");

  if(empty($_GET['userName']) || empty($_GET['logParam'])){
    echo "404";
    return;
  }
  $time = date("Y-m-d H:i:s",time());
  $day = date("Y_m_d",time()); 
  $userName = $_GET['userName'];
  $param = $_GET['logParam'];
  $fileName = $_FILES["file"]["name"];
  $fileType = $_FILES["file"]["type"]; 
  $content = "time : $time,user:$userName,param:$param,fileName:$fileName,fileType:$fileType \r\n";
  $logSysPath = $config["LOG_SYS_PATH"].$day.".log"; 
  // operation:1.create a new file,2,read all the content,3, add some content at the end;
  if(!file_exists("LOG/")){
    mkdir("LOG");
  }
  $logSysFile =fopen($logSysPath,'a'); 
  fwrite($logSysFile,$content); 

  $uploadFilePath = "upload/";
  $paramName = "file";
  myUtil_FILE::upload($uploadFilePath,$paramName);
    
/*
  $name = $_FILES["file"]["name"];
  //$name = $time.$name;
  move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$name");
  //echo "Stored in: " . . $_FILES["file"]["name"];
  */  
?>