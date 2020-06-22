# test-box-storage

Сама реализация хранилища лежит в папке `Box`

Чтобы проверить работоспособность хранилища необходимо:

- в базе данных создать таблицу:
    ```sql
     CREATE TABLE IF NOT EXISTS `storage` (
        `key` varchar(255) NOT NULL PRIMARY KEY,
        `value` varchar(255) DEFAULT NULL
    )  ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ```

- в классе DdBox прописать данные для подключения к базе данных;
- запустить в консоли файл `index.php`, в котором проверяется функционал работы хранилища.
