$(document).ready(function () {
    change_filters_value();
});

// Функция срабатывает в случае взаимодействия с одним из фильтров и смене его значения.  
// Считываются оба фильтра в независимости от того какой вызвал событие.
// Значения записаны в переменные и передаються в контроллер с помощью ajax запроса.
// В случае успеха результат записывается в блок списка.
function change_filters_value() {

    var status = document.getElementById('status').value;
    var category = document.querySelector('input[name="category"]:checked').id;

    $.ajax(
        {
        url: base_url+"index.php/pages/get_products_by_chosen_filter",
        type: 'POST',
        dataType: 'html',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data: {
            'status': status,
            'category': category
        },
        success: function(result){
            console.log("Success!");
            $('#products_block').html(result);
           
        },
        error: function(result) {
            console.log("Failed!");
            console.log(result);
        }
    })
}

// Функция срабатывает при взамодействии с чекбоксами элементов списка.
// Считывается айди элемента, который вызвал событие, и логическая переменная - значение поля (сняли галочку или поставили).
// Данные передаються в контроллер.
function check_product(event) {

    var element = event.target;
    var id = element.id.substring(1);
    var status = element.checked; 

    $.ajax(
        {
        url: base_url+"index.php/pages/change_status",
        type: 'POST',
        dataType: 'html',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data: {
            'id': id,
            'status': status,
        },
        success: function(){
            console.log("Success!");
            change_filters_value();
        },
        error: function(result) {
            console.log("Failed!");
            console.log(result);
        }
    })
}

// Удаление продукта из списка. Считывает айди на котором сработало событие. И с помощью аjаx запроса передает в контроллер.
// При успешном удаленнии элемент удаляется вместе с родительским компонентом - блоком, без обновления страницы. 
function delete_product(event) {
    var id = event.target.id;
    var delete_element = event.target.parentElement;

    $.ajax(
        {
        url: base_url+"index.php/pages/delete_product",
        type: 'POST',
        dataType: 'html',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data: {
            'id': id
        },
        success: function(){
            console.log("Success!");
           $(delete_element).remove();

           
        },
        error: function(result) {
            console.log("Failed!");
            console.log(result);
        }
    })
}
