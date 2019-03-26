@extends('layouts.app')
@section('content')
<form action={{url('add')}} method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <input type="text" name="id" value="2"><br>
    Name: <input type="text" name="name"><br>
   Price: <input type="text" name="price"><br>
   Quantity: <input type="number" name="quantity"><br>
    <input type="submit" value="submit">
</form>
    @endsection