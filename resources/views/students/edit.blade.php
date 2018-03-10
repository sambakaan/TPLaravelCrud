@extends('layouts.app')
@section('content')
<div class="container">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Ajouter un etudiant</h3>
		</div>
		<div class="panel-body">
			<form action="{{ route('update', $student->id) }}" method="POST" class="form-horizontal">
				{{csrf_field()}}
				<fieldset>
					<legend class="text-center">Informations generales</legend>
					<div class="form-group">
						<label for="inputfirst" class="col-md-2 control-label">First Name</label>

						<div class="col-md-10">
							<input type="text" name="firstname" value="{{$student->first_name}}" class="form-control" id="inputfirst" placeholder="First name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLast" class="col-md-2 control-label">Last Name</label>

						<div class="col-md-10">
							<input type="text" class="form-control" id="inputLast" value="{{$student->last_name}}" name="lastname" placeholder="Last name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-md-2 control-label">Email</label>

						<div class="col-md-10">
							<input type="email" class="form-control" id="inputEmail" name="email" value="{{$student->email}}" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="inputTel" class="col-md-2 control-label">Telephone</label>

						<div class="col-md-10">
							<input type="tel" class="form-control" id="inputTel" name="telephone" value="{{$student->phone}}" placeholder="Telephone">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="button" class="btn btn-default">Annuler</button>
							<button type="submit" class="btn btn-primary">Valider</button>
						</div>
					</div>
				</fieldset>
			</form>


		</div>
	</div>
</div>
@stop