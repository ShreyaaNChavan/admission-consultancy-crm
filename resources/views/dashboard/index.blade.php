@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold">

    Welcome, {{ Auth::user()->name }}

</h1>

<p class="mt-2 text-gray-600">

    You are logged in as <strong>{{ Auth::user()->email }}</strong>

</p>

@endsection