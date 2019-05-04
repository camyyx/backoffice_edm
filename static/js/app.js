const func = (e) => {
    const tab = e.split(' ')
    console.log(tab.length)
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

const checkBlankName = (el, button) => {
    const value = el.value
    console.log("set", value)
    if (value.trim()) {
        document.getElementById(button).disabled = false
    } else {
        document.getElementById(button).disabled = true
    }
}

const elementHandler = (element, tab) => {
    switch (element.tagName) {
        case 'INPUT':
            element.focus()
            element.className = "form-control is-invalid"
            console.log('Focused')
            break;
        case 'BUTTON':
            element.click()
            console.log('Click')
            newMap(tab)
            break;
        case 'TEXTAREA':
            element.focus()
            console.log('Focused')
            break;
        default:
            break;
    }
}