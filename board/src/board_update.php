<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
define( "URL_HEADER", DOC_ROOT."board/src/board_header.php" );
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
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
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
    <h2> 게시글 수정 </h2>
    <form method = "post" action="board_update.php">
        <label for="bno">번호</label>
        <input type="text" name="board_no" id="bno" value="<?php echo $re["board_no"]?>" readonly >
        <br>
        
        <label for="title">제목</label>
        <input type="text" name="board_title" id="title" value="<?php echo $re["board_title"]?>" >
        <br>
        
        <label for="contents">내용</label>
        <input type="text" name="board_contents" id="contents" value="<?php echo $re["board_contents"]?>" >
        <br>
        
        <div>
            <button type="submit">수정</button>
            <button type="submit"><a href="board_detail.php?board_no=<?php echo $re["board_no"]?>" class="back_b">back </a></button>
        </div>
    </form>
    </main>
</body>
</html>