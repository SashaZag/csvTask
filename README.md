Для запуска и корректной работы нуже сервер (Apache). Для Windows: положить папку csvTask (если у Вас установлен XAMPP) в папку /xampp/htdocs и переходить по урлу http://localhost/csvTask и все должно работать
Для Linux: положить папку csvTask в /var/www/html, и поменять права на директорию, чтоб было проще (chmod -R 777 /var/www/html/csvTask) и так же перейти по ссылке http://localhost/csvTask и все заведется 
Так же в файлу CoreModel.php нужно поменять креды от базы на Ваши
