// show and hide password
const password = document.querySelector(".pass");
const btn_show = document.querySelector(".eye");

function toggle() {
    if(password.type === "password") {
        password.type = "text";
        btn_show.classList.add("hide");
    } else {
        password.type = "password";
        btn_show.classList.remove("hide");
    }
}

// show eye icon when filled
if(password.value === "") {
    btn_show.style.display = "";
}