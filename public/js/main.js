document.addEventListener('DOMContentLoaded', function () {
  // Initialize Swiper
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    spaceBetween: 16,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    autoplay: {
      delay: 4000, // Set the delay between slides to 5 seconds (5000 milliseconds)
    },
  });
});


function openModal() {
  document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
  document.getElementById('modal').classList.add('hidden');
}

function proceedToRoute() {
  window.location.href = "/fund_wallet/confirm_fund";
}

function formatAmount() {
  var amountInput = document.getElementById('amountInput');
  var amount = amountInput.value;

  // Remove all non-digit characters from the amount
  var cleanedAmount = amount.replace(/\D/g, '');

  // Format the cleaned amount with commas and currency symbol
  var formattedAmount = '₦ ' + numberWithCommas(cleanedAmount);

  // Update the input value with the formatted amount
  amountInput.value = formattedAmount;
}

function numberWithCommas(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}



document.getElementById('supportButton').addEventListener('click', function () {
  document.getElementById('supportModal').classList.remove('hidden');
});

document.getElementById('nextModalButton').addEventListener('click', function () {
  document.getElementById('channelModal').classList.remove('hidden');
  document.getElementById('supportModal').classList.add('hidden');
});

document.getElementById('closeModalButton').addEventListener('click', function () {
  document.getElementById('supportModal').classList.add('hidden');
});

document.getElementById('closeContactModalButton').addEventListener('click', function () {
  document.getElementById('channelModal').classList.add('hidden');
});


$(document).ready(function () {
  $('#imageContainer').on('scroll', function () {
    const scrollPos = $(this).scrollLeft();
    const containerWidth = $(this).width();
    const imageWidth = $('.w-full').outerWidth();

    const currentIndex = Math.round(scrollPos / imageWidth);
    const currentImage = $('.w-full').eq(currentIndex);

    $('.w-full').removeClass('active');
    currentImage.addClass('active');
  });
});


function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const passwordToggleText = document.getElementById("passwordToggleText");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggleText.textContent = "Hide";
  } else {
    passwordInput.type = "password";
    passwordToggleText.textContent = "Show";
  }
}

function togglePasswordVisibility2() {
  const passwordInput = document.getElementById("password2");
  const passwordToggleText = document.getElementById("passwordToggleText2");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggleText.textContent = "Hide";
  } else {
    passwordInput.type = "password";
    passwordToggleText.textContent = "Show";
  }
}


function validatePassword() {
  const passwordField = document.getElementById('password');
  const confirmPasswordField = document.getElementById('confirmPassword');
  const password = passwordField.value;
  const confirmPassword = confirmPasswordField.value;
  const passwordError = document.getElementById('passwordError');

  // Regular expressions for validation rules
  const minLengthRegex = /.{8,}/;
  const capitalLetterRegex = /[A-Z]/;
  const lowercaseLetterRegex = /[a-z]/;
  const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;
  const numberRegex = /\d/;
  const symbolRegex = /[!@#$%^&*(),.?":{}|<>]/;

  // Perform validation checks
  let isValid = true;
  let errorMessages = [];

  if (!minLengthRegex.test(password)) {
    errorMessages.push('- Password must be at least 8 characters long!');
    isValid = false;
  }
  if (!capitalLetterRegex.test(password)) {
    errorMessages.push('- Password must contain at least one capital letter!');
    isValid = false;
  }
  if (!lowercaseLetterRegex.test(password)) {
    errorMessages.push('- Password must contain at least one lowercase letter!');
    isValid = false;
  }
  if (!specialCharRegex.test(password)) {
    errorMessages.push('- Password must contain at least one special character!');
    isValid = false;
  }
  if (!numberRegex.test(password)) {
    errorMessages.push('- Password must contain at least one number!');
    isValid = false;
  }
  if (!symbolRegex.test(password)) {
    errorMessages.push('- Password must contain at least one symbol!');
    isValid = false;
  }
  if (password !== confirmPassword) {
    errorMessages.push("-  and confirmation password don't match!");
    isValid = false;
  }

  // Display error messages or reset error display
  if (!isValid) {
    passwordError.innerHTML = errorMessages.join('<br>');
    passwordField.classList.add('border-red-500');
    confirmPasswordField.classList.add('border-red-500');
  } else {
    passwordError.innerHTML = '';
    passwordField.classList.remove('border-red-500');
    confirmPasswordField.classList.remove('border-red-500');
  }

  return isValid;
}

// Get the select element
const select = document.getElementById('my-select');

// Add event listener for change event
select.addEventListener('change', function () {
  // Get the selected option
  const selectedOption = select.options[select.selectedIndex];

  // Log the selected value
  console.log(selectedOption.value);
});



function openModal() {
  document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
  document.getElementById('modal').classList.add('hidden');
}


////////////////////////////////////////////////// Transaction Pin Modal //////////////////////////////////////////////

function openTransactionPinModal() {
  document.getElementById('modalTransactionPin').classList.remove('hidden');
}
document.addEventListener('DOMContentLoaded', function () {
  var dropdownButtons = document.querySelectorAll('.relative');
  dropdownButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.stopPropagation();
      var dropdown = button.querySelector('ul');
      dropdown.classList.toggle('hidden');
    });
  });

  document.addEventListener('click', function () {
    dropdownButtons.forEach(function (button) {
      var dropdown = button.querySelector('ul');
      dropdown.classList.add('hidden');
    });
  });
});

