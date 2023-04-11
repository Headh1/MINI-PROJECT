<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
include_once( URL_DB );

$http_method = $_SESSION["REQUEST_METHOD"];
if($http_method === "GET"){
    $board_no=1;
    if(array_key_exists(" board_no",$_GET)){
        $board_no = $_GET["board_no"];
    }
    $re= info_no( $board_no );
}
else{
    print_r($_POST);
}

// print_r($re);
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
    </form>
</body>
</html>