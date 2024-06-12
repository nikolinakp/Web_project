console.log("JS working!");

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('fileForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Предотвратете изпращането на формата

        const fileInput = document.getElementById('fileInput');
        const file = fileInput.files[0];
        if (file && file.type === 'text/html') {
            const reader = new FileReader();
            reader.onload = function(e) {
                const contentDiv = document.getElementById('content');
                const innerDiv = document.createElement('div');
                innerDiv.innerHTML = e.target.result;
                innerDiv.classList.add('box');

                contentDiv.appendChild(innerDiv);// Добавете вътрешния div към content div

                console.log('HTML content loaded and .box class added');
            };
            reader.readAsText(file);
        } else {
            alert('Моля, прикачете HTML файл.');
        }
    });
});


//save in  database
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('downloadDocx').addEventListener('click', function() {
        var fileInput = document.getElementById('fileInput');
        if (fileInput.files.length === 0) {
            alert('Моля, прикачете HTML файл.');
            return;
        }
        
        var filename = fileInput.files[0].name; //filename

        var div = document.getElementById('content');
        var text = div.innerText || div.textContent; // Взема само текста от div-a
        var jsonText = JSON.stringify({ content: text });

        const data = {
            filename: filename, // Променяме на "filename"
            document: jsonText,
            extension: 'docx'
        };

        fetch('php/convert.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.text()) // Get response as text for debugging
        .then(data => {
            try {
                const jsonData = JSON.parse(data); // Try to parse text as JSON
                if (jsonData.status === 'SUCCESS') {
                    alert('Файлът успешно е записан в базата данни.');
                } else {
                    alert('Грешка при запис на файл: ' + jsonData.message);
                }
            } catch (e) {
                console.error('Отговорът не е валиден JSON:', data);
            }
        })
        .catch(error => console.error('Грешка:', error));
    });
});