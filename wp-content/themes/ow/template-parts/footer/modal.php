<div class="container">
    <div class="js-modal modal contact-modal-wrapper fade" id="contact-modal">
        <div class="main-footer__popup-wrapper js-modal-item m-auto overflow-hidden bg-white h-100 position-relative c-py-4 c-px-6">
            <i class="js-modal-close modal__close z-index-2 position-absolute c-p-3 d-block">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.9566 27.9568L10.0433 10.0434" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                    <path d="M27.9567 10.0434L10.0434 27.9568" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </i>
            <div class="h-100 overflow-auto c-px-3">

                <?= do_shortcode('[gravityform id="9" ajax="true"]'); ?>

            </div
        </div>
    </div>
    <div class="js-modal modal phone-modal-wrapper fade" id="phone-modal">
        <div class="main-footer__popup-wrapper js-modal-item main-footer__popup-wrapper--phone m-auto overflow-hidden bg-white h-100 position-relative c-py-4 c-px-6">
            <i class="js-modal-close modal__close z-index-2 position-absolute c-p-3 d-block">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.9566 27.9568L10.0433 10.0434" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                    <path d="M27.9567 10.0434L10.0434 27.9568" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </i>
            <div class="h-100 overflow-auto c-px-3">

                <?= do_shortcode('[gravityform id="10" ajax="true"]'); ?>

            </div
        </div>
    </div>
</div>
