# test-box-storage

Сама реализация хранилища лежит в папке `src/Box`

Чтобы проверить работоспособность хранилища необходимо:
- заполнить данные для соединения с базой данных в файле `config.php` (используется подключение к mysql);
- запустить в консоли файл `install.php` (чтобы создалась нужная для хранилища таблица);
- запустить в консоли файл `index.php`, в котором проверяется функционал работы хранилища.
