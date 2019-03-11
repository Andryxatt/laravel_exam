@extends('adminlte::page')

@section('content')
    <div class="row pull-right">
        <div class="col-md-12">
            <a type="submit" class="btn btn-primary" href="{{route('posts.create')}}">Create post</a>
        </div>
    </div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Posts</div>
					<div class="panel-body">
						@if($posts->count() > 0)
							<table class="table">
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Actions</th>
								</tr>
								@foreach($posts as $post)
									<tr>
										<td>{{ $post->id }}</td>
										<td>{{ $post->title }}</td>
										<td>
											<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
												<a type="button" class="btn btn-default" href="{{ route('posts.edit', $post->id) }}">edit</a>
												{{ method_field('DELETE') }}
												{{ csrf_field() }}
												<button type="submit" class="btn btn-danger">delete</button>
											</form>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							No posts
						@endif
					</div>
				</div>
			</div>
		</div>

@endsection