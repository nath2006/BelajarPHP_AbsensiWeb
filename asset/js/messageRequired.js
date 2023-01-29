
const nip = document.querySelector('#nip');
const password = document.querySelector('#password');

nip.addEventListener('click',()=>{
    if(nip.validity.typeMismatch){
        this.setCustomValidity('Pastikan data yang anda masukan valid!');
    }else{
        this.setCustomValidity('');
    }
})
password.addEventListener('click',()=> {
    if(password.validity.typeMismatch){
        this.setCustomValidity('Pastikan data yang anda masukan valid!');
    }else{
        this.setCustomValidity('');
    }
})