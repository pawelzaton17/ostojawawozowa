/* eslint-disable */
/**
 * ACF Block Calendar Template Part Scripts
 *
 */

/** Tiny Slider */
// eslint-disable-next-line import/no-extraneous-dependencies
import "tiny-slider/dist/tiny-slider.css";
// eslint-disable-next-line import/no-extraneous-dependencies
import { tns } from "tiny-slider/src/tiny-slider";

const calendarSlider = () => {
    const commonCarouselWrapper = document.querySelectorAll(".js-tiny-slider-calendar");

    [...commonCarouselWrapper].forEach((sliderWrapper) => {
        const slider = sliderWrapper.querySelector(".js-tiny-slider-row");
        const controlsContainer = sliderWrapper.querySelector(".crunch-tiny-slider__controls");
        tns({
            container: slider,
            items: 3,
            slideBy: 3,
            autoplay: false,
            mouseDrag: true,
            lazyload: true,
            nav: false,
            navPosition: "bottom",
            loop: true,
            controls: true,
            mode: "carousel",
            animateDelay: 300,
            controlsText: [
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-left--black-color</title><path d='M229.9,439.31l19.8-19.79a12,12,0,0,0,0-17L69,221.41,249.7,40.28a12,12,0,0,0,0-17L229.9,3.51a12,12,0,0,0-17,0L3.51,212.93a12,12,0,0,0,0,17L212.93,439.31A12,12,0,0,0,229.9,439.31Z'/></svg>",
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-right--black-color</title><path d='M23.31,3.52,3.51,23.31a12,12,0,0,0,0,17l180.7,181.13L3.51,402.54a12,12,0,0,0,0,17l19.8,19.79a12,12,0,0,0,17,0L249.7,229.9a12,12,0,0,0,0-17L40.28,3.52A12,12,0,0,0,23.31,3.52Z'/></svg>",
            ],
            controlsContainer,
        });
    });
};

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector(".js-tiny-slider-calendar")) {
        const calendarWrapper = document.querySelector("#js-calendar");
        const formDateInput = document.querySelector(".js-calendar-form-input");
        const formTextarea = document.querySelector(".js-calendar-textarea");

        function DayAsString(dayIndex) {
            const weekdays = new Array(7);
            weekdays[0] = "Niedziela";
            weekdays[1] = "Poniedziałek";
            weekdays[2] = "Wtorek";
            weekdays[3] = "Środa";
            weekdays[4] = "Czwartek";
            weekdays[5] = "Piątek";
            weekdays[6] = "Sobota";

            return weekdays[dayIndex];
        }

        function GetDatesAndShow(startDate, daysToAdd) {
            for (let i = 0; i <= daysToAdd; i += 1) {
                const currentDate = new Date();
                currentDate.setDate(startDate.getDate() + i);
                calendarWrapper.innerHTML += `
                <div
                    class="d-flex flex-column text-center"
                    data-day="${DayAsString(currentDate.getDay())}"
                    data-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                >
                    <h4 class="font-size-18">${DayAsString(currentDate.getDay())}</h4>
                    <p class="font-size-14 text-gray-second">${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}</p>
                    <ul class="list-unstyled c-m-0">
                        <li class="acf-block-calendar__list-item">
                            <button
                                class="acf-block-calendar__button js-modal-trigger js-calendar-time-trigger w-100 bg-white line-height-1-4 text-center font-family-primary"
                                data-item-day="${DayAsString(currentDate.getDay())}"
                                data-item-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                                data-item-time="8:00 - 10:00"
                                data-target-modal="#calendar-modal"
                            >
                                8:00 - 10:00
                            </button>
                        </li>
                        <li class="acf-block-calendar__list-item">
                            <button
                                class="acf-block-calendar__button js-modal-trigger js-calendar-time-trigger w-100 bg-white line-height-1-4 text-center font-family-primary"
                                data-item-day="${DayAsString(currentDate.getDay())}"
                                data-item-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                                data-item-time="10:00 - 16:00"
                                data-target-modal="#calendar-modal"
                            >
                                10:00 - 16:00
                            </button>
                        </li>
                        <li class="acf-block-calendar__list-item">
                            <button
                                class="acf-block-calendar__button js-modal-trigger js-calendar-time-trigger w-100 bg-white line-height-1-4 text-center font-family-primary"
                                data-item-day="${DayAsString(currentDate.getDay())}"
                                data-item-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                                data-item-time="16:00 - 20:00"
                                data-target-modal="#calendar-modal"
                            >
                                16:00 - 20:00
                            </button>
                        </li>
                    </ul>
                </div>
            `;
            }
        }

        const startDate = new Date();
        GetDatesAndShow(startDate, 14);

        // Calendar buttons with time
        document.querySelectorAll(".js-calendar-time-trigger").forEach((el) => {
            el.addEventListener("click", () => {
                const elDate = el.dataset.itemDate;
                const elTime = el.dataset.itemTime;

                if (formTextarea) {
                    const formTextareaElement = formTextarea.querySelector("textarea");

                    formTextareaElement.innerHTML = "";
                    formTextareaElement.innerHTML = `Chcę umówić się na oglądanie mieszkania w Państwa inwestycji dnia ${elDate}, ${elTime}`;
                }
                if (formDateInput) {
                    formDateInput.querySelector("input").value = `${elDate}, ${elTime}`;
                }
            });
        });

        calendarSlider();
    }
});
