<?php
function db( &$p_conn){
    $host = "localhost";
    $user = "root";
    $pass = "root506";
    $charset = "utf8mb4";
    $name = "board";
    $dns = "mysql:host=".$host.";dbname=".$name.";charset=".$charset;
    $op = array(PDO::ATTR_EMULATE_PREPARES=>false,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
    
    try{
        $p_conn = new PDO($dns, $user, $pass, $op);
    }
    catch( Exception $e){
        $p_conn = null;
        throw new Exception($e->getmessage());
    }
}

function select(&$arr){
    $sql = "SELECT board_no,board_title, write_date
    FROM board_info
    WHERE del_flg = '0'
    ORDER BY board_no desc
    LIMIT :limit_no OFFSET :offset";

    $ar_pre = array(":limit_no"=>$arr["limit_no"] ,":offset" =>$arr["offset"]);
    

    $conn = null;
    try{
        db($conn);
        $st = $conn->prepare($sql);
        $st->execute($ar_pre);
        $re = $st->fetchall();
    }
    catch( Exception $e){
        return $e->getmessage;
    }
    finally{
        $conn = null;
    }
    return $re;
}

function board_count(){
    $sql = "SELECT COUNT(*) cnt FROM board_info WHERE del_flg = '0'";
    $arr = array();

    $conn = null;

    try{
        db($conn);
        $st = $conn->prepare($sql);
        $st->execute($arr);
        $re = $st->fetchall();
    }
    catch( Exception $e){
        return $e->getmessage;
    }
    finally{
        $conn = null;
    }
    return $re;
}

// todo : test start

// $ar = array("limit_no"=>5,"offset"=>0);
// $re = select($ar);

// print_r($re);

// todo : test end
?>