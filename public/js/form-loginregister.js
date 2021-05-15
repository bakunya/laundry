
document.addEventListener("DOMContentLoaded", () => {
    const showPassword = document.querySelectorAll(".show-password")
    const input = document.querySelectorAll("input")
    // const registerform = document.getElementById("register")

    showPassword.forEach(elm => {
        elm.addEventListener("click", () => {
            const inputPassword = document.querySelectorAll(".password")
            inputPassword.forEach(elm => elm.type === "password" ? elm.type = "text" : elm.type = "password")
            showPassword.forEach(elm => elm.src.split("/").pop() === "eye-slash.svg" ? elm.src = `${BASEURL}/img/eye.svg` : elm.src = `${BASEURL}/img/eye-slash.svg` )
        })
    })

    input.forEach(elm => {
        let id;
        elm.addEventListener("focus", () => {
            id = elm.id
            let imgLabel = document.querySelector(`label[for=${id}]`).children[0]
            if (imgLabel) {
                const currentImg = imgLabel.src.split("/").pop().split(".")[0]
                imgLabel.src = `${BASEURL}/img/${currentImg}-fill.svg`
                elm.parentElement.classList.add("input-active")
            }
        })

        elm.addEventListener("blur", () => {
            id = elm.id
            const imgLabel = document.querySelector(`label[for=${id}]`).children[0]
            if (imgLabel) {
                const currentImg = imgLabel.src.split("/").pop().split(".")[0].split("-")[0]
                imgLabel.src = `${BASEURL}/img/${currentImg}.svg`
                elm.parentElement.classList.remove("input-active")
            }
        })
    })
})