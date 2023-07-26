document.querySelector  ('#username').addEventListener('focusout', addname );
document.querySelector  ('#phonenum').addEventListener('focusout', addpho);
document.querySelector  ('#phonepass').addEventListener('focusout', addpass);
document.querySelector  ('#surename').addEventListener('focusout', addsure);
document.querySelector  ('#mail').addEventListener('focusout', addmail);
document.querySelector  ('#phonepass2').addEventListener('focusout', addposs);

document.querySelector('#sign-button').addEventListener('click', function() {
    addname();
    addpho();
    addpass();
    addsure();
    addmail();
    addposs();
    addposs2();

});

function addname() {
    let message, text;
    let errElement = document.getElementById('username');
    message = document.getElementById('name-err');
    text = document.getElementById('username').value;

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

function addpho() {
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
    let message, pass;
    let errElement = document.getElementById('phonepass');
    message = document.getElementById('phon-pass-err');
    pass = document.getElementById('phonepass').value;

    try {
        if(pass == ""){
            errElement.classList.remove('valid');
            errElement.classList.add('phone-err');
            throw 'kiritilmagan'
        } 
        if(pass.length > 0){
            errElement.classList.remove('phone-err');
            errElement.classList.add('valid');
            message.innerHTML = ''
        }
    } catch(e){
            message.innerHTML = 'Qiymat ' + e;
    }

}

function addsure() {
    let message, text;
    let errElement = document.getElementById('surename');
    message = document.getElementById('sure-err');
    text = document.getElementById('surename').value;

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

function addmail() {
    let message, text;
    let errElement = document.getElementById('mail');
    message = document.getElementById('mail-err');
    text = document.getElementById('mail').value;

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

function addposs() {
    let message, text;
    let errElement = document.getElementById('phonepass2');
    message = document.getElementById('phon-pass2-err');
    text = document.getElementById('phonepass2').value;

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

function addposs2() {
    let message, text, pass1;
    let errElement = document.getElementById('phonepass2');
    message = document.getElementById('phon-pass2-err');
    text = document.getElementById('phonepass2').value;
    pass1 = document.getElementById('phonepass').value;

    try {
        if(text != pass1){
            errElement.classList.remove('valid');
            errElement.classList.add('phone-err');
            throw 'Birinchi passwordni ';
        } 
    } catch(e){
            message.innerHTML = e + 'kiriting';
    }

}

