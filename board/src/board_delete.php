<?php
define( "DOC_ROOT",$_SERVER["DOCUMENT_ROOT"]."/" );
define( "URL_DB",DOC_ROOT."board/src/common/db_common.php" );
include_once( URL_DB );

$arr_get=$_GET;

$re_c = delete_info($arr_get["board_no"]);

header("Location: board_list.php");
exit();
?>