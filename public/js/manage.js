document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".delete")
    links.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault()
            swal({
                title: 'Apa kamu yakin?', 
                text: 'Data akan terhapus permanent', 
                icon: 'warning', 
                buttons: [
                  'No, cancel it!',
                  'Yes, I am sure!'
                ],
            }).then(isConfirm => {
                if (isConfirm) {
                    window.location.replace(e.target.href)
                } else {
                    swal("Cancelled", "Your imaginary data is safe :)", "error");
                }
            })
        })
    })

    const search = document.getElementById("search")
    search && search.addEventListener("keydown", e => {
        if (e.key === "Enter") {
            window.location.replace(`${BASEURL}/${e.target.dataset.path}/${e.target.value}`)
        }
    })
})
