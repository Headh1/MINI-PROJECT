<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
define( "URL_HEADER", DOC_ROOT."board/src/board_header.php" );
include_once( URL_DB );
// $http_method=$_SERVER["REQUEST_METHOD"];

if(array_key_exists("page_num",$_GET)){
    // $ar_get = $_GET;
    $page_num = $_GET["page_num"];
}
else{
    $page_num = 1;
}


$limit_no=7;

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
    <link rel="stylesheet" href="./css/all.css">
    <title>toy project_게시판</title>
</head>
<body>
    <?php include_once( URL_HEADER );?>
    <main>
        <nav>
            <ul>
                <li><a href="board_list.php" class="img1">자유게시판</a></li>
                <li><a href="/real/real_list.php" class="img2">real-world</a></li>
                <li><a href="#" class="img3">ledagames</a></li>
                <li><a href="#" class="img4" >크라임씬</a></li>
            </ul>
        </nav>
        <table>
            <thead>
                <tr class = "tr_th">
                    <th class= "nono">No</th>
                    <th class= "titlee">TITLE</th>
                    <th class= "w_date">DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach( $re_p as $recode){
                    ?>
                    <tr>
                        <td> <?php echo $recode["board_no"] ?> </td>
                        <td> <a href="board_detail.php?board_no=<?php echo $recode["board_no"] ?>" class ="list"><?php echo $recode["board_title"] ?></a> </td>
                        <td> <?php echo $recode["write_date"] ?> </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <a href="board_insert.php"><button type="button" class = "button_i">작성</button></a>
        
        <div class = "aa">
            <a href="board_list.php?page_num=1"class="left_page"> << </a>
            <?php
                if ($max_page > 1 && $page_num > 1) { 
            ?>
            
            <a href="board_list.php?page_num=<?php echo $page_num - 1; ?>"class="left_page"> < </a>
            
            <?php
                } 
            ?>
            
            <?php
                for($i = 1; $i<=$max_page; $i++ ){
                if($page_num==$i){
            ?>
            
            <a href="board_list.php?page_num=<?php echo $i; ?>" class="active"><?php echo $i ?> </a>
            
            <?php
                }
                else{
            ?>

            <a href="board_list.php?page_num=<?php echo $i; ?>" class = "nomal"><?php echo $i ?> </a>
            
            <?php 
                    } 
                }
            ?>

            <?php
                if ($max_page > 1 && $page_num < $max_page) { 
            ?>
            
            <a href="board_list.php?page_num=<?php echo $page_num + 1; ?>" class= "right_page"> > </a>
            
            <?php
                }   
            ?>
            
            <a href="board_list.php?page_num=<?php echo $max_page; ?>" class= "right_page"> >> </a>
        </div>
    </main>
</body>
</html>