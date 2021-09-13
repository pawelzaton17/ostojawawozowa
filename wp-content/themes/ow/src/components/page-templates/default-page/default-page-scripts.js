/**
 * Default Page Template Scripts
 */

// /** Tiny Slider */
// import "tiny-slider/dist/tiny-slider.css";
// import { tns } from "tiny-slider/src/tiny-slider";
//
// /** Init Tiny Slider with dots and custom controls */
//
// const tinyCarousel = () => {
//     const commonCarouselWrapper = document.querySelectorAll(".js-tiny-slider");
//
//     [...commonCarouselWrapper].forEach((sliderWrapper) => {
//         const slider = sliderWrapper.querySelector(".js-tiny-slider-row");
//         const controlsContainer = sliderWrapper.querySelector(".crunch-tiny-slider__controls");
//         tns({
//             container: slider,
//             items: 1,
//             mouseDrag: true,
//             lazyload: true,
//             nav: true,
//             navPosition: "bottom",
//             loop: false,
//             controls: false,
//             controlsText: [
//                 "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-left--black-color</title><path d='M229.9,439.31l19.8-19.79a12,12,0,0,0,0-17L69,221.41,249.7,40.28a12,12,0,0,0,0-17L229.9,3.51a12,12,0,0,0-17,0L3.51,212.93a12,12,0,0,0,0,17L212.93,439.31A12,12,0,0,0,229.9,439.31Z'/></svg>",
//                 "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-right--black-color</title><path d='M23.31,3.52,3.51,23.31a12,12,0,0,0,0,17l180.7,181.13L3.51,402.54a12,12,0,0,0,0,17l19.8,19.79a12,12,0,0,0,17,0L249.7,229.9a12,12,0,0,0,0-17L40.28,3.52A12,12,0,0,0,23.31,3.52Z'/></svg>"
//             ],
//             controlsContainer: controlsContainer,
//             responsive: {
//                 576: {
//                     items: 2,
//                     controls: true,
//                     nav: false,
//                 },
//                 992: {
//                     items: 3,
//                 },
//             },
//         });
//     });
// };
//
// if (document.querySelector(".js-tiny-slider")) {
//     tinyCarousel();
// }

/**
 * Custom Functions
 */

/** Modal */

const modalClass = "js-modal";
const modalTriggersClass = "js-modal-trigger";
const modalCloseTriggersClass = "js-modal-close";
const newModalTrigger = "js-modal-open-new-modal";

document.addEventListener("DOMContentLoaded", () => {
    const el = document.querySelectorAll(`.${modalTriggersClass}`);
    const modalCloseTrigger = document.querySelectorAll(`.${modalCloseTriggersClass}`);
    const openNewModal = document.querySelectorAll(`.${newModalTrigger}`);

    // Go through all elements and open selected modal by checking ID of clicked button
    for (let i = 0; i < el.length; i += 1) {
        el[i].addEventListener("click", () => {
            const modalTargetUrl = el[i].getAttribute("data-target-modal");
            const modal = document.querySelector(`${modalTargetUrl}`);

            if (modal.length) {
                return;
            }
            if (!modal.classList.contains("opened")) {
                modal.classList.add("opened", "show");
                document.body.classList.add("modal-opened");
                document.body.style.overflow = "hidden";
            } else {
                modal.classList.remove("opened");
                document.body.classList.remove("modal-opened");
                document.body.style.overflow = "initial";
            }
        });
    }

    // Some modals can redirect to another modal with a form
    for (let i = 0; i < openNewModal.length; i += 1) {
        openNewModal[i].addEventListener("click", (e) => {
            const modalTargetId = el[i].getAttribute("data-target-modal");
            const modalToOpen = document.querySelector(`${modalTargetId}`);
            const clickedModal = e.target.closest(".js-modal");

            if (modalToOpen.length) {
                return;
            }
            clickedModal.classList.remove("opened", "show");
            if (!modalToOpen.classList.contains("opened")) {
                modalToOpen.classList.add("opened", "show");
                document.body.classList.add("modal-opened");
                document.body.style.overflow = "hidden";
            }
        });
    }

    function modalsClassController() {
        const modals = document.querySelectorAll(`.${modalClass}`);
        [].forEach.call(modals, (modal) => {
            modal.classList.remove("opened", "show");
            document.body.classList.remove("modal-opened");
            document.body.style.overflow = "initial";
        });
    }

    // Modal close trigger support
    for (let i = 0; i < modalCloseTrigger.length; i += 1) {
        modalCloseTrigger[i].addEventListener("click", () => {
            modalsClassController();
        });
    }

    // Modals has an extra close button that appears after the event "gform_confirmation_loaded"
    // eslint-disable-next-line no-undef
    $(document).on("gform_confirmation_loaded", () => {
        const closeTrigger = document.querySelector(".js-modal-close-contact");
        closeTrigger.addEventListener("click", () => {
            modalsClassController();
        });
    });
});
