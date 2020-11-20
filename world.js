document.addEventListener("DOMContentLoaded", function() {

    data = document.getElementById("country");
    btn = document.getElementById("lookup");
    btn2 = document.getElementById("cities");
    btn.addEventListener('click',
        function(e) {
            country = document.getElementById("country").value;
            e.preventDefault()
                /*  if (data.value.length == 0) {
                     alert("hi")
                 } else { */
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "http://localhost/info2180-lab5/world.php?country=" + country, true);

            xmlhttp.send();
        });
    btn2.addEventListener('click',
        function(e) {
            country = document.getElementById("country").value;
            e.preventDefault()
            var xmlhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                
                }
            };
            xmlhttp2.open("GET", "http://localhost/info2180-lab5/world.php?country=" + country + "&context=cities", true);

            xmlhttp2.send();
        });

});