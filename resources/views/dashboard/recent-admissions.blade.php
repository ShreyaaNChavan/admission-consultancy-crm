<div class="rounded-2xl border border-gray-200 bg-white">

    <div class="flex items-center justify-between border-b border-gray-200 p-6">

        <div>

            <h3 class="text-xl font-semibold text-gray-900">
                Recent Admissions
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Latest enrolled students
            </p>

        </div>

        <a href="{{ route('admissions.index') }}"
            class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium hover:bg-gray-50">

            View All

        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="border-b border-gray-200 bg-gray-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Student
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Course
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Batch
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Fees
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($recentAdmissions ?? [] as $student)

                    <tr class="border-b border-gray-100 hover:bg-gray-50">

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 font-semibold text-blue-700">

                                    {{ strtoupper(substr($student->full_name,0,1)) }}

                                </div>

                                <div>

                                    <p class="font-medium text-gray-900">

                                        {{ $student->full_name }}

                                    </p>

                                    <p class="text-xs text-gray-500">

                                        {{ $student->student_code }}

                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-4">

                            {{ $student->course->course_name }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $student->batch->batch_name }}

                        </td>

                        <td class="px-6 py-4">

                            ₹ {{ number_format($student->invoice->total_amount ?? 0) }}

                        </td>

                        <td class="px-6 py-4">

                            <span
                                class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                Active

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">

                            No recent admissions found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>