const scrollButton = document.querySelector(".scroll-button");
const navbar = document.querySelector(".navbar");

scrollButton.addEventListener("click", () => {
    navbar.classList.toggle("active");
});