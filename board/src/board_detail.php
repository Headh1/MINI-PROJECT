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
    <title>Detail</title>
</head>
<body>
    <div>
        <p>게시글 번호 : <?php echo $re["board_no"]?> </p>
        <p>작성일 : <?php echo $re["write_date"]?></p>
        <p>게시글 제목 : <?php echo $re["board_title"]?></p>
        <p>게시글 내용 : <?php echo $re["board_contents"]?></p>

    </div>
    <button type="button"><a href:"board_update.php?board_no=</php echo $re["board_no"]" ?> 수정</a></button>
    <button type="button">삭제</button>

</body>
</html>