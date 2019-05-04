// Enable all tooltips
$('[data-toggle="tooltip"]').tooltip();

const func = (e) => {
        const tab = e.split(' ')
    console.log(tab.length)
    tab.map((x,k) => {
        const  stringX = x.toString()
        const splicedX = stringX.slice(1, -1)
        if (document.getElementById(splicedX) === null) {
            return null
        } else {
            tab.splice(k, 1)
            elementHandler(document.getElementById(splicedX), tab)
        }
    })
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

const newMap = (tab) => {
    tab.map(x => {
        document.getElementById(x)
            ? console.log('Super', x)
            : console.log('Pas super', x)
    })
}

const watch = (e) => {
    if (e.files[0].name.split('.')[1] === 'json') {
        document.getElementById('input').disabled = false
        document.getElementById('label').innerText = e.files[0].name
    } else {
        document.getElementById('input').disabled = true
        document.getElementById('label').innerText = "Choisissez une histoire"
    }
}