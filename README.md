Разработано REST API для записной книжки .
Структура методов (из ТЗ): 


    1.1. GET /api/v1/notebook/
    1.2. POST /api/v1/notebook/
    1.3. GET /api/v1/notebook/<id>/
    1.4. POST /api/v1/notebook/<id>/
    1.5. DELETE /api/v1/notebook/<id>/
    
Разработано REST API для записной книжки . Структура методов (сверх ТЗ):


    1.6. GET /api/v2/notebook/<offset>/<limit>/
    1.7. PUT /api/v2/notebook/<id>/
    1.8. PATCH /api/v2/notebook/<id>/
    
Создан интерфейс и есть возможность выводить информацию в списке по странично

Для запуска из Docker контейнера:


    git clone https://github.com/shdtd/jtAPI.git
    cd jtAPI/
    
    docker-compose build php
    docker-compose up -d
	docker-compose exec -u root php ./install
	
Интерфейс доступен по адресу: 
http://localhost:8000/

API по адресу: 
http://localhost:8000/api/версия/контроллер/параметры/

Пример API запроса: 
http://localhost:8000/api/v2/notebook/3/5/

Вернет срез записей, а именно, пропустит первые три записи, начиная с четвёртой выведет пять записей.

