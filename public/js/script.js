
const BASEURL = "http://localhost/laundry/public"

function updateFormEdit(data) {
    data.password && delete data.password
    for (const key in data) {
        document.getElementById(`${key}-update`).value = data[key]
    }
}

function updateModal(data) {
    const modalContainer = document.querySelector(".container-modal[data-name='detail']")
    for (const key in data) {
        if(modalContainer.querySelector(`.${key}`)) 
            modalContainer.querySelector(`.${key}`).innerText = data[key]
    }
};

const isSelectorValid = ((element) => 
    (selector) => {
        try { element.querySelector(selector) } catch { return false }
        return true
    }
)(document.createDocumentFragment())

document.addEventListener("DOMContentLoaded", e => {
    const buttonPrint = document.querySelectorAll(".print")
    const updateCredentias = document.getElementById("updateCredentials")
    buttonPrint.forEach(elm => {
        elm.addEventListener("click", () => window.print())
    })
})