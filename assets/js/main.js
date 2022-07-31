$(document).ready(function () {
    $.ajax(
        {
        url: base_url+"index.php/pages/getChosenCategory",
        type: 'POST',
        dataType: 'html',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data: {
            //csrf_name : csrf_hash,
            'category': '0'
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
});


function change_category(event) {

    var category = event.currentTarget.id;

    var status = document.getElementById('status').value;

    console.log(status);

    $.ajax(
        {
        url: base_url+"index.php/pages/get_chosen_status",
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

function change_status(event) {
    //console.log(event.target.value);

    var status = event.target.value;
    var category = document.querySelector('input[name="category"]:checked').id;

    //console.log(category);

    $.ajax(
        {
        url: base_url+"index.php/pages/get_chosen_status",
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
            //console.log(result);
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
