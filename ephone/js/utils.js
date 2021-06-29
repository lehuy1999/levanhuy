let dem = 0;
function hienthi(id) {
    dem ++;
    if(dem % 2 == 1){
        let reply = document.getElementsByClassName('form-reply');
        reply[0].classList.remove('hidden');    
    } else {
        let reply = document.getElementsByClassName('form-reply');
        reply[0].classList.add('hidden');    
    }
}