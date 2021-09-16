/* eslint-disable prettier/prettier */
/**
 * ACF Block Calendar Template Part Scripts
 *
 */

document.addEventListener("DOMContentLoaded", () => {
    const calendarWrapper = document.querySelector("#js-calendar");
    const formDateSpan = document.querySelector(".js-calendar-form-date");
    const formDateInput = document.querySelector(".js-calendar-form-input");

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
                    data-day="${DayAsString(currentDate.getDay())}"
                    data-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                >
                    <h4>${DayAsString(currentDate.getDay())}</h4>
                    <p>${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}</p>
                    <ul class="list-unstyled">
                        <li>
                            <button
                                class="js-modal-trigger js-calendar-time-trigger"
                                data-item-day="${DayAsString(currentDate.getDay())}"
                                data-item-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                                data-item-time="9:00 - 12:00"
                                data-target-modal="#calendar-modal"
                            >
                                9:00 - 12:00
                            </button>
                        </li>
                        <li>
                            <button
                                class="js-modal-trigger js-calendar-time-trigger"
                                data-item-day="${DayAsString(currentDate.getDay())}"
                                data-item-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                                data-item-time="12:00 - 15:00"
                                data-target-modal="#calendar-modal"
                            >
                                12:00 - 15:00
                            </button>
                        </li>
                        <li>
                            <button
                                class="js-modal-trigger js-calendar-time-trigger"
                                data-item-day="${DayAsString(currentDate.getDay())}"
                                data-item-date="${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}"
                                data-item-time="15:00 - 16:00"
                                data-target-modal="#calendar-modal"
                            >
                                15:00 - 16:00
                            </button>
                        </li>
                    </ul>
                </div>
            `;
        }
    }

    const startDate = new Date();
    GetDatesAndShow(startDate, 4);

    // Calendar buttons with time
    document.querySelectorAll(".js-calendar-time-trigger").forEach((el) => {
        el.addEventListener("click", () => {
            const elDate = el.dataset.itemDate;
            const elTime = el.dataset.itemTime;
            formDateSpan.innerHTML = `${elDate}, ${elTime}`;
            formDateInput.querySelector("input").value = `${elDate}, ${elTime}`;
        });
    });
});
