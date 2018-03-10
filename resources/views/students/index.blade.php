@extends('layouts.app')
@section('content')
<div class="container">
	@if (session('successMsg'))
	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{session('successMsg')}}</strong>
	</div>
	@endif
	<div class="row">
		<table class="table table-striped table-hover ">
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Telephone</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($students as $student)
				<tr>
					<td>{{$student->id}}</td>
					<td>{{$student->first_name}}</td>
					<td>{{$student->last_name}}</td>
					<td>{{$student->email}}</td>
					<td>{{$student->phone}}</td>
					<td class="text-center">
						<a href="{{ route('edit',$student->id) }}" class="btn btn-raised btn-primary btn-sm">
							<i class="fa fa-edit"></i>
						</a>
						<form  id="deleteForm-{{$student->id}}" method="POST" action="{{ route('delete',$student->id) }}" style="display: none;" >
							{{ csrf_field() }}
							{{ method_field('delete') }}
						</form>
						<button onclick="deleteConfirm()" class="btn btn-raised btn-danger btn-sm">
							<i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		{{ $students->links() }}
	</div>
</div>

@stop

<script>
	var deleteConfirm = function(){
		if(confirm('Voulez vous vraiment supprimer :('))
		{
			document.getElementById('deleteForm-{{$student->id}}').submit();
		}else{
			even.preventDefault();
		}
	}
</script>