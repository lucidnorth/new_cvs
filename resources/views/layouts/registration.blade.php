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
      height: 100vh;
      font-family: Montserrat;
      font-size: 14px;
    }

    .inner-div {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #ffffff;
    }

    .bg-gradient {
      /* global 94%+ browsers support */
      background: linear-gradient(175deg, rgba(106, 190, 255, 1) 0%, rgba(0, 58, 103, 1) 100%);
    }

    .inner-div {
      background-color: #ffffff;
      display: flex;
      height: 80vh;
      width: auto;
    }

    .vertical-divider {
      border-left: 1px solid #000000;
      height: 70%;
      position: relative;
      margin-left: 300px;
      margin-right: 50px;
      margin-top: 100px;
      opacity: 30%;
    }


    .logo {
      width: 10rem;
      margin-top: px;
    }

    .image {
      width: 70em;
      margin-bottom: 400px;

    }

    .image img {
      width: 140%;
      margin-right: 10px;
      margin-top: 120px;
      margin-left: 120px;
      border-radius: 20px;
      margin-bottom: -50px;
    }


    .institute-image {
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .img-disc {
      margin-left: 100px;
      font-family: Montserrat;
      width: 400px;
      padding-left: 10px;
    }

    .form-div {
      width: 120em;
      margin-right: 100px;
      margin-top: 90px;
    }


    .signin {
      margin-left: 160px;
      padding-top: 20px;


    }

    .welcometext {
      color: #1176C4;
      font-size: 27px;
      text-align: center;
      margin-bottom: 40px;
    }


    .container {
      width: 950px;

    }

    /* Styles for screens smaller than 768px */
    .verificationtext {
      font-weight: 700;
      font-style: normal;
    }



    .terms,
    .privacy {
      color: #1176C4;
      font-weight: bold;
    }

    .asteric {
      color: #f00f0f;
    }

    .form,
    .form-description {
      display: none;
    }

    .select-div{
        position: relative;
        top: 100px;
        left: 130px;
    }

    @media (max-width: 767.98px) {
      
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
        .catch(error => console.error('Error fetching countries:', error))
  </script>
</body>