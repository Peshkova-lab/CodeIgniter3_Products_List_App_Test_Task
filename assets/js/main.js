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
            //csrf_name : csrf_hash,
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
            //csrf_name : csrf_hash,
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
