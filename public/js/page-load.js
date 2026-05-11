document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener("click", function (e) {
        const btn = e.target.closest(".js-paginate-btn");
        if (!btn) return;

        const url = btn.getAttribute("data-url");
        if (!url) return;

        e.preventDefault();

        const wrapper = document.getElementById("faq-wrapper");
        if (wrapper) {
            wrapper.style.transition = "opacity 0.15s ease-in-out";
            wrapper.style.opacity = "0.7";
        }

        fetch(url, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => response.text())
            .then((html) => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");
                const newWrapper = doc.getElementById("faq-wrapper");

                if (wrapper && newWrapper) {
                    wrapper.innerHTML = newWrapper.innerHTML;
                    wrapper.style.opacity = "1";

                    const headerOffset = 100;
                    const elementPosition = wrapper.getBoundingClientRect().top;
                    const offsetPosition =
                        elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "auto",
                    });
                }
            })
            .catch((err) => {
                console.error("Pagination fetch error:", err);
                if (wrapper) {
                    wrapper.style.opacity = "1";
                }
            });
    });
});
