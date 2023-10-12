const formRegister = $("#form_register")
const formLogin = $("#form_login")
const form = $("#form")

const ROUTER = {
    dashboard:'/dashboard',
    register_store:'/api/register',
    login_store:'/api/login',
    notes:'/dashboard/notes',
    notes_store:'/api/notes',
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const getErrors = (err) => {
    if (err.status == 422) {
        $('#errors').empty();
        $('#success').empty();
        $.each(err.responseJSON.errors, function (i, error) {
            $('#errors').append(`<div class="alert alert-danger" role="alert">${error[0]}</div>`);
        });
    }
}

function storeForm(route){
    $.ajax({
        type: "post",
        url: route,
        data: form.serialize(),
        dataType: 'json',
        success: function(data){
            location.href = ROUTER.notes;
        },
        error: function (err) {
            getErrors(err)
        }
    });
}

function updateForm(route){
    $.ajax({
        type: "PUT",
        url: route,
        data: form.serialize(),
        dataType: 'json',
        success: function(){
            location.href = ROUTER.notes;
        },
        error: function (err) {
            getErrors(err)
        }
    });
}

function delete_item(route,item_id){
    if (confirm('Вы уверены,что хотите удалить?')) {
        $.ajax({
            type: "DELETE",
            url: route,
            data: {
                _token: $('input[name="csrf-token"]').val()
            },
            dataType: 'json',
            success: function(data){
                $(`#item_id_${item_id}`).remove();
                alert('Успешно удалено');
            },
            error: function (err) {
                alert('Ошибка!');
            }
        });
    }
}

formLogin.submit(function(e){
    e.preventDefault();

    $.ajax({
        type: "post",
        url: ROUTER.login_store,
        data: formLogin.serialize(),
        dataType: 'json',
        success: function(data){
            $('#errors').empty();
            $('#success').append(`
            <div class="alert alert-success" role="alert">
             Успешно!<br>
              <a href="${ROUTER.dashboard}" class="alert-link">Перейти в ЛК</a>
            </div>
            `);
        },
        error: function (err) {
            if (err.status == 422) {
                $('#success').empty();
                $.each(err.responseJSON.errors, function (i, error) {
                    $('#errors').append(`<div class="alert alert-danger" role="alert">${error[0]}</div>`);
                });
            }
        }
    });
});

formRegister.submit(function(e){
    e.preventDefault();

    $.ajax({
        type: "post",
        url: ROUTER.register_store,
        data: formRegister.serialize(),
        dataType: 'json',
        success: function(data){
            $('#errors').empty();
            $('#success').append(`
            <div class="alert alert-success" role="alert">
              Регистрация успешно завершена!<br>
              <a href="${ROUTER.dashboard}" class="alert-link">Перейти в ЛК</a>
            </div>
            `);
        },
        error: function (err) {
            if (err.status == 422) {
                $('#success').empty();
                $.each(err.responseJSON.errors, function (i, error) {
                    $('#errors').append(`<div class="alert alert-danger" role="alert">${error[0]}</div>`);
                });
            }
        }
    });
});


