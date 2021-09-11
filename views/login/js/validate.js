const namee = document.querySelector('#name');
const surname = document.querySelector('#surname');
const username = document.querySelector('#username');
const email = document.querySelector('#email');
const phone = document.querySelector('#phone');
const password = document.querySelector('#password');
const results = document.querySelector('#results');


const form = document.getElementById('register');


form.addEventListener('submit', (e)=>{

    if(namee.value == '' || surname.value == '' || username.value == '' || email.value == '' || phone.value == '' || password.value == ''){
        e.preventDefault();
        results.innerText = "Por favor revisa que todos los campos estén diligenciados";

        if(results.classList.contains('d-none'))results.classList.remove('d-none');
    }else{
        if(!results.classList.contains('d-none'))results.classList.add('d-none');
    }
})


