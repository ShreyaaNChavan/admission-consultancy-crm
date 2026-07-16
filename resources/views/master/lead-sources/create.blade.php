@extends('layouts.app')

@section('page-title', 'Add Lead Source')

@section('content')

    <div class="max-w-4xl mx-auto space-y-8">

        {{-- Header --}}
        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                Add New Lead Source
            </h2>

            <p class="mt-2 text-sm text-gray-500">
                Create a new lead source for student enquiries and marketing campaigns.
            </p>

        </div>

        {{-- Form Card --}}
        <form action="{{ route('lead-sources.store') }}" method="POST">

            @csrf

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-gray-200 px-8 py-5">

                    <h3 class="text-lg font-semibold text-gray-900">
                        Lead Source Information
                    </h3>

                </div>

                {{-- Body --}}
                <div class="p-8">

                    <div>

                        <label class="mb-2 block text-sm font-medium text-gray-700">

                            Source Name
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="text" name="source_name" value="{{ old('source_name') }}"
                            placeholder="Instagram, Facebook, Website, Referral..." required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('source_name')

                            <p class="mt-2 text-sm text-red-500">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex justify-end gap-4 border-t border-gray-200 bg-gray-50 px-8 py-5">

                    <a href="{{ route('lead-sources.index') }}"
                        class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                        Save Lead Source

                    </button>

                </div>

            </div>

        </form>

        {{-- Information Card --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

            <div class="flex items-start gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7h18M5 7v10a2 2 0 002 2h10a2 2 0 002-2V7M8 11h8M8 15h5" />

                    </svg>

                </div>

                <div class="flex-1">

                    <h3 class="text-lg font-semibold text-gray-900">

                        Lead Source Insights

                    </h3>

                    <p class="mt-2 text-sm leading-7 text-gray-600">

                        Understanding where enquiries come from helps your admission team
                        measure marketing performance and improve conversion rates.
                        Most education consultancies receive their highest number of leads
                        from digital channels such as social media, websites and referrals.

                    </p>

                    {{-- Mini Statistics --}}
                    <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-4">

                        <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">

                            <p class="text-xs uppercase tracking-wide text-gray-500">

                                Top Source

                            </p>

                            <p class="mt-2 font-semibold text-gray-900">

                                Instagram

                            </p>

                        </div>

                        <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">

                            <p class="text-xs uppercase tracking-wide text-gray-500">

                                Avg. Conversion

                            </p>

                            <p class="mt-2 font-semibold text-green-600">

                                28%

                            </p>

                        </div>

                        <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">

                            <p class="text-xs uppercase tracking-wide text-gray-500">

                                Popular Age

                            </p>

                            <p class="mt-2 font-semibold text-gray-900">

                                18–24 Years

                            </p>

                        </div>

                        <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">

                            <p class="text-xs uppercase tracking-wide text-gray-500">

                                Best Channel

                            </p>

                            <p class="mt-2 font-semibold text-blue-600">

                                Referrals

                            </p>

                        </div>

                    </div>

                    {{-- Tags --}}
                    <div class="mt-6 flex flex-wrap gap-2">

                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">

                            Instagram

                        </span>

                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">

                            Website

                        </span>

                        <span class="rounded-full bg-yellow-50 px-3 py-1 text-xs font-medium text-yellow-700">

                            Google Ads

                        </span>

                        <span class="rounded-full bg-purple-50 px-3 py-1 text-xs font-medium text-purple-700">

                            Referral

                        </span>

                        <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700">

                            Walk-in

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection