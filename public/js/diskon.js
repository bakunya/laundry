document.addEventListener("DOMContentLoaded", () => {
    const tambahForm = document.querySelector(".container-modal[data-name=tambah] form")
    const updateForm = document.querySelector(".container-modal[data-name=update] form")
    const buttonDetail = document.querySelectorAll(".edit")

    tambahForm.addEventListener("submit", async (e) => {
        e.preventDefault()
        if (document.getElementById("semua-tambah").checked) {
          return await runSwal(tambahForm, "Diskon layanan semua Oulet?", "paket di semua outlet.")
        }
        return tambahForm.submit()
    })

    updateForm.addEventListener("submit", async (e) => {
      e.preventDefault()
      if(document.getElementById("berakhir-update").checked === false) {
        return await runSwal(updateForm, "Akhiri diskon ini?", "yang terhubung.")
      }
      return updateForm.submit()
    })

    buttonDetail.forEach(button => {
      button.addEventListener("click", async (e) => {
        try {
          const id = e.target.dataset.id
          const data = await getData(id)
          updateFormEdit(data);
        } catch (err) {
          console.log(err);
          const button = document.querySelector(".container-modal[data-name='update']").querySelector("button[name='submit']")
          button.disabled = true
          button.innerText = "Not Allowed"
          button.style.backgroundColor = "red"
          button.style.cursor = "not-allowed"
        }
      })
    })
})

async function runSwal(form, title, text) {  
  const opt = {
    title: title,
    text: `Ini akan mempengaruhi seluruh data ${text}`,
    icon: "warning",
    buttons: [ 'No', 'Yes' ],
    dangerMode: true,
  }
  const isConfirm = await swal(opt)
  if (isConfirm) {
    return form.submit();
  }
  return swal("Dibatalkan", "Data anda aman :)", "error");
}

async function getData(id_ds) {
  try {
    const rawData = await fetch(`${BASEURL}/diskon/getdiskon/${id_ds}`)
    const {id, diskon, date_end, nama} = await rawData.json()
    return {
      id,
      diskon,
      date_end ,
      nama
    }
  } catch (err) {
    console.log(err);
    throw Error(err)
  }
}