const func = (e) => {
    const tab = e.split(' ')
    tab.map((x, k) => {
        const stringX = x.toString()
        const splicedX = stringX.slice(1, -1)
        if (document.getElementById(splicedX) === null) {
            return null
        } else {
            tab.splice(k, 1)
            elementHandler(document.getElementById(splicedX), tab)
        }
    })
}

//Error handler
const elementHandler = (element) => {
    switch (element.tagName) {
        case 'INPUT':
            element.focus()
            element.className = "form-control is-invalid"
            break;
        case 'BUTTON':
            element.click()
            break;
        case 'TEXTAREA':
            element.focus()
            break;
        default:
            break;
    }
}
