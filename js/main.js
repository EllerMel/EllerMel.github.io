Vue.component('date', {
    computed: {
        formatDate() {
            var today = new Date();
            var dd = today.getDate();
            var yyyy = today.getFullYear();

            var day = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            return currDate = (day[today.getDay()] + ' ' + month[today.getMonth()] + ' ' + dd + ', ' + yyyy);
        }
    },
    template: `<h3>{{ formatDate }}</h3>`
})

var app = new Vue({
    el: '#app'
})

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

$('.collapse').on('shown.bs.collapse', function(e) {
    var $card = $(this).closest('.card');
    $('html,body').animate({
      scrollTop: $card.offset().top
    }, 500);
  });