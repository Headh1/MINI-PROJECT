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
    $re= info_no( $board_no );
}
else{
    $ar_p=$_POST;
    $arr=array(
            "board_no"=>$ar_p["board_no"]
            ,"board_title"=>$ar_p["board_title"]
            ,"board_contents"=>$ar_p["board_contents"]
        );

    $re_c = update_info($arr);

    $re= info_no( $ar_p["board_no"] );
}
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
    <?php if($re["board_no"]>=1){ ?>
            <a href="board_list.php?page_num=1"
            <?php
        }?> class="back_b">back</a>
        <?php else if($re["board_no"]>=6){ ?>
            <a href="board_list.php?page_num=2"
            <?php
        }?> class="back_b">back</a> </button>
    </form>
</body>
</html>