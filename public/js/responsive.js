const menu = document.querySelector(".menu-button");
const aside = document.querySelector("aside");
const sideBarClose = document.querySelector(".close-sidebar");

menu.addEventListener("click", () => {
    aside.style.animation = "300ms slideRight forwards";
});

sideBarClose.addEventListener("click", () => {
    aside.style.animation = "300ms slideLeft forwards";
});
