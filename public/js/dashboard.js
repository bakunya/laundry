const quotes = [
    "“The most courageous act is still to think for yourself. Aloud.”",
    "“Don't blame others as an excuse for your not working hard enough.”",
    "“Yesterday, you said tomorrow.”",
    "“To find yourself, think for yourself.”",
    "“Between stimulus and response, there is a space. In that space is our power to choose our response. In our response lies our growth and our freedom.”",
    "“My definition of a free society is a society where it is safe to be unpopular.”",
    "“Freedom cannot be bestowed — it must be achieved.”",
    "“The great revolution in the history of man, past, present and future, is the revolution of those determined to be free.”",
    "“Freedom is nothing but a chance to be better.”"
]

const svgClose = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>`

const svgList = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>`

document.addEventListener("DOMContentLoaded", () => {
    const random = Math.round(Math.random() * 5) + 1
    const bgRandom = `bg${random}.jpg`
    const containerDashboard = document.querySelector(".container-dashboard")
    const settingsButton = document.querySelector(".settings")
    containerDashboard.style.backgroundImage = `url(${BASEURL}/img/bg/${bgRandom})`
    
    const time = document.querySelector("span")
    
    setInterval(() => {
        const hours = new Date().getHours().toString()
        const minute = new Date().getMinutes().toString()
        time.innerText = `${hours.padStart(2, "0")}:${minute.padStart(2, "0")}`
    }, 1000)

    const quoteRandom = quotes[Math.round(Math.random() * 8)]
    document.querySelector(".quote").innerText = quoteRandom

    const menuBtn = document.querySelector(".menu-button")

    menuBtn.addEventListener("click", () => {
        const settingsButton = document.querySelector(".settings")
        const menu = document.getElementById("sidebar")
        menuBtn.innerHTML = menu.className === "visible" ? svgList : svgClose 
        menu.classList.toggle("visible")
        settingsButton.classList.toggle("none")
    
    
        // menuBtn.addEventListener("click", () => {
        //     menu.classList.remove("visible")
        // })
    })

    settingsButton.addEventListener("click", () => {
        const menuButton = document.querySelector(".menu")
        const formSettings = document.getElementById("settings")
        formSettings.classList.toggle("visible")
        menuButton.classList.toggle("none")
    })
})