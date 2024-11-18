<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}


function uploadFile($file,$foder_upload){
    $pathStorage = $foder_upload . '_' .time().'_'.$file['name'];
    $form = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;
    if(move_uploaded_file($form,$to)){
        return $pathStorage;
    }
    return null;
}
function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if(file_exists($pathDelete)){
        unlink($pathDelete);
    }
}

 function deleteSessionError(){
    if(isset($_SESSION['flast'])){
        unset($_SESSION['flast']);
        session_unset();
        session_destroy();
    }
 }

