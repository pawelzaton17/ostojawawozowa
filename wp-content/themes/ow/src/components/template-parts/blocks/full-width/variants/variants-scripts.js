/**
 * ACF Block Variants Template Part Scripts
 *
 */

/** Tiny Slider */
// eslint-disable-next-line import/no-extraneous-dependencies
import "tiny-slider/dist/tiny-slider.css";
// eslint-disable-next-line import/no-extraneous-dependencies
import { tns } from "tiny-slider/src/tiny-slider";

/** Init Tiny Slider with dots and custom controls */

const blockVariantsSlider = () => {
    const commonCarouselWrapper = document.querySelectorAll(".js-tiny-slider-variants");
    [...commonCarouselWrapper].forEach((sliderWrapper) => {
        const slider = sliderWrapper.querySelector(".js-tiny-slider-row");
        const controlsContainer = sliderWrapper.querySelector(".crunch-tiny-slider__controls");
        tns({
            container: slider,
            items: 1,
            autoplay: false,
            mouseDrag: true,
            lazyload: true,
            nav: false,
            navPosition: "bottom",
            loop: true,
            controls: true,
            mode: "gallery",
            animateDelay: 300,
            controlsText: [
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-left--black-color</title><path d='M229.9,439.31l19.8-19.79a12,12,0,0,0,0-17L69,221.41,249.7,40.28a12,12,0,0,0,0-17L229.9,3.51a12,12,0,0,0-17,0L3.51,212.93a12,12,0,0,0,0,17L212.93,439.31A12,12,0,0,0,229.9,439.31Z'/></svg>",
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-right--black-color</title><path d='M23.31,3.52,3.51,23.31a12,12,0,0,0,0,17l180.7,181.13L3.51,402.54a12,12,0,0,0,0,17l19.8,19.79a12,12,0,0,0,17,0L249.7,229.9a12,12,0,0,0,0-17L40.28,3.52A12,12,0,0,0,23.31,3.52Z'/></svg>",
            ],
            controlsContainer,
        });
    });
};

const blockVariantsModalSlider = () => {
    const commonCarouselWrapper = document.querySelectorAll(".js-tiny-slider-variants-modal");
    [...commonCarouselWrapper].forEach((sliderWrapper) => {
        const slider = sliderWrapper.querySelector(".js-tiny-slider-row");
        const controlsContainer = sliderWrapper.querySelector(".crunch-tiny-slider__controls");
        tns({
            container: slider,
            items: 1,
            autoplay: false,
            mouseDrag: true,
            lazyload: true,
            nav: true,
            navPosition: "bottom",
            loop: true,
            controls: true,
            mode: "gallery",
            animateDelay: 300,
            controlsText: [
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-left--black-color</title><path d='M229.9,439.31l19.8-19.79a12,12,0,0,0,0-17L69,221.41,249.7,40.28a12,12,0,0,0,0-17L229.9,3.51a12,12,0,0,0-17,0L3.51,212.93a12,12,0,0,0,0,17L212.93,439.31A12,12,0,0,0,229.9,439.31Z'/></svg>",
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-right--black-color</title><path d='M23.31,3.52,3.51,23.31a12,12,0,0,0,0,17l180.7,181.13L3.51,402.54a12,12,0,0,0,0,17l19.8,19.79a12,12,0,0,0,17,0L249.7,229.9a12,12,0,0,0,0-17L40.28,3.52A12,12,0,0,0,23.31,3.52Z'/></svg>",
            ],
            controlsContainer,
        });
    });
};

if (document.querySelectorAll(".js-tiny-slider-variants")) {
    blockVariantsSlider();
    blockVariantsModalSlider();
}

document.querySelectorAll(".acf-block-variants__tab-btn").forEach((el) => {
    el.addEventListener("show.bs.tab", () => {
        const elParent = el.closest(".acf-block-variants");
        const targetClass = el.dataset.bsTarget;
        const extraTab = elParent.querySelector(`#acf-block-variants__tab-alt ${targetClass}`);

        elParent.querySelectorAll(".acf-block-variants__tab").forEach((tab) => {
            tab.classList.remove("show", "active");
        });
        extraTab.classList.add("show", "active");
    });
});
