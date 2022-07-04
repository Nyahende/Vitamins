$(document).ready(function(){
    $('#patient-add-sales').click(function(){
        $('#patient-add-sales-form').slideToggle();
    });
    $('#particular-add-sales').click(function(){
        $('#particulars-add-sales-form').slideToggle();
    });

    $('#expenses-add-sales').click(function(){
        $('#expenses-add-sales-form').slideToggle();
    });
    $('#patient-upload-sales').click(function(){
        $('#expenses-add-sales-form').slideUp();
    });
    $('#patient-upload-sales').click(function(){
        $('#particulars-add-sales-form').slideUp();
    });
    $('#patient-upload-sales').click(function(){
        $('#patient-add-sales-form').slideUp();
    });
});

