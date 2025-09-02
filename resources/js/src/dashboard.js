document.addEventListener("DOMContentLoaded", () => {
    // Toggle Aside
    $(".asideToggle").on("click", () => {
        $(".aside, .main-content").toggleClass("active in-active");
    });

    // Tabs
    $(".settings-tab-opener").on("click", function () {
        $(".settings-tab-opener").removeClass("active");
        $(this).addClass("active");
        $(".taber").removeClass("active");
        $("#" + $(this).data("opentab")).addClass("active");
    });

    // Active Link in Aside
    const url = window.location;
    const basePath = `${url.protocol}//${url.host}/${
        url.pathname.split("/")[1]
    }/${url.pathname.split("/")[2]}`;
    const $activeLink = $(
        `.aside a[href='${basePath}'], .aside a[href='${url.href}']`
    );

    $activeLink
        .closest(".item")
        .find(".item-container, .sub-item")
        .addClass("active");
    $activeLink
        .closest(".sub-item")
        .find(`a[href='${basePath}']`)
        .addClass("active");
    $activeLink.children("div").addClass("active");
    $activeLink.addClass("active");

    $("input[required], select[required], textarea[required]").each(
        function () {
            let $labelDiv = $(this)
                .closest(".col-12.pt-3, .col-12.p-3")
                .prev(".col-12");
            if ($labelDiv.find("span").length > 0) {
                $labelDiv
                    .find("span:first")
                    .append('<span style="color:red;font-size:16px"> *</span>');
            } else {
                $labelDiv.append(
                    '<span style="color:red;font-size:16px"> *</span>'
                );
            }
        }
    );

    // Character Counter
    const addCounter = (el) => {
        const $parent = $(el).parent();
        $parent.find(".last_appended_counter").remove();
        $parent.append(`
            <div class="col-12 p-2 last_appended_counter">
                <span style="font-size:13px">عدد الحروف 
                    <span style="font-weight:bolder;color:#007469;font-size:15px">${
                        $(el).val().length
                    }</span> حرفاً
                </span>
            </div>
        `);
    };

    $(
        "[name='title'],[name='slug'],[name='meta_description'],[name='description_ar'],[name='description_en']"
    )
        .not(".not-countable")
        .on("input", function () {
            addCounter(this);
        })
        .each(function () {
            addCounter(this);
        });

    // Select2
    $(".select2-select").select2();

    // Loading fade
    setTimeout(() => $("#loading-image-container").fadeOut(), 500);

    // File Upload Preview
    $('input[type="file"]').on("change", function (e) {
        const randKey = Math.random().toString(36).substr(2, 7);
        $(this).attr("rand_key", randKey);
        $("#upload_" + $(this).attr("rand_key")).remove();

        if (e.target.files.length) {
            $(this).after(
                `<div class="col-12 py-2 px-0" id="upload_${randKey}"></div>`
            );
            $.each(e.target.files, (i, file) => {
                $(`#upload_${randKey}`).append(`
                    <div class="row d-flex m-0 btn" style="border:1px solid #8882;max-width:100%;padding:5px;width:220px;background:#8e8e8e10;margin-bottom:10px!important">
                        <div style="max-height:35px;overflow:hidden;display:flex;flex-flow:nowrap;" class="p-0 align-items-center">
                            <span class="d-inline-block font-small" style="line-height:1.2;opacity:0.7;border-radius:12px;overflow:hidden;width:71px">
                                <span class="fal fa-cloud-download p-2 font-2 me-2" style="background:#8181813d;border-radius:12px;"></span>
                            </span>
                            <span style="direction:ltr;position:relative;top:-2px;height:14px;overflow:hidden" class="d-inline-block naskh font-small">${
                                file.name
                            }</span>
                            <span class="d-inline-block font-small px-2" style="font-weight:bold;">${(
                                file.size / 1000000
                            ).toFixed(2)}M</span>
                        </div>
                    </div>
                `);
            });
        }
    });

    // Item Container Toggle
    $(".item-container").on("click", function () {
        $(this).siblings().find(".sub-item").slideToggle("fast");
    });

    // Dashboard Divider
    $("#home-dashboard-divider").css("width", "40%");
});

function setLoading(button, isLoading) {
    let icon = button.querySelector("i");
    if (isLoading) {
        button.disabled = true;
        icon.classList.remove(...icon.classList);
        icon.classList.add("fas", "fa-spinner", "fa-spin");
    } else {
        button.disabled = false;
        icon.classList.remove(...icon.classList);
        icon.classList.add("fas", "fa-robot");
    }
}

window.callAiGenerate = function (
    type,
    inputSelector,
    fallbackSelector = null,
    isSelect = false,
    btnId = null
) {
    let content = document
        .querySelector('textarea[name="description"]')
        .value.trim();

    if (!content && fallbackSelector) {
        content = document.querySelector(fallbackSelector).value.trim();
    }

    if (!content) {
        toastr.error(
            "من فضلك اكتب الوصف أو العنوان أولاً قبل استخدام الذكاء الاصطناعي"
        );
        return;
    }

    let btn = btnId ? document.getElementById(btnId) : null;
    if (btn) setLoading(btn, true);

    fetch("/admin/ai/generate", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            type: type,
            content: content,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.status === "success") {
                if (isSelect) {
                    let select = document.querySelector(inputSelector);
                    select.innerHTML = "";
                    data.response.forEach((tag) => {
                        let option = document.createElement("option");
                        option.value = tag;
                        option.textContent = tag;
                        option.selected = true;
                        select.appendChild(option);
                    });
                    toastr.success("تم توليد الوسوم بنجاح");
                } else {
                    let el = document.querySelector(inputSelector);
                    if (el && el.classList.contains("editor")) {
                        if (tinymce.get(el.id)) {
                            tinymce.get(el.id).setContent(data.response);
                        }
                    } else {
                        el.value = data.response;
                    }
                    toastr.success("تم التوليد بنجاح");
                }
            } else {
                toastr.error(data.message || "حدث خطأ غير متوقع");
            }
        })
        .catch((err) => {
            toastr.error("خطأ في الاتصال بالخادم");
            console.error(err);
        })
        .finally(() => {
            if (btn) setLoading(btn, false);
        });
};
