document.addEventListener("DOMContentLoaded", () => {
    // Grab all nav links
    const navLinks = document.querySelectorAll(".links a");
    // Get the body id
    const bodyID = document.body.id;

    // Loop through links
    navLinks.forEach(link => {
        if (link.dataset.active === bodyID) {
            link.classList.add("active");
        }
    });
});
