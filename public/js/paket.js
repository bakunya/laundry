async function getData(url) {
    const rawData = await fetch(`${BASEURL}/${url}`)
    const data = await rawData.json()
    return data
}

function setLayanan(data_layanan) {
    const layanan = document.querySelector(".layanan")
    switch (data_layanan) {
        case "delivery":
            layanan.innerHTML = "kilometer"
            break;
        case "fast wash":
            layanan.innerHTML = "cucian"
            break;
        case "sepatu":
            layanan.innerHTML = "pasang"
            break;
        default:
            layanan.innerHTML = data_layanan
            break;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const buttonUpdate = document.querySelectorAll("button[data-modal='update']")
    const buttonDetail = document.querySelectorAll(".detail")

    buttonUpdate.forEach(button => {
        button.addEventListener("click", async () => {
            const id = button.dataset.id
            try {
                const rawData = await fetch(`${BASEURL}/paket/getpaket/${id}`)
                const data = await rawData.json()
                delete data.final_harga
                delete data.id_outlet
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
            document.querySelector(".diskon.inner").innerText = 0
            try {
                const url = e.target.dataset.diskon === '' ? `paket/getpaket/${e.target.dataset.id}` : `paket/getpaketdiskon/${e.target.dataset.id}`
                const data = await getData(url)
                document.getElementById("img-detail").src = `${BASEURL}/img/${data.layanan.replace(" ", "-")}.png`
                const elmLi = data.service.split(",").map(service => `<li>${service.trim()}</li>`).join("")
                document.querySelector(".service").innerHTML = elmLi
                setLayanan(data.layanan)
                delete data.layanan
                delete data.diskon_id
                delete data.date_end
                delete data.service
                updateModal(data)
            } catch (err) {
                console.log(err);
                document.querySelectorAll(".inner").forEach(elm => elm.innerText = "error")
            }
        })
    })
})

