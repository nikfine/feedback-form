var form = document.querySelector('#feedback_form'),
    phone = document.querySelector('#phone'),
    submit = function(e){
        
        var ajax = new XMLHttpRequest(),
            send_data = new FormData(form);
    
        ajax.open('POST', '/server_action.php', true);
        ajax.send(send_data);
        ajax.onload = function(){
            form.reset();
            alert(ajax.responseText);
        }
    
        e.preventDefault();
    },
    phone_filter = function(e){

        return e.target.value = e.target.value.replaceAll(/\D/g, '');

    }
    

form.addEventListener('submit', submit);
phone.addEventListener('input', phone_filter);

