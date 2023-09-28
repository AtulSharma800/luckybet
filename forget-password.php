<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("db.php");
include("function.php");
include("common-details.php");

// if($_SERVER['REQUEST_METHOD'] == "POST"){

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
  <meta name="description" content="<?= $co_name; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#100DD1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
  <!-- Title-->
  <title>ForgetPassword || <?= $co_name; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@500&display=swap" rel="stylesheet">
  <!-- Favicon-->
  <link rel="icon" href="<?= $co_favicon; ?>">
  <!-- Apple Touch Icon-->
  <link rel="apple-touch-icon" href="<?= $co_favicon; ?>">
  <link rel="apple-touch-icon" sizes="152x152" href="<?= $co_favicon; ?>">
  <link rel="apple-touch-icon" sizes="167x167" href="<?= $co_favicon; ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= $co_favicon; ?>">
  <!-- CSS Libraries-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/lineicons.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- Stylesheet-->
  <link rel="stylesheet" href="style.css">
  <!-- Web App Manifest-->
  <link rel="manifest" href="manifest.json">
  <link rel="stylesheet" href="plugin/toast/toast.style.min.css">
  <style>
    .submit-btn {
      background-color: #ED0A0A !important;
      border-color: #ED0A0A !important;
      color: white !important;
    }

    .input-field input {
      height: 45px;
      width: 42px;
      border-radius: 6px;
      outline: none;
      font-size: 1.125rem;
      text-align: center;
      border: 1px solid #ddd;
    }

    .input-field input:focus {
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }

    .input-field input::-webkit-inner-spin-button,
    .input-field input::-webkit-outer-spin-button {
      display: none;
    }
  </style>
</head>

<body>
  <!-- Preloader-->
  <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div>
  <!-- Login Wrapper Area-->
  <div class="login-wrapper d-flex align-items-center justify-content-center text-center" style="background:white;background-image:url('img/pattern1.png'),url('img/pattern2.png');background-position:left top, right bottom;background-repeat: no-repeat, no-repeat;background-size:contain,contain;">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="<?= $co_favicon_big; ?>" style="max-height:120px;" alt="">
          <!-- Register Form-->
          <div class="register-form mt-5 px-4">
            <form id="reset-password-form" method="post">
              <div class="form-group text-start mb-4"><span>Mobile No</span>
                <label for="username"><i class="lni lni-user"></i></label>
                <input class="form-control" id="mobile_reset" name="mobile_reset" type="text" pattern="[1-9]{1}[0-9]{9}" placeholder="1234">
              </div>
              <input class="btn btn-warning btn-lg w-100 submit-reset-btn" id="submit-reset-btn" type="submit" value="Reset Password">
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal" id="otpModel" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enter OTP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-field">
              <input type="number" />
              <input type="number" disabled />
              <input type="number" disabled />
              <input type="number" disabled />
              <input type="number" disabled />
              <input type="number" disabled />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="otp_submit" class="btn btn-warning">Save changes</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- All JavaScript Files-->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.passwordstrength.js"></script>
  <script src="js/dark-mode-switch.js"></script>
  <script src="js/active.js"></script>
  <script src="js/pwa.js"></script>
  <script src="js/custome.js"></script>
  <script src="plugin/toast/toast.script.js"></script>

  <script>
    $(document).ready(function() {
      $("#submit-reset-btn").click(function(e) {
        e.preventDefault();
        // store mobile number with otp
        let mobilenumber = $("#mobile_reset").val();
        let otp = Math.floor(100000 + Math.random() * 900000);
        let submitBtn = $(this);
        $.ajax({
          url: "otp_verfication.php",
          method: 'POST',
          data: {
            "mobilenumber": mobilenumber,
            "otp": otp
          },
          success: function(res) {
            console.log($.parseJSON(res));
            let response = $.parseJSON(res);
            if (response.status == true) {
              submitBtn.after("<p>Your OTP :" + otp + " </p>")
              $("#otpModel").modal("show");
              // $(".modal-title").after("<span class='mx-3 text-danger'>You have entered wrong otp number</span>");
              $(".modal-backdrop.show").css("z-index", 1)
              const inputs = document.querySelectorAll("input");
              inputs.forEach((input, index1) => {
                input.addEventListener("keyup", (e) => {
                  // This code gets the current input element and stores it in the currentInput variable
                  // This code gets the next sibling element of the current input element and stores it in the nextInput variable
                  // This code gets the previous sibling element of the current input element and stores it in the prevInput variable
                  const currentInput = input,
                    nextInput = input.nextElementSibling,
                    prevInput = input.previousElementSibling;
                  // if the value has more than one character then clear it
                  if (currentInput.value.length > 1) {
                    currentInput.value = "";
                    return;
                  }
                  // if the next input is disabled and the current value is not empty
                  //  enable the next input and focus on it
                  if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                    nextInput.removeAttribute("disabled");
                    nextInput.focus();
                  }
                  // if the backspace key is pressed
                  if (e.key === "Backspace") {
                    // iterate over all inputs again
                    inputs.forEach((input, index2) => {
                      // if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
                      // and the previous element exists, set the disabled attribute on the input and focus on the previous element
                      if (index1 <= index2 && prevInput) {
                        input.setAttribute("disabled", true);
                        input.value = "";
                        prevInput.focus();
                      }
                    });
                  }
                  //if the fourth input( which index number is 3) is not empty and has not disable attribute then
                  //add active class if not then remove the active class.
                  if (!inputs[3].disabled && inputs[3].value !== "") {
                    return;
                  }
                });
              });

            } else {
              alert("Mobile number not exists");
            }
          },
          error: function(error) {
            console.log(error);
          }
        });
      })
    });




    $("#otp_submit").click(function() {
      var inputValues = [];
      $(".input-field input[type='number']").each(function() {
        // Loop through each input element with type 'number'
        inputValues.push($(this).val()); // Push the value of each input to the array
      });
      // console.log(inputValues.join(""));
      $.ajax({
        url: "otp_verfication.php",
        method: 'POST',
        data: {
          "otp": inputValues.join("")
        },
        success: function(res) {
          console.log($.parseJSON(res));
          let response = $.parseJSON(res);
          if(response.status == true){
            $(".error_message").remove();
            $("#otpModel").modal("hide");
            window.location.href("http://localhost/luckybet/.php");
          }else{
            $(".error_message").remove();
            $(".modal-title").after("<span class='mx-3 text-danger error_message'>You have entered wrong otp number</span>");
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
  </script>
</body>

</html>