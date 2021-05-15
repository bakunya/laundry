async function getData(id) {
    const rawData = await fetch(`${BASEURL}/pegawai/getpegawai/${id}`)
    const data = await rawData.json()
    return data
}

document.addEventListener("DOMContentLoaded", () => {
    const buttonUpdate = document.querySelectorAll("button[data-modal='update']")
    const buttonDetail = document.querySelectorAll(".detail")

    buttonUpdate.forEach(button => {
        button.addEventListener("click", async () => {
            const id = button.dataset.id
            try {
                const rawData = await fetch(`${BASEURL}/pegawai/getpegawai/${id}`)
                const data = await rawData.json()
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

    buttonDetail.forEach(button => {
        button.addEventListener("click", async (e) => {
            try {
                document.querySelectorAll(".inner").forEach(elm => elm.innerText = "Loading...")
                const data = await getData(e.target.dataset.id)
                delete data.password
                updateModal(data)
            } catch (err) {
                console.log(err);
                document.querySelectorAll(".inner").forEach(elm => elm.innerText = err.message)
            }
        })
    })
})