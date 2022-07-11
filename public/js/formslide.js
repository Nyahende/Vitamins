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

    $('#video-float-right').click(function(){

        $('.videos-comments-div').slideToggle();

    });

    $('#read-review-btn').click(function(){

        $('.reviews-div').slideToggle();

    });

    $('#images-float-right').click(function(){

        $('.images-comments-div').slideToggle();

    });

    $('#posts-float-right').click(function(){

        $('.posts-comments-div').slideToggle();

    });

});