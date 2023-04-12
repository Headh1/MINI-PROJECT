<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "GET"){
    $board_no=1;
    if(array_key_exists("board_no",$_GET)){
        $board_no = $_GET["board_no"];
    }
    $re= select_info( $board_no );
}
else{
    $ar_p=$_POST;
    $arr=array(
            "board_no"=>$ar_p["board_no"]
            ,"board_title"=>$ar_p["board_title"]
            ,"board_contents"=>$ar_p["board_contents"]
        );

    $re_c = update_info($arr);

    // $re= select_info( $ar_p["board_no"] );

header("Location: board_detail.php?board_no=".$ar_p["board_no"]);
exit();

}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/update.css">
    <title>Document</title>
</head>
<body>
<header>
        <h1> CRIME SCENE </h1>
        
    </header>
    <main>
        <h3> </h3>
    <form method = "post" action="board_update.php">
    <label for="bno">게시글 번호 : </label>
    <input type="text" name="board_no" id="bno" value="<?php echo $re["board_no"]?>" readonly >
    <br>
    <label for="title">게시글 제목 : </label>
    <input type="text" name="board_title" id="title" value="<?php echo $re["board_title"]?>" >
    <br>
    <label for="contents">게시글 내용 : </label>
    <input type="text" name="board_contents" id="contents" value="<?php echo $re["board_contents"]?>" >
    <br>
    <button type="submit">수정</button>
    <br>
    <button type="submit">
    <?php 
    if($re["board_no"]>=1 && $re["board_no"]<6){ ?>
            <a href="board_list.php?page_num=<?php echo 5?>" 
            class="back_b">back </a><?php
        } 
    else if($re["board_no"]>=6 && $re["board_no"]<11){ ?>
            <a href="board_list.php?page_num=<?php echo 4?>"
            class="back_b">back</a> <?php
        } 
    else if($re["board_no"]>=11 && $re["board_no"]<16){ ?>
            <a href="board_list.php?page_num=<?php echo 3?>"
            class="back_b">back</a><?php
        }
    else if($re["board_no"]>=16 && $re["board_no"]<21){ ?>
            <a href="board_list.php?page_num=<?php echo 2?>"
            class="back_b">back</a><?php
        }
    else{ ?>
        <a href="board_list.php?page_num=<?php echo 1?>"
            class="back_b">back</a><?php
    }
        ?>
    </button>
    </form>
    </main>
</body>
</html>