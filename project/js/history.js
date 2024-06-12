// Използване на AJAX заявка за извличане на данни от history.php
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // Преобразуване на получения JSON отговор в обект JavaScript
        var data = JSON.parse(this.responseText);
        
// Вземане на текста от JavaScript обекта
var textToShow = data.content;

console.log(data);

        // Създаване на HTML таблица и добавяне на редове за всеки запис от базата данни
        var table = "<table border='1'><tr><th>User</th><th>File</th><th>Date</th></tr>";
        for (var i = 0; i < data.length; i++) {
            table += "<tr><td>" + data[i].user + "</td><td>" + data[i].file + "</td><td>" + data[i].date + "</td></tr>";
        }
        table += "</table>";
        
        document.getElementById("historyTable").innerHTML = table;
    }
};
xhr.open("GET", "php/history.php", true);
xhr.send();

