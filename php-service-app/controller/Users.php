<?php

$url = $_SERVER['REQUEST_URI'];

//if use folder path
$urlArr = explode("index.php", $url);
if (count($urlArr) >= 2) {
    $url = $urlArr[1];
}

// if use php -S localhost:8000
if (strpos($url, "/") !== 0) {
    $url = "/$url";
}

//untuk menghandle url /users
if($url == '/users' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $users = array(
        array('id' => 1, 'name' => 'Sumatrana', 'email' => 'sumatrana@gmail.com', 'address' => 'Padang', 'gender' => 'Laki-laki'),
        array('id' => 2, 'name' => 'Jawarianto', 'email' => 'jawarianto@gmail.com', 'address' => 'Cimahi', 'gender' => 'Laki-laki'),
        array('id' => 3, 'name' => 'Kalimatanio', 'email' => 'kalimatanio@gmail.com', 'address' => 'Samarinda', 'gender' => 'Laki-laki'),
        array('id' => 4, 'name' => 'Sulawesiani', 'email' => 'sulawesiani@gmail.com', 'address' => 'Makassar', 'gender' => 'Perempuan'),
        array('id' => 5, 'name' => 'Papuani', 'email' => 'papuani@gmail.com', 'address' => 'Jayapura', 'gender' => 'Perempuan'),
    );
    echo json_encode($users);
}

//untuk menghandle url /users/(ID)
if(preg_match("/users\/([0-9])+/", $url, $mathes) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $users = array(
        '1' => array('id' => 1, 'name' => 'Sumatrana', 'email' => 'sumatrana@gmail.com', 'address' => 'Padang', 'gender' => 'Laki-laki'),
        '2' => array('id' => 2, 'name' => 'Jawarianto', 'email' => 'jawarianto@gmail.com', 'address' => 'Cimahi', 'gender' => 'Laki-laki'),
        '3' => array('id' => 3, 'name' => 'Kalimatanio', 'email' => 'kalimatanio@gmail.com', 'address' => 'Samarinda', 'gender' => 'Laki-laki'),
        '4' => array('id' => 4, 'name' => 'Sulawesiani', 'email' => 'sulawesiani@gmail.com', 'address' => 'Makassar', 'gender' => 'Perempuan'),
        '5' => array('id' => 5, 'name' => 'Papuani', 'email' => 'papuani@gmail.com', 'address' => 'Jayapura', 'gender' => 'Perempuan'),
    );
    $users = $users[$matches[1]];

    echo json_encode($users);
}
?>