document.addEventListener("DOMContentLoaded", function() {

    data = document.getElementById("country");
    btn = document.getElementById("lookup");
    btn.addEventListener('click',
        function(e) {
            country = document.getElementById("country").value;
            e.preventDefault()
            if (data.value.length == 0) {
                alert("hi")
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                    }
                };
                xmlhttp.open("GET", "http://localhost/info2180-lab5/world.php?country=" + country, true);

                xmlhttp.send();
            }


        });


});