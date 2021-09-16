/**
 * Default Page Template Scripts
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
