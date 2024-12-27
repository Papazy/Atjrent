<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ATJEH CAMPING RENT</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"/>
    <style>
        body {
          background-color: #f8f9fa;
        }
        .signup-form {
          margin-top: 10px;
  
          height: 97vh;
        }
        .welcome-section {
          background-image: url("asset/img/bg.png"); /* Replace with your image URL */
          background-size: cover;
        
        color: #ffffff;
        text-align: center;
        
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 20px;
        }
        .welcome-text {
          font-style: normal;
          font-family:Black Ops One, serif;
          color: #3d6945;
          font-size: 6rem;
          font-weight: 100;
          text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }
        .subtext {
          font-family:Black Ops One;
          font-size: 1.5rem;
          font-weight: 500;
          text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.5);
        }
        .form-control-icon {
          position: relative;
        }
        .form-control-icon input {
          padding-left: 2.5rem;
        }
        .form-control-icon i {
          position: absolute;
          top: 50%;
          left: 10px;
          transform: translateY(-50%);
          color: #6c757d;
        }
        .input-group{
          color: #F2A01C;
          column-rule-color: #F2A01C;

        }
      </style>
  </head>
<!----------------------- Main Container -------------------------->
<div class="container g-1 d-flex justify-content-center align-items-center min-vh-100">
<!----------------------- Login Container -------------------------->
<div class="row border rounded-4 p-3 s bg-white shadow box-area">
<!--------------------------- Left Box ----------------------------->
    <div class="col-md-3 p-4 left-box border shadow rounded-4">
         <div class="row align-items-center">
            <div class="text-center mb-2">
                <img src="asset/img/logo atjeh camp.png" alt="Logo" width="70" />                     
                <h3 class="mt-2" style="font-size: medium;font-family: Arial, Helvetica, sans-serif; color: #F2A01C;">ATJEH CAMPING RENT</h3>
            </div>
            @yield('main-content')

                                                <!-- button -->
            
                
        </div>
    </div> 
    <!-------------------- ------ Right Box ---------------------------->
        <div class="col-md-9 welcome-section align-items-start ">
        <div class="welcome-text">WELCOME</div>
        <div class="subtext">Your Adventure Starts Here</div>
    </div> 
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
  </body>
</html>
