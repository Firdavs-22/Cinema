document.querySelector  ('#phonenum').addEventListener('focusout', addphone);
document.querySelector  ('#phonepass').addEventListener('focusout', addpass);


document.querySelector('#sign-button').addEventListener('click', function() {
    addphone();
    addpass();
});

function addphone() {
    let message, text;
    let errElement = document.getElementById('phonenum');
    message = document.getElementById('phon-err');
    text = document.getElementById('phonenum').value;

    try {
        if(text == ""){
            errElement.classList.remove('valid');
            errElement.classList.add('phone-err');
            throw 'kiritilmagan'
        } 
        if(text.length > 0){
            errElement.classList.remove('phone-err');
            errElement.classList.add('valid');
            message.innerHTML = ''
        }
    } catch(e){
            message.innerHTML = 'Qiymat ' + e;
    }

}

function addpass() {
    let message, text;
    let errElement = document.getElementById('phonepass');
    message = document.getElementById('phon-pass-err');
    text = document.getElementById('phonepass').value;

    try {
        if(text == ""){
            errElement.classList.remove('valid');
            errElement.classList.add('phone-err');
            throw 'kiritilmagan'
        } 
        if(text.length > 0){
            errElement.classList.remove('phone-err');
            errElement.classList.add('valid');
            message.innerHTML = ''
        }
    } catch(e){
            message.innerHTML = 'Qiymat ' + e;
    }

}