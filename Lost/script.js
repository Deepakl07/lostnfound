function submitForm() {
    var form = document.getElementById('lostForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            console.log(xhr.responseText);
            form.reset();
        }
    };

    xhr.send(formData);
}
