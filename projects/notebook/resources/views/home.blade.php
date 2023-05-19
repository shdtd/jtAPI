<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Notebook</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/offcanvas.css" rel="stylesheet">
    </head>

    <body class="bg-light">

    <nav class="navbar navbar-expand fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Notebook</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <button id="btn-new" type="button" class="btn btn-secondary">
                        <img width="16" height="16" src="/img/plus-lg.svg">
                    </button>
                </li>
            </ul>
    </nav>

    <main role="main" class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
            <img class="mr-3" src="/img/layers.svg" alt="" width="48" height="48">
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Записная книжка</h6>
                <small>Since 2023</small>
            </div>
        </div>

        <div id="root" class="my-3 p-3 bg-white rounded box-shadow">
        </div>
    </main>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование записи</h5>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modal_form" enctype="multipart/form-data" 
                                    class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                    <input type="hidden" class="form-control" id="id" name="id">
                        <label for="fullname" class="form-label">ФИО</label>
                        <input type="text"
                                class="form-control"
                                id="fullname" name="fullname" required>
                    </div>
                    <div class="col-12">
                        <label for="company" class="form-label">Компания</label>
                        <input type="text" class="form-control"
                                                id="company" name="company">
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">
                            Телефон +7 (xxx) xxx-xxxx
                        </label>
                        <input type="text"
                                class="form-control"
                                id="phone" name="phone" required>
                    </div>
                    <div class="col-12">
                        <label for="mail" class="form-label">Email</label>
                        <input type="text"
                                class="form-control"
                                id="mail" name="mail" required>
                    </div>
                    <div class="col-12">
                        <label for="birthdate" class="form-label">
                            Дата рождения ДД/ММ/ГГГГ
                        </label>
                        <input type="text" class="form-control"
                                            name="birthdate" id="birthdate">
                    </div>
                    <div class="col-12">
                        <label for="photo" class="form-label">Фото</label>
                        <input type="file"
                                id="photo"
                                name="photo"
                                class="form-control"
                                aria-label="file photo"
                                accept="image/png, image/jpeg">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save" class="btn btn-primary">Сохранить</button>
                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Отмена
                </button>
            </div>
        </div>
    </div>
</div>
        <script src="/js/jquery-3.6.4.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/App.js"></script>
        <script>
            /**
             * App(object document, object root, number MaxItemsPerPage)
             * object root = root DIV
             * number MaxItemsPerPage = Max items per page
             */
            const app = new App($("#root"), 5);

            const validate = function() {
                var forms = document.querySelectorAll('.needs-validation');
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('change', function (event) {
                            if (!form.checkValidity()) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
            };

            const getAll = function() {
                $.ajax({
                    url: 'http://localhost:8000/api/v1/notebook/',
                    method: 'get',
                    dataType: 'json',
                    data: {},
                    success: function(data){
                        if (false == data.success) {
                            return;
                        }
                        app.list(data.notebook, 1);
                        pagination(data.notebook);
                        tools();
                    }
                });
            };

            const del = function() {
                $("button.delete").click(function(e){
                    $("#id").val(e.currentTarget.id);
                    $.ajax({
                        url: 'http://localhost:8000/api/v1/notebook/'
                                + e.currentTarget.id + '/',
                        method: 'DELETE',
                        dataType: 'json',
                        data: {},
                        success: function(data){
                            if (false == data.success) {
                                return;
                            }
                            getAll();
                        }
                    });
                });
            };

            const tools = function() {
                $("button.tools").click(function(e){
                    $("#id").val(e.currentTarget.id);
                    $.ajax({
                        url: 'http://localhost:8000/api/v1/notebook/'
                                + e.currentTarget.id + '/',
                        method: 'get',
                        dataType: 'json',
                        data: {},
                        success: function(data){
                            if (false == data.success) {
                                return;
                            }
                            $("#fullname").val(data.notebook.fullname);
                            $("#company").val(data.notebook.company);
                            $("#phone").val(data.notebook.phone);
                            $("#mail").val(data.notebook.mail);
                            $("#birthdate").val(data.notebook.birthdate);
                            $('.modal').modal('show');
                        }
                    });
                });
                del();
            };

            const pagination = function(obj) {
                $(".pagination").click(function(e){
                    app.list(obj, e.currentTarget.innerText);
                    pagination(obj);
                    tools();
                });
            };

            const update = function(url, data) {
                $.ajax({
                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(data){
                        /* DEBUG */
                        console.log('Debug: success ' + data.success);
                        if (data.message) {
                            console.log('Debug: ' + data.message);
                        }
                        /* DEBUG */
                        if (false == data.success) {
                            return;
                        }
                        $(".modal").modal('hide');
                        getAll();
                    }
                });
            };

            const doUpdate = function() {
                $("#btn_save").click(function(e) {
                    var form = document.getElementById('modal_form');
                    var data = new FormData(form);
                    let ext = $("#photo").val().split('.');
                    data.append('extension', ext[ext.length - 1]);

                    if (form.checkValidity()) {
                        if ($("#id").val())
                        {
                            url = 'http://localhost:8000/api/v1/notebook/'
                                    + $("#id").val() + '/';
                        } else {
                            url = 'http://localhost:8000/api/v1/notebook/';
                        }

                        update(url, data);
                    }
                });
            }

            $( document ).ready( function() {
                getAll();
                $("#btn-new").click( function() {
                    $('.modal-title').html('Добавление записи');
                    $('.modal').modal('show');
                });
                $(".modal").on('hidden.bs.modal', function(e){
                    $("#fullname").val('');
                    $("#company").val('');
                    $("#phone").val('');
                    $("#mail").val('');
                    $("#birthdate").val('');
                    $("#photo").val('');
                    $("#id").val('');
                    $('.modal-title').html('Редактирование записи');
                });
                doUpdate();
                validate();
            });
        </script>
    </body>
</html>
