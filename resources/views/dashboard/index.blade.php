@extends('layouts.app')

@section('content')

{{-- Welcome --}}
<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-900">
        Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }},
        {{ Auth::user()->name }}
    </h1>

    <p class="mt-2 text-gray-500">
        Welcome back to the EdTech CRM ERP System.
    </p>

</div>
<!-- 
{{-- Quick Actions --}}
<div class="mb-8">

    @include('dashboard.quick-actions')

</div>

{{-- KPI Cards --}}
<div class="mb-8">

    @include('dashboard.stats-cards')

</div> -->

{{-- Monthly Admissions + Target --}}
<div class="grid grid-cols-12 gap-6 mb-8">

    <div class="col-span-12 xl:col-span-8">

        @include('dashboard.monthly-admissions')

    </div>

    <div class="col-span-12 xl:col-span-4">

        @include('dashboard.admission-target')

    </div>

</div>

{{-- Revenue + Lead Sources --}}
<div class="grid grid-cols-12 gap-6 mb-8">

    <div class="col-span-12 xl:col-span-8">

        @include('dashboard.revenue-chart')

    </div>

    <div class="col-span-12 xl:col-span-4">

        @include('dashboard.lead-source-chart')

    </div>

</div>

{{-- Recent Admissions + Recent Payments --}}
<div class="grid grid-cols-12 gap-6 mb-8">

    <div class="col-span-12 xl:col-span-8">

        @include('dashboard.recent-admissions')

    </div>

    <div class="col-span-12 xl:col-span-4">

        @include('dashboard.recent-payments')

    </div>

</div>

{{-- Follow-ups + Attendance --}}
<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 xl:col-span-7">

        @include('dashboard.followup-list')

    </div>

    <div class="col-span-12 xl:col-span-5">

        @include('dashboard.attendance-summary')

    </div>

</div>

@endsection