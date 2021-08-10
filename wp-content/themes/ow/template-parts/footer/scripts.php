<!-- Start of Fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Josefin Sans:100,300,400,600,700',
                'Work Sans:400,500,600,700',
                'Rubik:300,400,500',
            ],
        }
    };

    (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>
<!-- End of Fonts -->

<?php the_field( 'code_before_body_ending_tag', 'options' ); ?>

<?php wp_footer(); ?>
