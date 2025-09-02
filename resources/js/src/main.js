document.addEventListener("DOMContentLoaded", () => {
    /**
     * ========================
     *  Fancybox Init
     * ========================
     */
    Fancybox.bind("[data-fancybox]", {});
    Fancybox.bind("img.data-fancybox", {});
    Fancybox.bind(".data-fancybox img", {});

    /**
     * ========================
     *  Alerts (click to hide)
     * ========================
     */
    $(".alert-click-hide").on("click", function () {
        $(this).fadeOut();
    });

    /**
     * ========================
     *  Toastr Config
     * ========================
     */
    toastr.options = {
        progressBar: true,
        preventDuplicates: true,
        newestOnTop: true,
        positionClass: "toast-top-left",
        timeOut: 10000,
    };

    // لو محتاج تستخدمه باسم تاني
    const smart_alert = toastr;

    /**
     * ========================
     *  Favicon Badge
     * ========================
     */
    const favicon = new Favico({
        bgColor: "#dc0000",
        textColor: "#fff",
        animation: "slide",
        fontStyle: "bold",
        fontFamily: "sans",
        type: "circle",
    });

    // مثال لتغيير الرقم في الأيقونة
    // favicon.badge(5);
});
