@extends('adminlte::page')

@section('content')
    <div class="row pull-right">
        <div class="col-md-12">
        <a type="submit" class="btn btn-primary" href="{{route('providers.create')}}">Create provider</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Providers</div>
                <div class="panel-body">
                    @if($providers->count() > 0)
                        <table class="table">

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>WebPage</th>
                            </tr>
                            @foreach($providers as $provider)
                                <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->name }}</td>
                                    <td>{{ $provider->slug }}</td>
                                    <td>{{ $provider->phone }}</td>
                                    <td>{{ $provider->email }}</td>
                                    <td>{{ $provider->webpage }}</td>

                                    <td>
                                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST">
                                            <a type="button" class="btn btn-default"
                                               href="{{ route('providers.edit', $provider->id) }}">edit</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        No providers
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection