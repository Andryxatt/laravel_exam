@extends('adminlte::page')

@section('content')
    <div class="row pull-right">
        <div class="col-md-12">
        <a type="submit" class="btn btn-primary" href="{{route('sklads.create')}}">Create sklad</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sklads</div>
                <div class="panel-body">
                    @if($sklads->count() > 0)
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price month</th>
                            </tr>
                            @foreach($sklads as $sklad)
                                <tr>
                                    <td>{{ $sklad->id }}</td>
                                    <td>{{ $sklad->name }}</td>
                                    <td>{{ $sklad->priceMonth }}</td>
                                    <td>
                                        <form action="{{ route('sklads.destroy', $sklad->id) }}" method="POST">
                                            <a type="button" class="btn btn-default"
                                               href="{{ route('sklads.edit', $sklad->id) }}">edit</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        No sklads
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection