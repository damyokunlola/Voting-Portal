const togglebtn = document.getElementById("togglebtn");
const sidebar = document.getElementById("sidebar");

togglebtn.addEventListener("click", e => {
    sidebar.classList.toggle("navopen")
})