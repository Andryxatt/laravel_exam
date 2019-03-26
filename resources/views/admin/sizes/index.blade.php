@extends('adminlte::page')

@section('content')
    <div class="row pull-right">
        <div class="col-md-12">
        <a type="submit" class="btn btn-primary" href="{{route('sizes.create')}}">Create size line</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sizes</div>
                <div class="panel-body">
                    @if($sizes->count() > 0)
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            @foreach($sizes as $size)
                                <tr>
                                    <td>{{ $size->id }}</td>
                                    <td>{{ $size->name }}</td>
                                    <td>{{ $size->description }}</td>
                                    <td>
                                        <form action="{{ route('sizes.destroy', $size->id) }}" method="POST">
                                            <a type="button" class="btn btn-default"
                                               href="{{ route('sizes.edit', $size->id) }}">edit</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        No sizes
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection