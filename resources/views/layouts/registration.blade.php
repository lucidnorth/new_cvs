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
/* Base styles */
body {
    background-color: linear-gradient(175deg, rgba(106, 190, 255, 1) 0%, rgba(0, 58, 103, 1) 100%);
    height: 100vh;
    font-family: Montserrat;
    font-size: 14px;
    margin: 0;
    padding: 0;
}

.container-fluid {
    padding: 20px;
}

.inner-div {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

.bg-gradient {
    background: linear-gradient(175deg, rgba(106, 190, 255, 1) 0%, rgba(0, 58, 103, 1) 100%);
}

.image {
    width: 100%;
    max-width: 500px;
    text-align: center;
    margin-bottom: 20px;
}

.logo {
    width: 50%;
    max-width: 200px;
    margin-bottom: 20px;
    text-align: center;
}

.select-div {
    margin-bottom: 20px;
    width: 100%;
    max-width: 200px;
    text-align: left;
}

.vertical-divider {
    display: none;
}

.form-div {
    width: 100%;
    max-width: 500px;
    padding: 20px;
}

@media (min-width: 768px) {
    .inner-div {
        flex-direction: row;
        align-items: flex-start; /* Align items to the start */
    }

    .image, .form-div {
        width: 50%;
        max-width: none;
    }

    .vertical-divider {
        display: block;
        border-left: 1px solid #000000;
        height: 70%;
        margin-left: 20px;
        margin-right: 20px;
        opacity: 30%;
    }

    .select-div {
        margin-bottom: 40px; /* Add space after the dropdown */
        margin-right: 20px; /* Add space before the next element */
        width: auto;
        max-width: none;
    }

    .logo img {
        width: 300px;
        height: auto%;
    }

    .logo {
        margin-right: 20px; /* Add space after the logo */
    }
}

@media (max-width: 768px) {
    .logo {
        margin: 0 auto 20px auto; /* Center the logo horizontally and add margin bottom */
    }

    .logo img {
        width: 100%;
        height: auto;
    }

    .image, .welcometext {
        text-align: center;
    }

    .select-div {
        width: 100%; /* Set the dropdown width to 100% */
        max-width: none;
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


  </script>
</body>