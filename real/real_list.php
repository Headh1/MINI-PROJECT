<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/");
define( "URL_DB" ,DOC_ROOT."real/src/common/db.php");
include_once( URL_DB );

if(array_key_exists("page_num",$_GET)){
    $page_num = $_GET["page_num"];
}
else{
    $page_num = 1;
}

$limit_no=7;
$offset= ($page_num*$limit_no) - $limit_no;

$arr_p = array("limit_no"=>$limit_no , "offset"=>$offset);
$re_p = select($arr_p);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead></thead>
            <tr>
                <th>NO</th>
                <th>TITLE</th>
                <th>DATE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($re_p as $rec){ ?>
            <tr>
                <td> <?php echo $rec["real_no"] ?> </td>
                <td> <a href="#"><?php echo $rec["real_title"] ?></a></td>
                <td> <?php echo $rec["write_date"] ?> </td>
            </tr>
            <?php
            } ?>
        </tbody>
    </table>
</body>
</html>