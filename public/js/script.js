const overlay = document.querySelector(".overlay");
const boxNotifikasi = overlay.querySelector(".notifikasi");
const btnClose = overlay.querySelector("i");

function showNotifikasi() {
    overlay.style.animation = "300ms fadeIn forwards";
    overlay.style.display = "flex";
    boxNotifikasi.style.animation = "500ms fadeDown forwards";
}

btnClose.addEventListener("click", () => {
    boxNotifikasi.style.animation = "500ms fadeUp forwards";
    setTimeout(() => {
        overlay.style.animation = "300ms fadeOut forwards";
        setTimeout(() => {
            overlay.style.display = "none";
        }, 300);
    }, 200);
});

showNotifikasi();
