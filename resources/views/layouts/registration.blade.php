<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    body{
        background: linear-gradient(175deg, rgba(106, 190, 255, 1) 0%, rgba(0, 58, 103, 1) 100%) !important;
        font-family: Montserrat;
        font-size: 14px;
        min-height: 100vh;
        margin: 0 !important;
        padding: 0 !important;
    }

    .register-bg{
        min-height: 100vh;
        padding: 50px 0px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .register-card{
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 100%;
      width: 100%;
      padding: 70px;
      background: #fff;
    }

    .register-card .logo{
      margin-bottom: 40px;
    }

    .register-card .logo img{
      height: 70px;
    }

    .select-div{
      max-width: 70%;
    }
    
    .left-side{
      border-right: 3px solid #ccc;
    }

    .form-wrapper{
      padding-left: 40px;
    }

    .asteric {
      color: #f00f0f;
    }

    .form,
    .form-description {
      display: none;
    }

    .welcometext,
    .form-title {
      color: #1176C4;
      font-size: 27px;
      text-align: center;
      margin-bottom: 40px;
    }

    .form-wrapper .welcome-message{
      text-align: center;
    }
    .form-wrapper .welcome-message img{
      height: 200px;
      object-fit: contain;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 20px; 
    }
    .form-description{
      padding-top: 15px;
      font-size: 17px;
    }

    /* Styles for screens smaller than 768px */
    @media (max-width: 767.98px) {
        
        
    }

    @media (max-width: 768px){
        
    }

    @media (max-width: 991.98px) {
    body{
        font-size: 18px;
    }
    .register-bg{
        padding: 25px 20px;
        align-items: center;
        margin: auto;
    }
    .register-card{
        padding: 45px 20px;
        width: 100% !important;
    }
    .left-side{
        border-right: none;
        text-align: center;
    }

    .left-side select{
        text-align: center;
    }

    .form-wrapper{
        padding-left: 0;
    }
    .welcometext{
        display: none;
    }
    .select-div{
        max-width: 100%;
        margin: auto;
        margin-bottom: 30px;
    }
    .welcome-message img{
        height: 170px !important;
    }
    .form-check label{
        font-size: 14px;
    }
    }

</style>

<body>

    @yield('content')


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function showSelectedForm() {
          const selectField = document.getElementById('registrationType');
          const selectedOption = selectField.value;
      
          const welcomeMessage = document.getElementById('welcome-message');
          const forms = document.querySelectorAll('.form');
          const descriptions = document.querySelectorAll('.form-description');
      
          if (selectedOption === '') {
            welcomeMessage.style.display = 'block';
            forms.forEach(form => {
              form.style.display = 'none';
            });
            descriptions.forEach(desc => {
              desc.style.display = 'none';
            });
          } else {
            welcomeMessage.style.display = 'none';
            forms.forEach(form => {
              form.style.display = 'none';
            });
            descriptions.forEach(desc => {
              desc.style.display = 'none';
            });
      
            document.getElementById(selectedOption + '-form').style.display = 'block';
            document.getElementById(selectedOption + '-description').style.display = 'block';
          }
        }

        fetch('https://restcountries.com/v3.1/all')
        .then(response => response.json())
        .then(data => {
          // Sort countries alphabetically by name
          const sortedCountries = data.sort((a, b) => a.name.common.localeCompare(b.name.common));

          // Get the select field
          const countrySelect = document.getElementById('countries');

          // Clear any existing options
          countrySelect.innerHTML = '<option value="">Select a country</option>';

          // Populate the select field with sorted countries
          sortedCountries.forEach(country => {
            const option = document.createElement('option');
            option.value = country.cca2;  // country code
            option.textContent = country.name.common;  // country name
            countrySelect.appendChild(option);
          });
        })
        .catch(error => {
          console.error('Error fetching countries:', error);
          document.getElementById('countries').innerHTML = '<option value="">Failed to load countries</option>';
        });

      
        // Ensure welcome message is displayed when default option is manually selected
        document.addEventListener('DOMContentLoaded', function() {
          const selectField = document.getElementById('registrationType');
          const welcomeMessage = document.getElementById('welcome-message');
      
          if (selectField.value === '') {
            welcomeMessage.style.display = 'block';
          }
        });
      
        document.getElementById('toggle-password').addEventListener('click', function () {
              const passwordField = document.getElementById('password');
              const icon = document.getElementById('toggle-icon');
      
              // Check if the password field exists and its type is correct
              if (passwordField) {
                  // Toggle the password visibility
                  if (passwordField.type === "password") {
                      passwordField.type = "text"; // Change to text to show the password
                      icon.classList.remove('bi-eye');
                      icon.classList.add('bi-eye-slash');
                  } else {
                      passwordField.type = "password"; // Change back to password to hide
                      icon.classList.remove('bi-eye-slash');
                      icon.classList.add('bi-eye');
                  }
              }
        });
      </script>
    
</body>

</html>