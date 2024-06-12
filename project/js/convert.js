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
        var filename = document.getElementById('fileInput').files[0].name; //filename
       // console.log(filename);

        var div = document.getElementById('content');
        var text = div.innerText || div.textContent; // Взема само текста от div-a
        //console.log(text);
        var jsonText = JSON.stringify({ content: text });
        //console.log(jsonText);
        const extension = 'docx';

        const data = {
            fileName: filename,
            document: jsonText,
            extension: extension
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

/*document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('downloadDocx').addEventListener('click', function() {
        
        var div = document.getElementById('content');
        var text = div.innerText || div.textContent; // Взема само текста от div-a
        var filename = document.getElementById('fileInput').files[0].name; // Вземане на името на файла

        var data = {
            document: text,
            extension: 'docx',
            fileName: filename
        };

        fetch('php/convert.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            try {
                console.log(data); // Изведи отговора в конзолата
            } catch (e) {
                console.error('Отговорът не е валиден JSON:', data);
            }
        })
        .catch(error => console.error('Грешка:', error));
    });
});
*/



