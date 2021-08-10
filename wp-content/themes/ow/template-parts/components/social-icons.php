<ul class="social-icons list-unstyled d-flex">

    <?php if ( get_field( 'social_icons_facebook', 'options' ) ): ?>

        <li class="social-icons__item">
            <a href="<?php the_field( 'social_icons_facebook', 'options' ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
                <svg class="social-link__icon social-link__icon--facebook d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512">
                    <title>Icon Facebook</title>
                    <path d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path>
                </svg>
            </a>
        </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_twitter', 'options' ) ): ?>

    <li class="social-icons__item">
        <a href="<?php the_field( 'social_icons_twitter', 'options' ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
            <svg class="social-link__icon social-link__icon--twitter" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                <title>Icon Twitter</title>
                <path d="M6.02 12.31a3.88 3.88 0 0 1-3.6-2.68c.56.1 1.11.08 1.66-.05l.06-.03a3.87 3.87 0 0 1-3.09-3.84c.55.3 1.12.46 1.73.47A3.89 3.89 0 0 1 1.6 1.03a11.09 11.09 0 0 0 7.99 4.05l-.07-.43c-.1-.91.08-1.76.57-2.53A3.72 3.72 0 0 1 12.72.37c1.3-.22 2.44.16 3.39 1.08.06.06.11.08.2.06a7.85 7.85 0 0 0 2.3-.9h.03c-.3.9-.86 1.6-1.66 2.11a7.47 7.47 0 0 0 2.16-.58l.02.02-.45.58c-.41.5-.88.95-1.4 1.34-.05.03-.07.06-.07.12a11.35 11.35 0 0 1-3.16 8.22 10.37 10.37 0 0 1-5.33 2.97c-.7.15-1.43.23-2.15.25-2.24.07-4.3-.49-6.2-1.66l-.1-.06a7.86 7.86 0 0 0 5.72-1.6" fill-rule="evenodd"/>
            </svg>
        </a>
    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_linkedin', 'options' ) ): ?>

        <li class="social-icons__item">
            <a href="<?php the_field( 'social_icons_linkedin', 'options' ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
                <svg class="social-link__icon social-link__icon--linkedin d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 17">
                    <title>Icon Linkedin</title>
                    <path d="M2.37.68a1.9 1.9 0 1 1 0 3.82 1.9 1.9 0 0 1 0-3.82zM.72 16.5h3.3V5.93H.71V16.5zM6.07 5.93h3.15v1.45h.05a3.45 3.45 0 0 1 3.1-1.7c3.33 0 3.94 2.18 3.94 5.02v5.8h-3.28v-5.14c0-1.22-.02-2.8-1.7-2.8-1.72 0-1.98 1.33-1.98 2.71v5.23H6.07V5.93z"/>
                </svg>
            </a>
        </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_youtube', 'options' ) ): ?>

        <li class="social-icons__item">
            <a href="<?php the_field( 'social_icons_youtube', 'options' ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
                <svg class="social-link__icon social-link__icon--youtube d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <title>Icon Youtube</title>
                    <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                </svg>
            </a>
        </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_pinterest', 'options' ) ): ?>

        <li class="social-icons__item">
            <a href="<?php the_field( 'social_icons_pinterest', 'options' ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
                <svg class="social-link__icon social-link__icon--pinterest d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                    <title>Icon Pinterest</title>
                    <path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path>
                </svg>
            </a>
        </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_instagram', 'options' ) ): ?>

        <li class="social-icons__item">
            <a href="<?php the_field( 'social_icons_instagram', 'options' ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
                <svg class="social-link__icon social-link__icon--instagram d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <title>Icon Instagram</title>
                    <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                </svg>
            </a>
        </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_rss', 'options' ) ): ?>

        <li class="social-icons__item">
            <a href="<?php the_field( 'social_icons_rss', 'options' ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
                <svg class="social-link__icon social-link__icon--rss d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <title>Icon Rss</title>
                    <path d="M128.081 415.959c0 35.369-28.672 64.041-64.041 64.041S0 451.328 0 415.959s28.672-64.041 64.041-64.041 64.04 28.673 64.04 64.041zm175.66 47.25c-8.354-154.6-132.185-278.587-286.95-286.95C7.656 175.765 0 183.105 0 192.253v48.069c0 8.415 6.49 15.472 14.887 16.018 111.832 7.284 201.473 96.702 208.772 208.772.547 8.397 7.604 14.887 16.018 14.887h48.069c9.149.001 16.489-7.655 15.995-16.79zm144.249.288C439.596 229.677 251.465 40.445 16.503 32.01 7.473 31.686 0 38.981 0 48.016v48.068c0 8.625 6.835 15.645 15.453 15.999 191.179 7.839 344.627 161.316 352.465 352.465.353 8.618 7.373 15.453 15.999 15.453h48.068c9.034-.001 16.329-7.474 16.005-16.504z"></path>
                </svg>
            </a>
        </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_email', 'options' ) ): ?>

        <li class="social-icons__item">
            <a href="mailto:<?= esc_html( antispambot( the_field( 'social_icons_email', 'options' ) ) ); ?>" class="social-link d-flex align-items-center justify-content-center rounded-circle" target="_blank" rel="nofollow">
                <svg class="social-link__icon social-link__icon--envelope d-block" viewBox="0 0 23 16" xmlns="http://www.w3.org/2000/svg">
                    <title>Icon Email</title>
                    <path d="M8.1 7.65L2.48 12.1v-8.7l5.64 4.24zm1.07.8l1.66 1.25.4.3c.31.23.58.23.89 0l2.07-1.55 6.59 5.23c-.05.02-.1.02-.2.03H2.8a.5.5 0 0 1-.23-.03l6.59-5.23zm6.07-.8L20.9 3.4v8.72l-5.65-4.47zM2.6 1.88a.56.56 0 0 1 .23-.04H20.5c.12 0 .2.01.26.04l-9.09 6.84L2.6 1.88zM20.55.58H2.79c-.99 0-1.65.64-1.65 1.6v11.2c0 .97.64 1.6 1.64 1.6h17.79c1 0 1.64-.62 1.64-1.6V2.2c0-1-.64-1.62-1.66-1.62z" fill-rule="evenodd"/>
                </svg>
            </a>
        </li><!-- .social-icons__item -->

    <?php endif; ?>

</ul><!-- .social-icons list-unstyled d-flex justify-content-center justify-content-sm-start -->
