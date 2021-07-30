# CRUD-Book
## Тех. требования
- composer 1.8.6
- Symfony 4.4.x
- PHP 7.2.x
- MySQL 5.7
## Запуск
Чтобы не разворачивать среду локально, можно запустить докер контейнеры командой:
```bash
docker-compose up --build -d
```
Далее зайти в контейнер:
```bash
docker exec -it php bash
```
И запустить проект: 
```bash
composer install
```
## База данных
Модель данных выглядит следующим образом

<img src="https://i.ibb.co/hf4rJQJ/class.png" alt="class" border="0">

В папке `/migrations` уже имеется файл миграции. Чтобы начать миграцию нужно выполнить команду:
```bash
symfony console doctrine:migrations:migrate
```
## crud admin
После того как мы установили все зависимости и настроили базу данных, можно приступать к работе с админкой. 
При переходе на [http://localhost:8083/](http://localhost:8083/) у нас должна появится главаня страницы нашей админки.

<img src="https://i.ibb.co/d6TXXVV/image.png" alt="image" border="0">
