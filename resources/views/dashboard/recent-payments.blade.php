<div class="rounded-2xl border border-gray-200 bg-white">

    <div class="flex items-center justify-between border-b border-gray-200 p-6">

        <div>

            <h3 class="text-xl font-semibold text-gray-900">
                Recent Payments
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Latest fee collections
            </p>

        </div>

        <a href="{{ route('payments.index', 1) }}"
            class="rounded-lg border border-gray-300 px-4 py-2 text-sm hover:bg-gray-50">

            View All

        </a>

    </div>

    <div class="divide-y divide-gray-100">

        @forelse($recentPayments ?? [] as $payment)

            <div class="flex items-center justify-between p-5 hover:bg-gray-50">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-green-100 font-semibold text-green-700">

                        {{ strtoupper(substr($payment->invoice->full_name,0,1)) }}

                    </div>

                    <div>

                        <p class="font-semibold text-gray-900">

                            {{$payment->invoice->student->full_name}}
                            

                        </p>

                        <p class="text-sm text-gray-500">

                            {{ $payment->payment_mode }}

                        </p>

                    </div>

                </div>

                <div class="text-right">

                    <p class="font-semibold text-green-600">

                        ₹ {{ number_format($payment->amount) }}

                    </p>

                    <p class="text-xs text-gray-500">

                        {{ $payment->created_at->format('d M') }}

                    </p>

                </div>

            </div>

        @empty

            <div class="p-10 text-center text-gray-500">

                No Payments Found

            </div>

        @endforelse

    </div>

</div>