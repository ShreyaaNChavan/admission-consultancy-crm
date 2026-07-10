@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6">

    Add Lead Source

</h2>

<form action="{{ route('lead-sources.store') }}" method="POST">

    @csrf

    <div>

        <label>Source Name</label>

        <input
            type="text"
            name="source_name"
            class="border w-full p-2 rounded"
            required>

    </div>

    <button
        class="mt-5 bg-blue-600 text-white px-6 py-2 rounded">

        Save Source

    </button>

</form>

@endsection