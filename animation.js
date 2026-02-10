ocument.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll("a");

    links.forEach(link => {
        link.addEventListener("click", event => {
            const href = link.getAttribute("href");

            // Ignore external links, anchors, and new tabs
            if (
                !href ||
                href.startsWith("http") ||
                href.startsWith("#") ||
                link.target === "_blank"
            ) return;

            event.preventDefault();

            document.body.classList.add("fade-out");

            setTimeout(() => {
                window.location.href = href;
            }, 400); // must match CSS transition
        });
    });
});
window.addEventListener("load", () => {
    document.body.style.opacity = 1;
});