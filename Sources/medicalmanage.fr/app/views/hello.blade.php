@extends('app')


@section('content')


            <div class="col-md-offset-2 col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="{{ URL::to('/') }}/images/accueil/1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{ URL::to('/') }}/images/accueil/2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{ URL::to('/') }}/images/accueil/3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ URL::to('/') }}/images/accueil/4.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right"></h4>
                                <h4><a href="#">Bienvenue</a>
                                </h4>
                                <p>Bonjour, et bienvenue sur le site Internet de votre kinésithérapeute. <a target="_blank" href="http://www.kinestherapieCorte.com">Kinésthérapie Corte</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ URL::to('/') }}/images/accueil/5.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right"></h4>
                                <h4><a href="#">Rhumathologie</a>
                                </h4>
                                <p> c'est-à-dire des maladies des os, des articulations, des muscles, des tendons et des ligaments</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
       
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ URL::to('/') }}/images/accueil/6.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right"></h4>
                                <h4><a href="#">Kiné Sport</a>
                                </h4>
                                <p>Le kinésithérapeute joue un rôle essentiel auprès des sportifs, qu’ils soient en herbe ou de haut niveau.  
								</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    
                                   
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ URL::to('/') }}/images/accueil/7.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right"></h4>
                                <h4><a href="#">Onde de Choc</a>
                                </h4>
                                <p>Epaule Douloureuse,Epine calcanéenne,Epypycondilite,Tendinose</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ URL::to('/') }}/images/accueil/8.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right"></h4>
                                <h4><a href="#">ostéopathie</a>
                                </h4>
                                <p>L'ostéopathie est l'art de soigner par les mains le fonctionnement du corps humain.
le principe est que toute fixation, quelle que soit sa localisation tissulaire , empeche l'organisme de pouvoir à son auto guérison</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Horaires d'ouverture du centre</a>
                        </h4>
                        <p>Matin & Après-midi
<ul>
<li>Lundi	9h - 18h</li>
<li>Mardi	9h - 18h</li>
<li>Mercredi	9h - 18h</li>
<li>Jeudi	9h - 18h</li>
<li>Vendredi	9h - 18h</li>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center small">
                    <p><a class="newsomething" href="{{ url('/admin') }}">Administration</a></p>
                </div>
            </div>
        </footer>

    </div>

@stop