var maxAttempts = 3; // Maximum number of PIN entry attempts
var currentAttempt = 0; // Current attempt count

function sendReport() {
  // Retrieve the PIN input fields
  var pinInputs = document.getElementsByClassName('input-field');

  // Get the entered PIN value
  var enteredPin = "";
  for (var i = 0; i < pinInputs.length; i++) {
    enteredPin += pinInputs[i].value;
  }

  // Check if the entered PIN is correct
  if (enteredPin !== "5566") {
    currentAttempt++;
    var remainingAttempts = maxAttempts - currentAttempt;

    // Display the error message with the remaining attempts count
    var errorMessage = document.getElementById('error-message');
    errorMessage.innerText = "" + remainingAttempts + " attempt left";
    errorMessage.classList.remove('hidden');

    // Check if the maximum number of attempts has been reached
    if (currentAttempt >= maxAttempts) {
      logoutUser();
      return; // Stop further execution
    }

    // Clear the PIN input fields for the next attempt
    clearPinInputs();

    return; // Stop further execution
  }

  // Reset the current attempt count
  currentAttempt = 0;

  // Add your logic here to handle sending the report
  // For example, you can retrieve the reason from the input field and perform an AJAX request to send the report to the server

  // After sending the report, close the modal
  closeModal();
}

function logoutUser() {
  // Add your logic here to handle user logout
  // For example, you can redirect the user to the login page
  window.location.href = "/login";
}

function clearPinInputs() {
  // Retrieve the PIN input fields
  var pinInputs = document.getElementsByClassName('input-field');

  // Clear the PIN input fields
  for (var i = 0; i < pinInputs.length; i++) {
    pinInputs[i].value = "";
  }
}

const inputFields = document.querySelectorAll('.input-field');

inputFields.forEach((input, index) => {
  input.addEventListener('keydown', (event) => {
    const currentInput = event.target;
    const currentLength = currentInput.value.length;

    if (currentLength === 1 && event.key !== 'Backspace') {
      const nextIndex = index + 1;
      if (nextIndex < inputFields.length) {
        const nextInput = inputFields[nextIndex];
        nextInput.focus();
        event.preventDefault();
      }
    } else if (currentLength === 0 && event.key === 'Backspace') {
      const previousIndex = index - 1;
      if (previousIndex >= 0) {
        const previousInput = inputFields[previousIndex];
        previousInput.focus();
        event.preventDefault();
      }
    }
  });
});

 
  // Get all the copy buttons
  var copyButtons = document.getElementsByClassName("copy-btn");

  // Attach click event listeners to each copy button
  Array.from(copyButtons).forEach(function (button) {
    button.addEventListener("click", function () {
      var text = this.getAttribute("data-text");
      copyToClipboard(text);
      this.innerText = "Copied";
    });

    // Reset the button text after 1 second
    button.addEventListener("mouseleave", function () {
      setTimeout(() => {
        this.innerText = "Copy";
      }, 1000);
    });
  });

  // Function to copy text to clipboard
  function copyToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed"; // Ensure textarea is visible for copying
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
  } 