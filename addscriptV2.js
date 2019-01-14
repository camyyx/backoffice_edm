
var fileData = {};
var steps = {};

function handleSubmit(event){
    event.preventDefault();
    var script_name = document.getElementById('script_name').value;
    var summary = document.getElementById('summary').value;
    var select_box = document.getElementById('first_step');
    var first_step = select_box.options[select_box.selectedIndex].text;
    fileData = {
    'script_name': script_name,
    'summary': summary, 
    'initial_step' : first_step
    };
    fileData['steps'] = steps
    const dataContainer = document.getElementsByClassName('result_display')[0];
    dataContainer.textContent = JSON.stringify(fileData, null, "  ");
}
const submit_btn = document.getElementById('submit');
submit_btn.addEventListener('click', handleSubmit);


var favDialog = document.getElementsByClassName('modal-content')[0];
var outputBox = document.getElementsByClassName('step_result_display')[0];

const updateButton = document.getElementById('add_step_btn');
updateButton.addEventListener('click', function() {
    favDialog.showModal();
})

function addStep(step_name){

    var table = document.getElementById("step_list");
    var row = document.createElement('tr');
    var td = document.createElement('td');
    td.innerHTML = step_name;
    row.appendChild(td);
    table.appendChild(row);

    var select_box = document.getElementById('first_step');
    var opt = document.createElement('option');
    opt.value = step_name;
    opt.innerHTML = step_name;
    select_box.appendChild(opt);
}

function handleSubmitstep(event){
    event.preventDefault();
    var step_name = document.getElementById('step_name').value;
    var question = document.getElementById('question').value; 


    var answer1 = document.getElementById('answer1').value;
    var return_message1 = document.getElementById('return_message1').value;
    var next_step1 = document.getElementById('next_step1').value;
    var actions1 = [];
    if (document.getElementById('rankup1').checked){
        var rankup_message1 = document.getElementById('rankup_value1').value;
        var select_box = document.getElementById('rankup_select1');
        var value1 = select_box.options[select_box.selectedIndex].value;
        var rankup1 = {
            'action' : 'rankup',
            'value' : value1,
            'message' : rankup_message1 
        }
        actions1.push(rankup1);
    }

    var actions2 = [];
    if (document.getElementById('endgame1').checked){
        var endgame_value1 = document.getElementById('endgame_value1').value;
        var endgame1 = {
            'action' : 'end_game',
            'value' : endgame_value1
        }
        actions1.push(endgame1);
    }
    if (document.getElementById('addpoints1').checked){
        actions1.push({'action' : 'addpoints', 'value': '1'});
    }

    var answer2 = document.getElementById('answer2').value;
    var return_message2 = document.getElementById('return_message2').value;
    var next_step2 = document.getElementById('next_step2').value;
    if (document.getElementById('rankup2').checked){
        var rankup_value2 = document.getElementById('rankup_value2').value;
        var select_box = document.getElementById('rankup_select2');
        var value2 = select_box.options[select_box.selectedIndex].value;
        var rankup1 = {
            'action' : 'rankup',
            'value' : value2,
            'message' : rankup_value2
        }
        actions2.push(rankup2);
    }
    if (document.getElementById('endgame2').checked){
        var endgame_value2 = document.getElementById('endgame_value2').value;
        var endgame2 = {
            'action' : 'end_game',
            'value' : endgame_value2
        }
        actions2.push(endgame2);
    }
    if (document.getElementById('addpoints2').checked){
        actions2.push({'action' : 'addpoints', 'value': '1'});
    }
    if (actions1.length === 0){
        actions1.push({'action' : 'addpoints', 'value': '1'});
    }

    if (actions2.length === 0){
        actions2.push({'action' : 'addpoints', 'value': '1'});
    }
    
    var answer1 = {
            'answer' : answer1,
            'return_message': return_message1,
            'actions' : actions1,
            'next_step' : next_step1
    };
    var answer2 = {
            'answer' : answer2,
            'return_message': return_message2,
            'actions' : actions2,
            'next_step' : next_step2
    };

   

    var data = {
            // 'step_name' : step_name,
            'question': question,
            'answers' : [
                    answer1,
                    answer2
            ],
            'options' : {}  
    }
    const dataContainer = document.getElementsByClassName('step_result_display')[0];
    dataContainer.textContent = JSON.stringify(data, null, "  ");
    steps[step_name] = data;
    addStep(step_name);
    step_form.reset();
    favDialog.close(JSON.stringify(data, null, "  "));
}
const step_form = document.getElementsByClassName('step_form')[0];
step_form.addEventListener('submit', handleSubmitstep);
const dialog_close = document.getElementsByClassName('close')[0];
dialog_close.addEventListener('click', function() {
    favDialog.close();
});
