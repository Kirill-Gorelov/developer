/**************************  
Родительская папка каталога(section_id)  
**************************/  
```php
$nav = CIBlockSection::GetNavChain($ar_res["IBLOCK_ID"], $ar_res["IBLOCK_SECTION_ID"]);
$arNav=$nav->GetNext();
// print_r($arNav);
```
