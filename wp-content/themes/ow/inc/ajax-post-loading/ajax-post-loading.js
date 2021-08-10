jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    $('.js-ajax-load-more-button').click(function(event){
        event.preventDefault();

        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': crunch_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                'page' : crunch_loadmore_params.current_page
            },
            buttonLabel = button.find('.crunch-button__label').text();
            currentPostType = buttonLabel.substr(buttonLabel.indexOf(" ") + 1);

        $.ajax({ // you can also use $.post here
            url : crunch_loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.find('.crunch-button__label').text('Loading...'); // change the button text, you can also add a preloader image
            },
            success : function( data ){
                if( data ) {
                    button.find('.crunch-button__label').text( 'More ' + currentPostType ).closest('.load-more-posts').before(data); // insert new posts
                    crunch_loadmore_params.current_page++;

                    if ( crunch_loadmore_params.current_page == crunch_loadmore_params.max_page )
                        button.remove(); // if last page, remove the button

                    $('.jarallax').jarallax();

                    // you can also fire the "post-load" event here if you use a plugin that requires it
                    // $( document.body ).trigger( 'post-load' );
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});
