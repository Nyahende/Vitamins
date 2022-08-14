$(document).ready(function(){


    $('#add-media-btn').click(function(){
        $('.add-media-div').slideToggle();
    });
    $('#upload-media-btn').click(function(){
        $('.add-media-div').slideUp();
    });
    $('#add-image-btn').click(function(){
        $('.add-image-div').slideToggle();
    });
    $('#upload-media-btn').click(function(){
        $('.add-media-div').slideUp();
    });

    $('#add-post-btn').click(function(){
        $('.add-post-div').slideToggle();
    });
    $('#upload-post-btn').click(function(){
        $('.add-post-div').slideUp();
    });

    $('#add-movie-btn').click(function(){
        $('.add-movie-div').slideToggle();
    });
    
    $('#upload-movie-btn').click(function(){
        $('.add-movie-div').slideUp();
    });


    $('#read-review-btn').click(function(){

        $('.reviews-div').slideToggle();

    });

    $('#new-message-id').click(function(){

        $('#the-span').slideToggle();

    });


    $('#add-activity').click(function(){

        $('#activity-form').slideToggle();

    });

    $('#upload-activity-btn').click(function(){

        $('#activity-form').slideUp();

    });


    $('#delete-account').click(function(){

        $('.are-you-sure').slideToggle();
        $('#delete-account').hide();

    });
    $('#cancel').click(function(){

        $('.are-you-sure').slideUp();
        $('#delete-account').show();

    });
});
