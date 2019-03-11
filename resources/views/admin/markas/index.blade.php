@extends('adminlte::page')

@section('content')
    <div class="row pull-right">
        <div class="col-md-12">
        <a type="submit" class="btn btn-primary" href="{{route('markas.create')}}">Create marka</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Markas</div>
                <div class="panel-body">
                    @if($markas->count() > 0)
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                            </tr>
                            @foreach($markas as $marka)
                                <tr>
                                    <td>{{ $marka->id }}</td>
                                    <td>{{ $marka->name }}</td>
                                    <td>{{ $marka->slug }}</td>
                                    <td>
                                        <form action="{{ route('markas.destroy', $marka->id) }}" method="POST">
                                            <a type="button" class="btn btn-default"
                                               href="{{ route('markas.edit', $marka->id) }}">edit</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        No markas
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection