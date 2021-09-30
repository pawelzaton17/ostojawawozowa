/* eslint-disable */
/**
 * Gravity Forms Template Part Scripts
 */

    import { delegateEvent } from "helpers/delegate-event";

    /**
     * Add Upload button
     */
    const setupFiles = () => {
        if(!document.querySelectorAll(".upload-btn-wrapper").length) {
            const filePreviews = document.querySelectorAll(".ginput_container_fileupload > [id*='gform_preview_']");
            const fileInputs = document.querySelectorAll(".ginput_container_fileupload input[type='file']");

            [...fileInputs].forEach((input) => {
                const wrapper = document.createElement("div");
                const wrapperInner = document.createElement("div");
                const browseButton = document.createElement("span");
                browseButton.classList.add("upload-btn-wrapper__browse","font-size-16","position-relative","d-block");
                browseButton.innerText = "Browse";
                const fileNameWrapper = `<div class='file-name-wrapper d-flex align-items-center'>
                            <svg class='file-name-wrapper__icon d-block' xmlns='http://www.w3.org/2000/svg' width='9' height='18' viewBox='0 0 9.17 18.33'>
                                <title>icon__safety-pin</title>
                                <path fill='#991818' d='M7.92,4.17v9.58a3.34,3.34,0,0,1-6.67,0V3.33a2.09,2.09,0,0,1,4.17,0v8.75a.85.85,0,0,1-.84.84.84.84,0,0,1-.83-.84V4.17H2.5v7.91a2.09,2.09,0,1,0,4.17,0V3.33A3.34,3.34,0,0,0,0,3.33V13.75a4.59,4.59,0,0,0,9.17,0V4.17Z'/>
                            </svg>
                            <span class='font-size-16 d-block mb-0 js-file-name upload-btn-wrapper__file-name'>No file chosen</span>
                            </div>`;
                wrapper.classList.add("js-upload-btn-wrapper","upload-btn-wrapper","w-100","d-flex","align-items-center","justify-content-between","line-height-1-3");
                wrapperInner.classList.add("upload-btn-wrapper__input-wrapper");
                wrapper.innerHTML = fileNameWrapper;
                wrapper.appendChild(wrapperInner);
                input.parentNode.insertBefore(wrapper, input);
                wrapperInner.appendChild(input);
                wrapperInner.appendChild(browseButton);

                input.addEventListener("mouseover", () => {
                    wrapper.classList.add("upload-btn-wrapper--active");
                });

                input.addEventListener("mouseout", () => {
                    wrapper.classList.remove("upload-btn-wrapper--active");
                });

                input.addEventListener("change", (event) => {
                    const fileName = event.target.files[0].name;
                    wrapper.querySelector(".js-file-name").classList.add("active");
                    wrapper.querySelector(".js-file-name").innerText = fileName;
                });
            });

            [...filePreviews].forEach((preview) => {
                const filePreview = preview.innerHTML;

                if(preview.parentNode.querySelectorAll(".js-upload-btn-wrapper").length) {
                    preview.parentElement.querySelector(".js-file-name").innerHTML = filePreview;
                    preview.remove();
                }
            });
        }
    };

    /**
     * Radio Button (change structure)
     * new and old UI
     */
    const setupRadio = () => {
        const radioLabels = document.querySelectorAll(".gfield_radio div label");

        [...radioLabels].forEach((label) => {
            const oldCheck = label.querySelectorAll(".check");

            if (oldCheck.length == 0) {
                const check = document.createElement("div");

                check.classList.add("check");
                label.append(check);
            }
        });
    };

    // const setupRadioOld = () => {
    //     const radioLabelsOld = document.querySelectorAll(".gfield_radio li label");

    //     [...radioLabels].forEach((label) => {
    //         const oldCheck = label.querySelectorAll(".check");

    //         if (oldCheck.length == 0) {
    //             const check = document.createElement("div");

    //             check.classList.add("check");
    //             label.append(check);
    //         }
    //     });
    // };

    /**
     * Init Chosen
     */
    const initChosen = () => {
        if(document.querySelector(".gfield_select") && !document.querySelector(".gfield_select + .chosen-container")) {
            $(".gfield_select").chosen();
        }
    };

    /**
     * Radio Button (action)
     * new and old UI
     */
    delegateEvent("click", ".gfield_radio > div >  input[type=radio]", () => {
        const radioInputs = document.querySelectorAll(".gfield_radio > li >  input[type=radio]");

        [...radioInputs].forEach((radio) => {
            if(radio.checked) {
                radio.nextSibling.classList.add("active");
            } else {
                radio.nextSibling.classList.remove("active");
            }
        });
    });

    // delegateEvent("click", ".gfield_radio > li >  input[type=radio]", () => {
    //     const radioInputs = document.querySelectorAll(".gfield_radio > li >  input[type=radio]");

    //     [...radioInputs].forEach((radio) => {
    //         if(radio.checked) {
    //             radio.nextSibling.classList.add("active");
    //         } else {
    //             radio.nextSibling.classList.remove("active");
    //         }
    //     });
    // });

    /**
     * Keydown for Number (allow numbers)
     */
    delegateEvent("keydown", ".ginput_container_number input", () => {
        if ([46, 8, 9, 27, 13, 110].includes(event.keyCode) ||
            (event.keyCode == 65 && (event.ctrlKey === true || event.metaKey === true)) ||
            (event.keyCode == 67 && (event.ctrlKey === true || event.metaKey === true)) ||
            (event.keyCode == 88 && (event.ctrlKey === true || event.metaKey === true)) ||
            (event.keyCode == 188) || (event.keyCode == 190) || (event.keyCode == 61) ||
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            return;
        }

        if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
            event.preventDefault();
        }
    });

    /**
     * Keyup for Phone Number (max chars)
     */
    delegateEvent("keydown", ".ginput_container_phone input", () => {
        const max_chars = 9;

        if (event.target.value.length >= max_chars) {
           event.target.value = event.target.value.substr(0, max_chars);
        }

        if ([46, 8, 9, 27, 13, 110].includes(event.keyCode) ||
            (event.keyCode == 65 && (event.ctrlKey === true || event.metaKey === true)) ||
            (event.keyCode == 67 && (event.ctrlKey === true || event.metaKey === true)) ||
            (event.keyCode == 88 && (event.ctrlKey === true || event.metaKey === true)) ||
            (event.keyCode == 187) || (event.keyCode == 61) ||
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            return;
        }

        if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
            event.preventDefault();
        }
    });

    /**
     * Textarea match height
     */
    delegateEvent("keyup paste", ".gform_wrapper .textarea", () => {
        let $this = event.target,
            offset = $this.scrollHeight - $this.offsetHeight;

        if ($this.offsetHeight < $this.scrollHeight) {
            $this.style.height = $this.scrollHeight + 4 + "px";
        } else {
            $this.style.height = 1 + "px";
            $this.style.height = $this.scrollHeight - offset + "px";
        }
    });

    /**
     * Input [type='file'] check if files attached
     */
    delegateEvent("click", ".gform_delete", () => {
        const fileInputs = document.querySelectorAll(".ginput_container_fileupload input[type='file']");

        [...fileInputs].forEach((input) => {
            if (!input.hasAttribute("multiple")) {
                if (input.files.length == 0) {
                    input.parentNode.parentNode.querySelector(".js-file-name").innerText = "No file chosen";
                }
            }
        });
    });

    function setMaxLengthForPhoneInput() {
        const phoneInputElements = document.querySelectorAll(".ginput_container_phone");

        phoneInputElements.forEach((el) => {
            const elInput = el.querySelector("input");

            elInput.maxLength = 9;
        });
    }

    /**
     * Init Functions
     */
    delegateEvent("DOMSubtreeModified", ".gform_wrapper", () => {
        setupRadio();
        setupFiles();
        initChosen();
    });

    document.addEventListener("DOMContentLoaded", () => {
        setupRadio();
        setupFiles();
        setMaxLengthForPhoneInput();
        initChosen();
    });
