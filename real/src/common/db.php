<?php

function db( &$p_co){
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
        $p_co = new PDO($dns, $user, $pass, $op);
    }
    catch( Exception $e){
        $p_co = null;
        throw new Exception($e->getmessage());
    }
}
    
function select(&$p_arr){
    $sql = " SELECT real_no, real_title, real_contents,write_date from real_info where del_flg='0'order by real_no desc
            limit :limit_no offset :offset";
    
    $arr=array(":limit_no"=>$p_arr["limit_no"],":offset"=>$p_arr["offset"]);

    $conn=null;
    try{
        db($conn);
        $st = $conn->prepare($sql);
        $st->execute($arr);
        $re=$st->fetchall();
    }
    catch( Exception $e){
        return $e->getmessage();
    }
    finally{
        $conn = null;
    }
    return $re;
}
?>