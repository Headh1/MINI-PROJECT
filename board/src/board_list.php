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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <title>toy project_게시판</title>
    <style>
        body{
            display:flex;
            flex-wrap : wrap;
            flex-direction : column;
            width : 1200px;
        }
        table{
            /* border: 1px solid black; */
            border-collapse : collapse;
            Text-align: center;
            width : 500px;
            /* justify-content :center; */
            align-content : center;
        }
        th{
            background-color : #a2d2ff;
        }
        a{
            padding : 20px;
            /* margin: 10px; */
            /* background-color : #a0c4ff; */
            /* flex-direction : row; */
        }
        h1{
            /* display : flex; */
            /* justify-content: center; */
            Text-align: center;
        }
        .aa{
            display: flex;
            flex-wrap : nowrap;
            flex-direction : row;
            justify-content :center;
        }
    </style>
</head>
<body>
    <h1> mini project - 게시판 </h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>제목</th>
                <th>일자</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach( $re_p as $recode){
                ?>
                <tr>
                    <td> <?php echo $recode["board_no"] ?> </td>
                    <td> <?php echo $recode["board_title"] ?> </td>
                    <td> <?php echo $recode["write_date"] ?> </td>
                </tr>
            <?php
            }
            ?>
            <!-- <tr>
                <td>1</td>
                <td>제목1</td>
                <td>2023-04-08</td>
            </tr>
            <tr>
                <td>2</td>
                <td>제목2</td>
                <td>2023-04-09</td>
            </tr>
            <tr>
                <td>3</td>
                <td>제목3</td>
                <td>2023-04-10</td>
            </tr> -->
        </tbody>
    </table>
    <div class = "aa">
    <?php
    for($i = 1; $i<=$max_page; $i++ ){
?>
    <a href="board_list.php?page_num=<?php echo $i; ?>"><?php echo $i?> </a>
    
    <?php
    }
    ?>
    </div>

</body>
</html>