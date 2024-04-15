# Сервис сокращения ссылок

Сервис сокращения ссылок написан с пользованием PHP фреймворка Laravel.

## Установка

Для развёртывания сервиса обратитесь к документации:
- [Документация от Laravel](https://laravel.com/docs/11.x/deployment);
- [Пример документации от хостинг-провайдера](https://www.hostinger.com/tutorials/how-to-deploy-laravel).


## Возможности сервиса сокращения ссылок

Сервис сокращения ссылок позволяет:
- Сокращать ссылки, делая их более удобными для использования;
- Собирать статистику переходов по сокращённой ссылке (количество переходов и дату/время последнего перехода);
- Указывать собственный вариант сокращённой ссылки, либо использовать предложенный сервисом;
- Просматривать, редактировать и удалять свои ссылки.

## Начало использования

Для начала использования сервиса вам необходимо выполнить регистрацию, или вход, в  случае если у вас уже есть учётная запись.
На главной странице сервиса вам будет доступна:
- статистическая информация о количестве ссылок, а также последней созданной вами ссылке.
- форма для создания сокращённых ссылок.

## Использование

- Для просмотра списка созданных ранее ссылок воспользуйтесь кнопкой с изображением списка в верхнем правом углу панели. Также вы можете выбрать пункт "Shortened links" в меню  расположенном в верхнем правом углу экрана.
- Для создания новой сокращённой ссылки используйте форму на главной странице сервиса. Также вы можете выполнить переход на страницу списка ссылок (см. выше), а затем кликнуть по кнопке с изображением плюса в верхнем правом углу панели.
- Для редактирования короткой ссылки воспользуйтесь кнопкой с изображением карандаша расположенной в правой части строки списка ссылок. Для редактирования доступна следующая  информация: название ссылки, полный URL ссылки и её короткий вариант. Обратите внимание, что значение короткого варианта ссылки должно быть свободно (уникально в сервисе). Для задания значения короткой ссылки можно использовать символы латинского алфавита, а также цифры. Длинна короткой ссылки должна быть от 8 до 16 символов включительно.
- Для удаления короткой ссылки воспользуйтесь кнопкой с изображением корзины расположенной в правой части строки списка ссылок.

## REST API

Для использования REST API сперва необходимо создать токен аутентификации (см. ниже). Для аутентификации в запросе вы должны указать заголовок `Authorization` содержащий значение `Bearer ваш-токен-аутентификации`.
REST API поддерживает следующие методы:
- Просмотр списка коротких ссылок: `GET http://localhost/api/v1/urls`.
- Создание короткой ссылки: `POST http://localhost/api/v1/urls`. Пример тела запроса:
```json
{
    "orig_url": "https:\/\/google.com\/",
    "short_url_key": "VzdRlvmwsvXZuTr5",
    "name": "Google"
}
```
- Редактирование короткой ссылки: `PUT http://localhost/api/v1/urls/{id}`. Пример тела запроса:
```json
{
    "id": 1,
    "user_id": 1,
    "orig_url": "https:\/\/google.com\/",
    "short_url_key": "g00glecom",
    "name": "Google"
}

```
- Удаление короткой ссылки: `DELETE http://localhost/api/v1/urls/{id}`.

### Токены аутентификации
- Для создания нового токена выберите пункт "Authentication tokens" в меню расположенном в верхнем правом углу экрана, а затем кликните по кнопке с изображением плюса в верхнем правом углу панели. После этого в открывшемся окне укажите название токена и нажмите кнопку "Create". В результате вам будет показан ваш токен аутентификации. Скопируйте и сохраните значение данного токена. Будьте внимательны! Значение токена аутентификации показывается только один раз сразу после его создания.
- Для удаления токенов воспользуйтесь кнопкой с изображением корзины расположенной в правой части строки списка токенов.  

## Лицензия

Сервис сокращения ссылок лицензировано под лицензией [MIT license](https://opensource.org/licenses/MIT).

## Дисклеймер

Это первое приложение автора созданное с использованием фреймворка Laravel. 