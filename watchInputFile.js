const watch = (e) => {
    if (e.files[0].name.split('.')[1] === 'json') {
        console.log('Good')
        document.getElementById('input').disabled = !document.getElementById('input').disabled
    } else {
        document.getElementById('input').disabled = 'true'
        console.log('pas good')        
    }
}