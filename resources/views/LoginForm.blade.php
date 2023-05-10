<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion des tâches</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/helper.css') }}" />


        <!-- Styles -->
       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
  
    <div class="main-wrapper">

<!-- Content Body Start -->
<div class="content-body m-0 p-0">

    <div class="login-register-wrap">
        <div class="row">

            <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">
                <div class="login-register-form-wrap">

                    <div class="content">
                        <h1>Authentification</h1>
                   
                    </div>

                    <div class="login-register-form">
                        <form id="my-form">
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <input class="form-control" type="email" placeholder="Email" name="email"></div>
                                <div class="col-12 mb-20">
                                    <input class="form-control" type="password" placeholder="Mot de passe" name="password"></div>
                                
                                <div class="col-12">
                                </div>
                                <div class="col-12 mt-10">
                                    <input type="submit" class="button button-primary button-outline" value="Connexion"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                <div class="content">
                   <b> <h1 style="color: rgb(0,0,0);">Authentification </h1> </b>
                    
                </div>
            </div>

        </div>
    </div>

</div><!-- Content Body End -->

</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<script src="{{ asset('js/form.js') }}"></script>


</body>