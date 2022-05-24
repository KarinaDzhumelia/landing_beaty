"use strict"

document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('form_6');
    form.addEventListener('submit', formSend);

    async function formSend() {
        let formData = new FormData(form);
        let response = await fetch('../PHP/recording.php', {
            method: 'POST',
            body: formData
        });
        if (response.ok) {
            let result = await response.json();
            alert(result.message);
            alert('fff');
        } else {
            alert('Помилка');
        }
    }
})