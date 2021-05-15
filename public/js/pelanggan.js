async function getData(id) {
    const rawData = await fetch(`${BASEURL}/pelanggan/getpelanggan/${id}`)
    const data = await rawData.json()
    return data
}

document.addEventListener("DOMContentLoaded", () => {
    const buttonUpdate = document.querySelectorAll("button[data-modal='update']")

    buttonUpdate.forEach(button => {
        button.addEventListener("click", async () => {
            const id = button.dataset.id
            console.log(id);
            try {
                const data = await getData(id)
                delete data.id_outlet
                delete data.password
                delete data.role
                delete data.telp
                updateFormEdit(data)
            } catch (error) {
                console.log(error);
                const button = document.querySelector(".container-modal[data-name='update']").querySelector("button[name='submit']")
                button.disabled = true
                button.innerText = "Not Allowed"
                button.style.backgroundColor = "red"
                button.style.cursor = "not-allowed"
            }
        })
    })
})