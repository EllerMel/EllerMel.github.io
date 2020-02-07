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

Vue.component('clock', {
    data: function () {
        return { currentTime: new Date() }
    },
    methods: {
        displayTime() {
            var self = this;
            if (!this.interval) {
                this.interval = setInterval(() => {
                    self.currentTime = new Date();
                    self.time_str = self.getStandardTime;
                }, 100);
            } else {
                clearInterval(this.interval);
                this.interval = 0;
            }
        }
    },
    created() {
        this.displayTime();
    },
    computed: {
        standardHrs() {
            if (this.currentTime.getHours() >= 13) {
                return this.currentTime.getHours() - 12
            }
            else if (this.currentTime.getHours() == 0) {
                return 12
            }
            else {
                return this.currentTime.getHours()
            }
        },
        meridiem() {
            if (this.currentTime.getHours() >= 12) {
                return "PM"
            }
            else if (this.currentTime.getHours() >= 0 && this.currentTime.getHours() < 12) {
                return "AM"
            }
        },
        mins() {
            if (this.currentTime.getMinutes() < 10) {
                return '0' + this.currentTime.getMinutes()
            }
            else return this.currentTime.getMinutes()
        },
        sec() {
            if (this.currentTime.getSeconds() < 10) {
                return '0' + this.currentTime.getSeconds()
            }
            else return this.currentTime.getSeconds()
        },
        getStandardTime() {
            //return this.standardHrs + ":" + this.mins + ":" + this.sec + " " + this.meridiem
            //if adding back in seconds, update the interval to 1000
            return this.standardHrs + ":" + this.mins + " " + this.meridiem
        }
    },
    template: `<h3>{{ getStandardTime }}</h3>`
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

// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = $('.myImg');
var modalImg = $("#img01");
var captionText = document.getElementById("caption");
$('.myImg').click(function(){
    modal.style.display = "block";
    var newSrc = this.src;
    modalImg.attr('src', newSrc);
    captionText.innerHTML = this.alt;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
