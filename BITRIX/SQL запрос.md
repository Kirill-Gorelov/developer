/**************
прямой запрос к базе
***************/
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
global $DB;
$strSql = "SELECT * FROM `table`";
$rs = $DB->Query($strSql);
$rs = $rs->Fetch();
print_r($rs);