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
        document.getElementById(x) ?
            console.log('Super', x) :
            console.log('Pas super', x)
    })
}

var stepsList = [];
if (typeof jsonstring === 'undefined' || jsonstring === null) {
    var json = {};
    var steps = {};
} else {

    console.log(typeof json)
    if (typeof jsonstring === 'object') {
        var json = jsonstring
    } else {
        console.log(typeof jsonstring)
        var json = JSON.parse(jsonstring)
    }
    console.log(json);
    var steps = json.steps;
    document.getElementById('script_name').value = json['script_name'];
    document.getElementById('summary').textContent = json['summary'];
    var liste = document.getElementById('step_list');
    var stepsKeys = Object.keys(steps);
    stepsKeys.forEach(element => {
        //TODO: Mettre les boutons dans le tbody
        stepsList.push(element);
        var row = document.createElement('tr');
        row.setAttribute('name', element);
        var td = document.createElement('td');
        td.innerHTML = element;
        row.appendChild(td);
        liste.appendChild(row);
        var select_box = document.getElementById('first_step');
        var opt = document.createElement('option');
        opt.value = element;
        opt.innerHTML = element;
        select_box.appendChild(opt);

        var btn = document.createElement('button');
        btn.setAttribute('id', element);
        btn.innerHTML = "Modifier";
        btn.className = 'btn btn-info'
        btn.style.margin = '0.5em'
        btn.setAttribute("type", "button")
        btn.setAttribute("data-toggle", "modal")
        btn.setAttribute("data-target", "#exampleModal")
        row.appendChild(btn);
        btn.addEventListener('click', modifyButton);


        var btnDel = document.createElement('button');
        btnDel.setAttribute('id', element);
        btnDel.innerHTML = "Supprimer";
        btnDel.className = 'btn btn-danger'
        btnDel.style.margin = '0.5em'
        row.appendChild(btnDel);
        btnDel.addEventListener('click', deleteBtn);
    });
}

function deleteBtn() {
    var step_name = this.id;
    delete steps[step_name];
    var row = document.getElementsByName(step_name)[0];
    row.parentNode.removeChild(row);
}
//
function modifyButton() {
    var step_name = this.id;
    var step = steps[step_name];

    document.getElementById('step_name').value = step_name;
    document.getElementById('question').textContent = step['question'];
    document.getElementById('answer1').textContent = step['answers'][0]['answer'];
    if (!!step['answers'][0]['return_message']) {
        document.getElementById('return_message1').textContent = step['answers'][0]['return_message'];
    }
    step['answers'][0]['actions'].forEach(element => {
        if (element['action'] == 'add_points') {
            document.getElementById('addpoints1').checked = true;
        } else {
            if (element['action'] == 'endgame') {
                document.getElementById('endgame1').checked = true;
                if (!!element['value']) {
                    document.getElementById('endgame_value1').textContent = element['value'];
                }
            } else {
                if (element['action'] == 'rankup') {
                    document.getElementById('rankup1').checked = true;
                    if (element['value'] == 'gold') {
                        document.getElementById('rankup_select1').getElementsByTagName('option')[0].selected = true;
                    } else {
                        if (element['value'] == 'silver') {
                            document.getElementById('rankup_select1').getElementsByTagName('option')[1].selected = true;
                        } else {
                            document.getElementById('rankup_select1').getElementsByTagName('option')[2].selected = true;
                        }
                    }
                    if (element.hasOwnProperty("message")) {
                        document.getElementById('rankup_value1').textContent = element['message'];
                    }
                }
            }
        }
    });
    if (!!step['answers'][0]["next_step"]) {
        document.getElementById('next_step1').value = step['answers'][0]["next_step"];
    }


    document.getElementById('answer2').textContent = step['answers'][1]['answer'];
    if (!!step['answers'][1]['return_message']) {
        document.getElementById('return_message2').textContent = step['answers'][1]['return_message'];
    }
    step['answers'][1]['actions'].forEach(element => {
        if (element['action'] == 'add_points') {
            document.getElementById('addpoints2').checked = true;
        } else {
            if (element['action'] == 'endgame') {
                document.getElementById('endgame2').checked = true;
                if (!!element['value']) {
                    document.getElementById('endgame_value2').textContent = element['value'];
                }
            } else {
                if (element['action'] == 'rankup') {
                    document.getElementById('rankup2').checked = true;
                    if (element['value'] == 'gold') {
                        document.getElementById('rankup_select2').getElementsByTagName('option')[1].selected = true;
                    } else {
                        if (element['value'] == 'silver') {
                            document.getElementById('rankup_select2').getElementsByTagName('option')[1].selected = true;
                        } else {
                            document.getElementById('rankup_select2').getElementsByTagName('option')[1].selected = true;
                        }
                    }
                    if (element.hasOwnProperty("message")) {
                        document.getElementById('rankup_value2').textContent = element['message'];
                    }
                }
            }
        }
    });
    if (!!step['answers'][1]["next_step"]) {
        document.getElementById('next_step2').value = step['answers'][1]["next_step"];
    }
    // document.getElementById('favDialog').showModal();
}

