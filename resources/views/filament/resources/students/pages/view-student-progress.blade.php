// resources/views/filament/resources/student/pages/view-student-progress.blade.php
<x-filament::page>
    <x-filament::card>
        <div class="space-y-6">
            <h2 class="text-lg font-medium">Student Progress</h2>

            <div>
                <livewire:student-progress-chart :student="$record" />
            </div>

            {{-- Course Progress Details --}}
            <div class="mt-6">
                <h3 class="text-base font-medium mb-4">Course Progress Details</h3>
                @foreach($record->enrollments as $enrollment)
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-medium">{{ $enrollment->course->title }}</h4>
                                <p class="text-sm text-gray-500">
                                    Enrolled: {{ $enrollment->enrolled_at->format('M d, Y') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-bold">{{ $enrollment->progress }}%</div>
                                <div class="text-sm text-gray-500">Complete</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-filament::card>
</x-filament::page>
