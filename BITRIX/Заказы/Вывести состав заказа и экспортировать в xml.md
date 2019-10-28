```
<?php 
define( "NO_AGENT_CHECK" , true );
define( "NO_KEEP_STATISTIC" , true );

require_once ( $_SERVER [ "DOCUMENT_ROOT" ]. "/bitrix/modules/main/include/prolog_before.php" );

/**************************** */
function array_php_to_xml(array $arr, SimpleXMLElement $xml) {
    foreach ($arr as $k => $v) {
        $attrArr = array();
        $kArray = explode(' ',$k);
        $tag = array_shift($kArray);
        if (count($kArray) > 0) {
            foreach($kArray as $attrValue) {
                $attrArr[] = explode('=',$attrValue);                   
            }
        }
        if (is_array($v)) {
            if (is_numeric($k)) {
                array_php_to_xml($v, $xml);
            } else {
                $child = $xml->addChild($tag);
                if (isset($attrArr)) {
                    foreach($attrArr as $attrArrV) {
                        $child->addAttribute($attrArrV[0],$attrArrV[1]);
                    }
                }                   
                array_php_to_xml($v, $child);
            }
        } else {
            $child = $xml->addChild($tag, $v);
            if (isset($attrArr)) {
                foreach($attrArr as $attrArrV) {
                    $child->addAttribute($attrArrV[0],$attrArrV[1]);
                }
            }
        }               
    }
    return $xml;
}

function arrayToXml($array){
    $xml = array_php_to_xml($array, new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><items></items>"))->asXML();
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = FALSE;
    $dom->loadXML($xml);
    $dom->formatOutput = TRUE;
    return $dom->saveXml();
}
/***************************** */




 if ( ! $GLOBALS [ 'USER' ]->IsAdmin() )
{
  die ( "Доступно только для администратора." );
}

CModule::IncludeModule( 'sale' );
CModule::IncludeModule( 'catalog' );

/********************************* */
// https://mrcappuccino.ru/blog/post/work-with-order-bitrix-d7

$arrToXml_suc = [];
$arrToXml['items'] = [];
$arFilter = array();// При необходимости использовать параметры фильтрации
$db_sales = CSaleOrder::GetList(array(), $arFilter);
while ($ar_sales = $db_sales->Fetch()) {
    // $arr[] = $ar_sales[ID]; // массив со списком заказов
    // $order = \Bitrix\Sale\Order::loadByAccountNumber($ar_sales[ID]);
    $order = \Bitrix\Sale\Order::load($ar_sales[ID]);
    // var_dump($order);
    // var_dump($ar_sales);
    // var_dump($order->isPaid());


$arrToXml['item']['id'] = $order->getId();

$dbRes = \Bitrix\Sale\PropertyValueCollection::getList([
    'select' => ['*'],
    'filter' => [
        '=ORDER_ID' => $ar_sales['ID'], 
    ]
]);

while ($item = $dbRes->fetch()){
    // var_dump($item);
    if ($item["CODE"] == "PHONE"){
        $arrToXml['item']['phone'] = htmlspecialchars($item["VALUE"]);
    }

    if ($item["CODE"] == "EMAIL"){
        $arrToXml['item']['email'] = htmlspecialchars($item["VALUE"]);
    }

    if ($item["CODE"] == "FIO"){
        $fio = explode(' ', $item['VALUE']);
        $arrToXml['item']['name'] = htmlspecialchars($fio['0']);
        $arrToXml['item']['fname'] = htmlspecialchars($fio['1']);
        $arrToXml['item']['sname'] = htmlspecialchars($fio['2']);
    }

    if ($item["CODE"] == "ADDRESS"){
        $arrToXml['item']['adress'] = htmlspecialchars($item["VALUE"]);
    }
}

$res = CSaleBasket::GetList(array(), array("ORDER_ID" => $ar_sales['ID'])); // ID заказа

$arrToXml['item']['products'] = [];
while ($arItem = $res->Fetch()) {
    // var_dump($arItem);
    $arrToXml['item']['products']['product'][] = array('name'=>$arItem['NAME'], 'price'=>$arItem['BASE_PRICE']);
}

$arrToXml['item']['type_delivery'] = $ar_sales['DELIVERY_ID'];
$arrToXml['item']['comments'] = '';
$arrToXml['item']['payment_data'] = 'empty';
$arrToXml['item']['type_payment'] = $ar_sales['PAY_SYSTEM_ID'];
$arrToXml['item']['status_order'] = $order->isPaid();
// $arrToXml['item']['price'] = $order->getPrice(); //TODO:в тз это поле не нужно, но как заготовку оставлю
$arrToXml['item']['date'] = $ar_sales['DATE_INSERT'];
// $arrToXml = array('items'=>array('item'=>$arrToXml['item']));
$arrToXml = array('item'=>$arrToXml['item']);
$arrToXml_suc[] = $arrToXml;
}


// var_dump(count(glob('./*.xml')));
$count_file = count(glob('./*.xml'));
$number_file = $count_file + 1;
if ($number_file < 10) {
    $number_file = '0'.$number_file;
}
// var_dump(arrayToXml($arrToXml_suc));
$resultXmlArr = arrayToXml($arrToXml_suc);
$r = file_put_contents('./order_'.$number_file.'.xml', $resultXmlArr);
// var_dump($r);

/*********************** */

?> 
```