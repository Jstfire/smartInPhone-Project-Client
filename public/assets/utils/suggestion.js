var oriText = document.getElementById("txtHint").innerHTML;

function showHintName(str1) {
    if (str1.length == 0) {
        document.getElementById("txtHint").innerHTML = oriText;
    } else if (str1.length != 0) {
        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        };

        var url="listHP/getHintName";
        url+="?keyword1="+str1;
        xhttp.open("GET",url,true);
        xhttp.send();
    }
}