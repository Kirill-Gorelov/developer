## Определение страны и города по ip

Источники:  
https://www.geoip-db.com/json/  
```php 
<?php

    $json = file_get_contents("https://www.geoip-db.com/json");
    $data = json_decode($json);

    print $data->country_code . "<br>";
    print $data->country_name . "<br>";
    print $data->state . "<br>";
    print $data->city . "<br>";
    print $data->postal . "<br>";
    print $data->latitude . "<br>";
    print $data->longitude . "<br>";
    print $data->IPv4 . "<br>";

?>
```

https://ip-api.io/
```php 
$result = json_decode(file_get_contents('http://ip-api.io/json/64.30.228.118'));
var_dump($result);
```


https://www.iplocate.io
```php
<?php
$res = file_get_contents('https://www.iplocate.io/api/lookup/8.8.8.8');
$res = json_decode($res);

echo $res->country; // United States
echo $res->continent; // North America
echo $res->latitude; // 37.751
echo $res->longitude; // -97.822

var_dump($res);
```

http://www.geoplugin.net
```php
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$ip}"));
echo $details;
```

http://ipinfo.io
```php
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->country;
```