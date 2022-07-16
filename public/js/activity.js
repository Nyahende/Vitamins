$(document).ready(function(){


    if($('#checked').val() == "checked")
    {

        $('#unchecked-time').attr('id','checked-time');
        $('#message').attr('id','checked-message');

    }
    else
    {

        $('#unchecked-time').attr('id','unchecked-time');
        $('#message').attr('id','unchecked-message');

    }

       

});