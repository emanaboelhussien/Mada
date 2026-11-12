document.addEventListener("DOMContentLoaded", function() {
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");

    if (scrollToTopBtn) {
        // إظهار الزر بنعومة عند النزول أكثر من 300 بكسل
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                scrollToTopBtn.classList.add("show");
            } else {
                scrollToTopBtn.classList.remove("show");
            }
        });

        // الصعود لأعلى الصفحة بسلاسة عند الضغط على الزر
        scrollToTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    }
});