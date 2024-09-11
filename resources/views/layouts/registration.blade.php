<!DOCTYPE html>
<html>

<head>
  <title>Institution Registration Page</title>
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <!-- Custom Styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  @yield('styles')

  <style>
    body {
      background-color: linear-gradient(175deg, rgba(106, 190, 255, 1) 0%, rgba(0, 58, 103, 1) 100%);
      font-family: Montserrat;
      font-size: 14px;
      min-height: 100vh;
      margin: 0 !important;
      padding: 0 !important;
      overflow-x: hidden;
    }

    .bg-gradient{
      background: linear-gradient(175deg, rgba(106, 190, 255, 1) 0%, rgba(0, 58, 103, 1) 100%);
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

    .register-card .wrapper{
      padding: 70px 0;
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
    .bg-gradient{
      padding: 50px;
      align-items: center;
    }

    .left-side{
      border-right: none;
      text-align: center;
    }
    .form-wrapper{
      padding-left: 0;
    }
    .welcometext{
      display: none;
    }
    .select-div{
      max-width: 80%;
      margin: auto;
      margin-bottom: 30px;
    }
    .welcome-message img{
      height: 170px !important;
    }
  }

  </style>

</head>

<body>


  @yield('content')
  <!-- <script>
     function showForm(formId) {
      const forms = document.querySelectorAll('.form');
      forms.forEach(form => {
        form.style.display = form.id === formId ? 'block' : 'none';
      });
    }
  </script> -->
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

    // Ensure welcome message is displayed when default option is manually selected
    document.addEventListener('DOMContentLoaded', function() {
      const selectField = document.getElementById('registrationType');
      const welcomeMessage = document.getElementById('welcome-message');

      if (selectField.value === '') {
        welcomeMessage.style.display = 'block';
      }
    });

    fetch('https://restcountries.com/v3.1/all')
      .then(response => response.json())
      .then(data => {
        const datalist = document.getElementById('country-list');
        data.forEach(country => {
          const option = document.createElement('option');
          option.value = country.name.common;
          datalist.appendChild(option);
        });
      })
      .catch(error => console.error('Error fetching countries:', error))
  </script>
</body>