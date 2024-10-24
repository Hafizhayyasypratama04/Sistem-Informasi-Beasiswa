function animateValue(element, start, end, duration) {
  var range = end - start;
  var current = start;
  var increment = end > start ? 1 : -1;
  var stepTime = Math.abs(Math.floor(duration / range));
  var timer = setInterval(function() {
      current += increment;
      element.textContent = current;
      if (current == end) {
          clearInterval(timer);
      }
  }, stepTime);
}

var counters = document.querySelectorAll('.counter');
counters.forEach(function(counter) {
  var start = 0;
  var end = parseInt(counter.textContent);
  var duration = 1500; // Durasi animasi dalam milidetik
  animateValue(counter, start, end, duration);
});

$(document).ready(function() {
  $('#signupModal').modal('show');
});

function togglePassword(id) {
  var x = document.getElementById(id);
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}

$('form').submit(function(event) {
  var password = $('#signupPassword').val();
  var confirmPassword = $('#signupPasswordConfirm').val();
  if (password !== confirmPassword) {
      alert('Password dan Konfirmasi Password tidak sesuai!');
      event.preventDefault();
  }
});