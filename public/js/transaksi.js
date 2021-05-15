document.addEventListener("DOMContentLoaded", async () => {
    const idPaket = document.getElementById("paket")
    const formTambah = document.querySelector("#form-tambah")
    const buttonEditStatus = document.querySelectorAll(".edit.status")

    buttonEditStatus.forEach(button => {
        button.addEventListener('click', async () => {
            const id = button.dataset.id
            try {
                const rawData = await fetch(`${BASEURL}/transaksi/getstatus/${id}`)
                const data = await rawData.json()
                updateFormEdit(data)
                document.getElementById("id-update").value = id
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

    if (idPaket) {
        await handleDataDiskon(idPaket.value)


        idPaket.addEventListener("change", async e => {
            await handleDataDiskon(e.target.value)
        })
    }

    if (formTambah) {
        formTambah.addEventListener("submit", async (e) => {
            e.preventDefault()
            await runSwal(formTambah)
        })
    }
})

async function getData(url) {
    try {
        const rawData = await fetch(url)
        const data = rawData.json()
        return data
    } catch (err) {
        throw Error(err)
    }
}

async function handleDataDiskon(id) {
    try {
        const url = `${BASEURL}/paket/getpaketdiskon/${id}`
        document.getElementById("button-tambah").disabled = true
        const data = await getData(url)
        document.getElementById("button-tambah").disabled = false
        if (data !== false) return updateDiskonInput(data.diskon)
        return updateDiskonInput(0)
    } catch (err) {
        console.log(err);
        document.getElementById("button-tambah").disabled = true
    }
}

function updateDiskonInput(value) {
    document.getElementById("diskon").value = value
}

async function runSwal(form) {
  const opt = {
    title: "Transaksi",
    text: `Silahkan di cek kembali, ini tidak dapat di edit.`,
    icon: "warning",
    buttons: [ 'Close', 'Submit' ],
    dangerMode: true,
  }
  const isConfirm = await swal(opt)
  if (isConfirm) {
    const submitForm = Object.getPrototypeOf(form).submit
    return submitForm.call(form)
  }
  return swal("Dibatalkan", "Silahkan cek kembali :)", "error");
}