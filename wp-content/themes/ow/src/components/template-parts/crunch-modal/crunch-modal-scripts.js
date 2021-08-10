/**
 * Crunch Modal Template Part Scripts
 */

    /**
     * Custom Functions
     */

    /** Bootstap Event Example */

    document.addEventListener("DOMContentLoaded", () => {
        const modals = document.querySelectorAll(".js-modal");

        [...modals].forEach((modal) => {
            document.body.appendChild(modal);

            modal.addEventListener("show.bs.modal", function() {
                document.querySelector("body").classList.add("lock-position");
            }, false);

            modal.addEventListener("hidden.bs.modal", function() {
                document.querySelector("body").classList.remove("lock-position");
            }, false);
        });

    });
