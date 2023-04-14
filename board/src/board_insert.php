<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
define( "URL_HEADER", DOC_ROOT."board/src/board_header.php" );
include_once( URL_DB );

$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "POST"){
    $ar_p=$_POST;
    $re_c = insert_info($ar_p);

    header("Location: board_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert.css">
    <link rel="stylesheet" href="./css/all.css">
    <title> 게시글 작성 </title>
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
        <h2> 게시글 작성 </h2>
    <form method = "post" action="board_insert.php">
    <br>
    <label for="title">제목</label>
    <input type="text" name="board_title" id="title" >
    <br>
    <label for="contents">내용</label>
    <input type="text" name="board_contents" id="contents" >
    <br>
    <div>
    <button type="submit">작성</button>
    <button type="submit">
    <a href="board_list.php"
            class="back_b">back</a>
    </button>
    </div>
    </form>
    </main>
</body>
</html>