const watch = (e) => {
    if (e.files[0].name.split('.')[1] === 'json') {
        document.getElementById('input').disabled = false
        document.getElementById('label').innerText = e.files[0].name
    } else {
        document.getElementById('input').disabled = true    
        document.getElementById('label').innerText = "Choisissez une histoire"
    }
} 
function afficherManuel(){
    // var form = document.getElementById("manualForm");s

    if(document.getElementById("manualForm").style.display == 'none'){
        console.log("Afficher")
        document.getElementById("manualForm").style.display = "flex";
    }else{
        document.getElementById("manualForm").style.display = "none";
    }

}