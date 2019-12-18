## Бэкап сайта

Скрипт `backup_site` делает копию всего сайта, без исключения.  
Скрипт `backup_site_2` делает копию всего сайта, с исключением каталогов(пока не работает)  

[Сделать БЭКАП и отправить на Я.Диск](https://serveradmin.ru/bekap-sayta-wordpress-na-yandeks-disk/)  
[еще про бэкап](https://notessysadmin.com/bekap-linux-pri-pomoshhi-tar)  

>идеи. Можно отправить бэкапы на другие ФО или сделать себе уведомление на почту, что сделал бэкап.


## Бэкап БД

Скрипт `backup_db`  


##### Обязательно настроить свои пути

<hr>

## Управление пакетами

[Проблемы с зависимостями](https://help.ubuntu.ru/wiki/%D1%80%D0%B5%D1%88%D0%B5%D0%BD%D0%B8%D0%B5_%D0%BF%D1%80%D0%BE%D0%B1%D0%BB%D0%B5%D0%BC_%D1%81_%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D0%BE%D1%81%D1%82%D1%8F%D0%BC%D0%B8)   
[Управление пакетами](http://rus-linux.net/nlib.php?name=/MyLDP/BOOKS/ubuntu_hacks_ru/ubuntuhack54.html)   
[Как удалить пакеты помеченные dpkg как rc](http://prostoblog-unit.blogspot.com/2015/07/dpkg-rc.html)  
[Очистка Linux-системы Debian/Ubuntu от файлов, оставшихся после удаления пакетов](https://www.nixp.ru/recipes/50.html)  
[Памятка по управлению пакетами в Debian и Ubuntu](https://eax.me/debian-packages/)  
[Xargs: многообразие вариантов использования](https://habr.com/ru/company/selectel/blog/248207/)  


```
# dpkg —list
# dpkg —info packageName
# apt-get remove packageName
```

## Обновление  
```
sudo apt-get update
sudo apt-get upgrade
sudo apt-get update && sudo apt-get upgrade
```

## Вывести список программ  
```
dpkg -l
dpkg -l > /home/kirill/d/list.txt
dpkg --get-selections | grep -v deinstall > /home/kirill/d/list.txt
```

### Удаление программ  
```
sudo apt-get remove checkbox
sudo apt autoremove checkbox
```

## Команды LINUX  
[Команды](https://notessysadmin.com/komandy-linux)  
[Еще команды](http://blog.sedicomm.com/2017/12/19/25-poleznyh-bazovyh-komand-apt-get-i-apt-cache-dlya-upravleniya-paketami/)  
[Еще полезные команды](https://help.ubuntu.ru/wiki/%D0%BA%D0%BE%D0%BC%D0%B0%D0%BD%D0%B4%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%BE%D0%BA%D0%B0)   
[Найти измененные файлы](http://rus-linux.net/MyLDP/consol/find-recent-file.html)  
[http://www.zabrosov.ru/](http://www.zabrosov.ru/)


## Логи в LINUX  
[Основные логи в линукс](https://losst.ru/kak-posmotret-logi-v-linux)  

## Изучаем BASH  
[раз](https://www.opennet.ru/docs/RUS/bash_scripting_guide/)  
[два](https://tproger.ru/articles/bash-scripts-guide/)  
[три](https://proglib.io/p/bash-notes/)

## FIND  
[https://www.dmosk.ru/miniinstruktions.php?mini=search-linux](https://www.dmosk.ru/miniinstruktions.php?mini=search-linux)  
[https://omgubuntu.ru/25-primierov-ispolzovaniia-komandy-find-dlia-nachinaiushchikh-znakomstvo-s-linux/](https://omgubuntu.ru/25-primierov-ispolzovaniia-komandy-find-dlia-nachinaiushchikh-znakomstvo-s-linux/)  
[https://losst.ru/komanda-find-v-linux](https://losst.ru/komanda-find-v-linux)  


ls |wc -l - подсчет количества файлов в папке  
sudo lshw -class memory - моя оперативка  

```
du -d 1 -h - размер файлов в папке  
du -h|sort -r  
du -h|sort -n  
```

[настройка xampp](http://gearmobile.github.io/virtual-host-xampp-linux-mint/)    

```
find . -name "*.DOCX" -delete  
find . -name "*.csv" -delete  
find . -name "*.mp4" -delete  
find . -name "*.svg" -delete  
find . -name "*.xml" -delete  
find . -name "*.pdf" -delete  
find . -name "*.php" -delete  
find . -name "*.csv" -delete  
find . -name "*.tpl" -delete  
find . -name "*.pyc" -delete  
find . -name "*.css" -delete  
find . -name "*.css.map" -delete  
find . -name "*.js" -delete  
find . -name "*.jpg" -delete  
find . -name "*.png" -delete  

find . -type f -delete  

find ./ -type f -exec chmod 0644 {} \;  
find ./ -type d -exec chmod 0755 {} \;  
find ./ -type d -exec chmod 0777 {} \;  

ffmpeg -i '1.webm' git.gif  

sudo fuser -v /var/lib/dpkg/lock  
sudo fuser -vki /var/lib/dpkg/lock  
sudo dpkg --configure -a  
sudo rm /var/lib/dpkg/lock - удаляем в крайнем случае  
sudo dpkg --configure -a - потом снова переконфигурируем  
```