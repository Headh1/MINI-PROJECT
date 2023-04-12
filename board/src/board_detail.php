<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
include_once( URL_DB );

$arr_get = $_GET;
$re= select_info($arr_get["board_no"]);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail.css">
    <title>Detail</title>
</head>
<body>
<header>
        <h1> CRIME SCENE </h1>
        
    </header>
    <main>
    <div>
        <p>  <?php echo $re["board_no"]?> </p>
        <p> 작성일 <?php echo $re["write_date"]?> </p>
        <p> 제목 <?php echo $re["board_title"]?> </p>
        <p> <?php echo $re["board_contents"]?> </p>

    </div>
    <button type="button"><a href="board_update.php?board_no=<?php echo $re["board_no"] ?>"> 수정</a></button>
    <button type="button"><a href="board_delete.php?board_no=<?php echo $re["board_no"] ?>"> 삭제</a></button>
    <button type="button"><a href="board_list.php?board= <?php echo $re["board_no"] ?> ">취소</a></button>
    </main>
</body>
</html>