$(document).ready(function () {
    change_filters_value();
});

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

function check_product(event) {

    var element = event.target;
    var id = element.id.substring(1);
    var status = element.checked; 

    console.log(id);
    console.log(status);

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
        success: function(result){
            console.log("Success!");
            change_filters_value();
           
        },
        error: function(result) {
            console.log("Failed!");
            console.log(result);
        }
    })


}

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
