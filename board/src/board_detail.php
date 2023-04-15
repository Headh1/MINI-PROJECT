<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
define( "URL_HEADER", DOC_ROOT."board/src/board_header.php" );
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
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Detail</title>
</head>
<body>
<?php include_once( URL_HEADER );?>
    <main>
        <nav>
            <ul>
                <li><a href="board_list.php" class="img1">자유게시판</a></li>
                <li><a href="#" class="img2">real-world</a></li>
                <li><a href="#" class="img3">ledagames</a></li>
                <li><a href="#" class="img4" >크라임씬</a></li>
            </ul>
        </nav>
        <article>
            <p class="bno">NO.<?php echo $re["board_no"]?></p>
            <div> 
                <p class="bti"> <?php echo $re["board_title"]?></p>
                <p class = "wd"> <?php echo $re["write_date"]?></p>
            </div>

            <p class="bc"> <?php echo $re["board_contents"]?></p>


        <button type="button"><a href="board_update.php?board_no=<?php echo $re["board_no"] ?>"> 수정</a></button>
        <button type="button"><a href="board_delete.php?board_no=<?php echo $re["board_no"] ?>"> 삭제</a></button>
        <button type="button"><a href="board_list.php?board_no= <?php echo $re["board_no"] ?> ">취소</a></button>
        </article>
    </main>
</body>
</html>