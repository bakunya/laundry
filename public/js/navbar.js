document.addEventListener("DOMContentLoaded", () => {
    const menu = document.querySelector(".menu-button")
    const urlpath = window.location.pathname.split("/").pop()
    if (isSelectorValid(urlpath) && document.querySelector(`.${urlpath}`) !== null) {
        document.querySelector(`.${urlpath}`).classList.add("active")
    }
    
    menu.addEventListener("click", () => {
        const menu = document.getElementById("sidebar")
        menu.classList && menu.classList.add("visible")
    
        document.querySelector(".close").addEventListener("click", () => {
            menu.classList && menu.classList.remove("visible")
        })
    })

})