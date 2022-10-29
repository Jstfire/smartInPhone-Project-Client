var oriText = document.getElementById("txtHintAdmin").innerHTML;

function showHintNameAdmin(str1) {
    if (str1.length == 0) {
        document.getElementById("txtHintAdmin").innerHTML = oriText;
    } else if (str1.length != 0) {
        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHintAdmin").innerHTML = this.responseText;
        }
        };

        var url="listHP/getHintNameAdmin";
        url+="?keyword1="+str1;
        xhttp.open("GET",url,true);
        xhttp.send();
    }
}