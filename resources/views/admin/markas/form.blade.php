@extends('adminlte::page')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					@if(empty($entity))
						<div class="panel-heading">Create new marka</div>
					@else
						<div class="panel-heading">Edit marka</div>
					@endif
					<div class="panel-body">
						<form action="@if(empty($entity)){{ route('markas.store') }}@else{{ route('markas.update', $entity->id) }}@endif" method="POST">
							{{ csrf_field() }}
							@isset($entity)
								 {{ method_field('PUT') }}
							@endisset
							<div class="row">
								@include('admin.fields.text', ['field' => 'name', 'name' => 'Name'])
								@include('admin.fields.text', ['field' => 'slug', 'name' => 'Slug'])
							</div>
							<input type="submit" value="save">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection