<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projet Kiné</title>

        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}

        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}

        <!--[if lt IE 9]>

            {{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}

            {{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}

        <![endif]-->

        <style> textarea { resize: none; } </style>

    </head>

    <body>
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">ProjetKiné</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Accueil <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Se connecter</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">À propos</a></li>
                <li><a href="#">Contact </a></li>                
              </ul>
            </div><!-- /.navbar-collapse -->
          </div>
        </nav>

        @yield('contenu')

    </body>
</html>