function modify(event) {



    document.querySelectorAll('#step_list > tr').forEach(x => {
        console.log(x)
    })

    var step_name = document.getElementById('step_name').value;
    var question = document.getElementById('question').value;

    var answer1 = document.getElementById('answer1').value;
    var return_message1 = document.getElementById('return_message1').value;
    if (return_message1 == "") {
        return_message1 = "null";
    }
    var next_step1 = document.getElementById('next_step1').value;
    if (next_step1 == "") {
        next_step1 = "null";
    }
    var actions1 = [];
    if (document.getElementById('rankup1').checked) {
        var rankup_message1 = document.getElementById('rankup_value1').value;
        var select_box = document.getElementById('rankup_select1');
        var value1 = select_box.options[select_box.selectedIndex].value;
        var rankup1 = {
            'action': 'rankup',
            'value': value1,
            'message': rankup_message1
        }
        actions1.push(rankup1);
    }

    var actions2 = [];
    if (document.getElementById('endgame1').checked) {
        var endgame_value1 = document.getElementById('endgame_value1').value;
        var endgame1 = {
            'action': 'end_game',
            'value': endgame_value1
        }
        actions1.push(endgame1);
    }
    if (document.getElementById('addpoints1').checked) {
        actions1.push({
            'action': 'addpoints',
            'value': '1'
        });
    }

    var answer2 = document.getElementById('answer2').value;
    var return_message2 = document.getElementById('return_message2').value;
    if (return_message2 == "") {
        return_message2 = "s";
    }
    var next_step2 = document.getElementById('next_step2').value;
    if (next_step2 == "") {
        next_step2 = "null";
    }
    if (document.getElementById('rankup2').checked) {
        var rankup_value2 = document.getElementById('rankup_value2').value;
        var select_box = document.getElementById('rankup_select2');
        var value2 = select_box.options[select_box.selectedIndex].value;
        var rankup1 = {
            'action': 'rankup',
            'value': value2,
            'message': rankup_value2
        }
        actions2.push(rankup2);
    }
    if (document.getElementById('endgame2').checked) {
        var endgame_value2 = document.getElementById('endgame_value2').value;
        var endgame2 = {
            'action': 'end_game',
            'value': endgame_value2
        }
        actions2.push(endgame2);
    }
    if (document.getElementById('addpoints2').checked) {
        actions2.push({
            'action': 'addpoints',
            'value': '1'
        });
    }
    if (actions1.length === 0) {
        actions1.push({
            'action': 'addpoints',
            'value': '1'
        });
    }

    if (actions2.length === 0) {
        actions2.push({
            'action': 'addpoints',
            'value': '1'
        });
    }

    var answer1 = {
        'answer': answer1,
        'return_message': return_message1,
        'actions': actions1,
        'next_step': next_step1
    };
    var answer2 = {
        'answer': answer2,
        'return_message': return_message2,
        'actions': actions2,
        'next_step': next_step2
    };

    var data = {
        // 'step_name' : step_name,
        'question': question,
        'answers': [
            answer1,
            answer2
        ],
        'options': {}
    }
    if (!(step_name in steps)) { //!(json['steps'].hasOwnProperty(step_name))
        //stepsList.includes(step_name) typeof json !== 'undefined')||  
        addStep(step_name);
        // steps[step_name] = data;  
    }
    steps[step_name] = data;
    document.getElementsByClassName('step_form')[0].reset();
    // favDialog.close(JSON.stringify(data, null, "  "));
}

document.getElementsByClassName('step_form')[0].addEventListener('submit', modify);



//soumission du formulaire contenant le script complet
function handleSubmit(event) {
    event.preventDefault();
    var script_name = document.getElementById('script_name').value;
    var summary = document.getElementById('summary').value;
    var select_box = document.getElementById('first_step');
    var first_step = select_box.options[select_box.selectedIndex].text;
    var selectpack = document.getElementById('pack');
    var pack = selectpack.options[selectpack.selectedIndex].id;
    var selectcharacter = document.getElementById('character_id');
    var charcter = selectcharacter.options[selectcharacter.selectedIndex].id;
    json = {
        'script_name': script_name,
        'summary': summary,
        'version': 1,
        'script_background': "blabla.jpg",
        'initial_step': first_step,
        'character_id': charcter,
        'pack': pack,
        'steps': steps
    };
    var sendForm = document.createElement("form");
    sendForm.setAttribute('method', "post");
    sendForm.setAttribute('action', "validate.php");

    var input = document.createElement("input");
    input.setAttribute('type', "hidden");
    input.setAttribute('name', "json");
    input.setAttribute('value', "");
    input.value = JSON.stringify(json);
    sendForm.appendChild(input);
    document.getElementsByTagName("body")[0].appendChild(sendForm);
    sendForm.submit();

}
document.getElementById('submit').addEventListener('click', handleSubmit);

//ouvre la fenetre qui ajoute une étape 
var updateButton = document.getElementById('add_step_btn');
updateButton.addEventListener('click', function () {
    // document.getElementById('favDialog').showModal();
})


//ajout d'une étape dans la selectbox ajout d'étape 
function addStep(step_name) {
    var table = document.getElementById("step_list");
    var row = document.createElement('tr');
    row.setAttribute('name', step_name);
    var td = document.createElement('td');
    td.innerHTML = step_name;
    row.appendChild(td);
    table.appendChild(row);

    var select_box = document.getElementById('first_step');
    var opt = document.createElement('option');
    opt.value = step_name;
    opt.innerHTML = step_name;
    select_box.appendChild(opt);
    var btn = document.createElement('button');
    btn.setAttribute('id', step_name);
    btn.innerHTML = "Modifier";
    row.appendChild(btn);
    btn.addEventListener('click', modifyButton);
    var btnDel = document.createElement('button');
    btnDel.setAttribute('id', step_name);
    btnDel.innerHTML = "Supprimer";
    row.appendChild(btnDel);
    btnDel.addEventListener('click', deleteBtn);
}

function saveDraft() {}

// Check if the file is a JSON or not. And activate the buttonss
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