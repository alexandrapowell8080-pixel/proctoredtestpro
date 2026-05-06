window.addEventListener("load", function () {
    const preloader = document.getElementById("page-preloader");
    if (preloader) {
        preloader.classList.add("preloader-hidden");
        // Optional: remove it from the DOM entirely after the fade out
        setTimeout(() => preloader.remove(), 500);
    }
});
