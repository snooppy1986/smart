Тестовое задание для фреймворка Laravel

Привет, это простое задание, суть задания оценить ваши навыки в работе с laravel, изучить стилистику написания кода.

Создать 3 миграции в базу данных с помощью Artisan:
Таблица “Жанры” с полями:
ID
Название жанра
Таблица Фильмы с полями :
ID
Название фильма
Статус публикации
Ссылка на постер
Таблица связи фильмы с жанрами
Создать seeds для тестового заполнения вышеуказанных таблиц
Создать модели, контроллеры, для создания, вывода, редактирования и удаления записей.
При создании записи в таблицу фильмы, должна происходить загрузка изображения с постером фильма ( если изображение отсутствует, к записи должно прикрепляться дефолтное изображение. Так же фильм не должен быть опубликован, публикация записи должна быть предусмотрена отдельным методом.
Создать контроллеры REST API для выборки и пагинации данных в формате json
жанры ( выводит список всех жанров)
жанры/id (выводит список всех фильмов в данном жанре с разбивкой на страницы
фильмы - выводит все фильмы с разбивкой на страницы
фильмы/id - выводит определенный фильм по ID

	Фильм всегда в себе должен содержать жанры к которым относится и ссылку на изображение

Внимание в контроллерах должно быть минимальное количество логики. Все входящие по реквесту данные должны быть отвалидированы, особенно файлы.
<ul class="list-group ">
        <li class="list-group-item">
            <p>Жанры</p>
            <p>Панель управления</p>
            <a href="http://0.0.0.0/dashboard/genres">Список всех жанров</a><br>
            <a href="http://0.0.0.0/dashboard/genre/create">Создать жанр</a>

            <p>API запросы</p>
            <p>Жанры ( выводит список всех жанров)</p>
            <p>http://0.0.0.0/api/genres</p>
            <a href="http://0.0.0.0/api/genres">Все  жанры</a><br>
            <p>Жанры/id (выводит список всех фильмов в данном жанре с разбивкой на страницы)(id=5)</p>
            <p>http://0.0.0.0/api/genre/show/5</p>
            <a href="http://0.0.0.0/api/genre/show/5">Фильмы жанра</a>
        </li>
        <li class="list-group-item">
            <p>Фильмы</p>
            <p>Панель управления</p>
            <a href="http://0.0.0.0/dashboard/films">Список всех фильмов</a><br>
            <a href="http://0.0.0.0/dashboard/film/create">Создать фильм</a>

            <p>API запросы</p>
            <p>Получить все фильмы с разбивкой на страницы</p>
            <p>http://0.0.0.0/api/films</p>
            <a href="http://0.0.0.0/api/films">Все фильмы</a><br>
            <p>Выводит определенный фильм по ID (id=5)</p>
            <p>http://0.0.0.0/api/film/show/5</p>
            <a href="http://0.0.0.0/api/film/show/5">Фильм по ID</a>
        </li>
    </ul>

