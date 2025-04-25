function searchStores() {  
    var table = document.querySelector(".tab-content:not([style*='display: none']) table");
    var input = document.querySelector(".tab-content:not([style*='display: none']) input");
    var rows = table.getElementsByTagName("tr");
    var filter = input.value.toLowerCase();

    for (var i = 1; i < rows.length; i++) { 
        var row = rows[i];
        var cells = row.getElementsByTagName("td");
        var matched = false;

        for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            if (cell && cell.textContent.toLowerCase().indexOf(filter) > -1) {
                matched = true;
                break;
            }
        }

        if (matched) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}



