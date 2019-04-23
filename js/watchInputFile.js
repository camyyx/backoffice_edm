// Check if the file is a JSON or not. And activate the buttonss
function watch(e) {
    if (e.files[0].name.split('.')[1] === 'json') {
        document.getElementById('input').disabled = false
        document.getElementById('label').innerText = e.files[0].name
    } else {
        document.getElementById('input').disabled = true
        document.getElementById('label').innerText = "Choisissez une histoire"
    }
}