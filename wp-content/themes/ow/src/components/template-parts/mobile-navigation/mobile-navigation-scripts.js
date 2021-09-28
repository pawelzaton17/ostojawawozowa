/**
 * Mobile navigation Template Part Scripts
 */

document.addEventListener("DOMContentLoaded", () => {
    /** Make fixed classes (it wasn't added to body wrapper: "mm-page") */
    document.querySelector(".js-main-header").classList.add("mmenu-fixed");

    const wpAdminBar = document.querySelector("#wpadminbar");

    if (wpAdminBar != null) {
        wpAdminBar.classList.add("mmenu-fixed");
    }

    /** Making whole parent of dropdown clickable */
    const menuItems = document.querySelectorAll(
        ".js-mobile-navigation .menu-item-has-children > a"
    );

    [...menuItems].forEach((element) => {
        /** Set parent to avoid removing element */
        const elementParent = element.parentNode;

        /** Create <span> */
        const spanWrapper = document.createElement("span");

        /** Append element to span */
        spanWrapper.prepend(element);

        /** Set parent to avoid removing element */
        elementParent.prepend(spanWrapper);
    });

    /** mMenu Init */
    const menu = new window.Mmenu(
        ".js-mobile-navigation",
        {
            pageScroll: true,
            extensions: [
                "pagedim-black",
                "position-right",
                "fx-menu-slide",
                "shadow-page",
                "shadow-panels",
            ],
        },
        {
            classNames: {
                fixedElements: {
                    fixed: "mmenu-fixed",
                },
            },
        }
    );

    const mburgerIcon = document.querySelector(".js-mburger");
    const api = menu.API;

    mburgerIcon.addEventListener("click", () => {
        if (mburgerIcon.classList.contains("is-active")) {
            api.close();
            mburgerIcon.classList.remove("is-active");
        } else {
            api.open();
            mburgerIcon.classList.add("is-active");
        }
    });
});
