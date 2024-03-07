<!DOCTYPE html>
<html>

<head>
    <title>Business Registration Page</title>
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
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none;
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
    width: 150%;
    margin-right: 10px;
    margin-top: 120px;
    margin-left: 120px;
    border-radius: 20px;
    margin-bottom: -50px;
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
    margin-top: 20px;
}

.signin {
    margin-left: 160px;
    padding-top: 20px;
}

.welcometext {
    color: #1176c4;
    font-size: 27px;
    text-align: center;
    margin-bottom: 30px;
}

.container {
    width: 950px;
    margin: 0 auto;
}

.verificationtext {
    font-weight: 700;
    font-style: normal;
}

.terms, .privacy {
    color: #0f69bd;
    font-weight: bold;
}

.asteric {
    color: #f00f0f;
}

/* Media Queries for Mobile Responsiveness */
@media (max-width: 768px) {

  body {
    background: #023D64;
  }

  .bg-gradient {
    /* global 94%+ browsers support */
   
    background: linear-gradient(175deg, rgba(106, 190, 255, 1) 0%, rgba(0, 58, 103, 1) 100%);
    height: cover;
  }

    .vertical-divider {
        display: none;
    }

    .inner-div {
        position: absolute;
        margin: 50px;
        flex-direction: column;
        align-items: center;
        padding: 30px;
        width: 550px;
        min-height: 1300px;
        border-radius: 20px;
    }

    .image img {
        width: 100%;
        margin: 20px 0;
        display: none;
    }

    

    /* .form-div {
        width: 400px;
        margin-right: 0;
        margin-top: -400px;
        padding: 20px;

    } */

    .signin, .welcometext {
        margin-left: 0;
        text-align: center;
    }

    .logo {
        width: 8rem;
    }
}



    </style>

</head>

<body>
@yield('content')

</body>