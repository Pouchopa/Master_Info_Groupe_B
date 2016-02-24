@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Inscription</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Il y a quelques soucis avec vos renseignements.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Pseudo</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="pseudo" value="{{ Input::old('pseudo') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Adresse e-mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ Input::old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmation du mot de passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nom" value="{{ Input::old('nom') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Prénom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="prenom" value="{{ Input::old('prenom') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Sexe</label>
	                        <div class="radio col-md-6">
	                            <label>
	                                {{ Form::radio('sexe', 'Homme') }}Homme
	                            </label>

	                            <label>
	                                {{ Form::radio('sexe', 'Femme') }}Femme
	                            </label>
	                        </div>
                    	</div>

                    	<div class="form-group">
                            <label class="col-md-4 control-label">Date de naissance</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="datepicker" name="date_naissance" value="{{ Input::old('date_naissance') }}">
							</div>
                        </div>

						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									S'enregistrer
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
