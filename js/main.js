function myMenuFunction() {
    var x = document.getElementById("myNAV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


function person() {
    var person = prompt("Please enter your name", "");
    if (person != null) {
        document.getElementById("Greeting").innerHTML =
            "Welcome" + " " + person + "!";
    }
};