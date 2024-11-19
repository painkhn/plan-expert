**Установка**
- Установить PHP <a>https://www.php.net/downloads</a>
- Установить Nodejs <a>https://nodejs.org/en/download</a> **Не меньше 19 версии**
- Установить Composer <a>https://getcomposer.org/</a>
- Клонировать репозиторий `git clone <link>`
- Скачать модули node `npm install`
- Установить composer `Composer i`, если ошибки - `composer install --ignore-platform-reqs`
---
**Запуск**
- Создать файл конфигурации с примера `Copy .env.example .env` <br>
- Отредактировать файл конфигурации (`.env`) <br>
- Создать ключ приложения `php artisan key:generate`
- Мигрировать таблицы `php artisan migrate`
- Запустить приложения `npm run dev` и `php artisan serve`
---
Доп. комманды: 
- Запуск тестов - `npm run dev` и `php artisan test` (БД очистится)
--- 
Используемый стек: 
* Laravel
* Tailwind
