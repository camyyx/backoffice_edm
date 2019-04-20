const watch = (e) => {
    if (e.files[0].name.split('.')[1] === 'json') {
        document.getElementById('input').disabled = false
        document.getElementById('label').innerText = e.files[0].name
    } else {
        document.getElementById('input').disabled = true
        document.getElementById('label').innerText = "Choisissez une histoire"
    }
}
// function jsonChoice(){
//     var radioList = document.getElementsByName("jsonChoice");
//     radioList.forEach(element => {
//         if (element.checked){
//             console.log (element.id);
//             var json = choiceList[element.id];
//             document.getElementById('json').setAttribute('value', JSON.stringify(json));
//             console.log(JSON.stringify(json));
//             // document.getElementById('submitJson').submit();
//         }
//     });
// }