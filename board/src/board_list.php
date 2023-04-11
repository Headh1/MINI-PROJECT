<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
include_once( URL_DB );
// $http_method=$_SERVER["REQUEST_METHOD"];

if(array_key_exists("page_num",$_GET)){
    // $ar_get = $_GET;
    $page_num = $_GET["page_num"];
}
else{
    $page_num = 1;
}


$limit_no=5;

$re_c = board_count();

$max_page = ceil((int)$re_c[0]["cnt"]/$limit_no);

$offset = ($page_num*$limit_no) - $limit_no;


$arr_p = array("limit_no"=>$limit_no , "offset"=>$offset);
$re_p = select($arr_p);

// echo $max_page;
// print_r($re_c);
// print_r($re_p);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/board.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <title>toy project_게시판</title>
</head>
<body>
    <header>
        <h1> CRIME SCENE </h1>
        <nav>
            <ul class ="menu">
                <li>1</li>
                <li>2</li>
                <li>3</li>
            </ul>
            <ul>
                <li>ㄹ</li>
            </ul>
        </nav>
    </header>
    <table>
        <thead>
            <tr class = "tr_th">
                <th>No</th>
                <th class= "titlee">제목</th>
                <th class= "w_date">일자</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach( $re_p as $recode){
                ?>
                <tr>
                    <td> <?php echo $recode["board_no"] ?> </td>
                    <td> <a href="board_update.php?board_no=<?php echo $recode["board_no"] ?>" class ="list"><?php echo $recode["board_title"] ?></a> </td>
                    <td> <?php echo $recode["write_date"] ?> </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class = "aa">
        <?php
        if ($max_page > 1 && $page_num > 1) { ?>
            <a href="board_list.php?page_num=<?php echo $page_num - 1; ?>"class="left_page"> < </a>
        <?php
            }
        ?>

        <?php
        for($i = 1; $i<=$max_page; $i++ ){
            if($page_num==$i){?>
                <a href="board_list.php?page_num=<?php echo $i; ?>" class="nomal"><?php echo $i ?> </a>
        <?php
            }
        else{?>
            <a href="board_list.php?page_num=<?php echo $i; ?>" class = "active"><?php echo $i ?> </a>
        <?php } }
        ?>

        <?php
        if ($max_page > 1 && $page_num < $max_page) { ?>
            <a href="board_list.php?page_num=<?php echo $page_num + 1; ?>" class= "right_page"> > </a>
        <?php
        }
        ?>
    </div>

</body>
</html>