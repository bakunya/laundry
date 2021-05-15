document.addEventListener("DOMContentLoaded", () => {
    const buttonModal = document.querySelectorAll("[data-modal]")
    
    buttonModal.forEach(elm => elm.addEventListener("click", () => {
        const modal = document.querySelector(`.container-modal[data-name = ${elm.dataset.modal}]`)
        const close = document.querySelector(`.close-modal[data-name = ${elm.dataset.modal}]`)
        modal.classList.add("visible")

        close.addEventListener("click", () => {
            modal.classList.remove("visible")
        })
    }))
})