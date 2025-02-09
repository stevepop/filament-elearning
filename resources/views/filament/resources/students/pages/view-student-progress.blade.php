<x-filament::page>
    <x-filament::section>
        <h2 class="text-lg font-medium">Progress for {{ $record->user->name }}</h2>
    </x-filament::section>

    <x-filament::section>
        <h3 class="text-lg font-medium">Course Progress Details</h3>

        <div class="mt-4 space-y-4">
            @foreach($record->enrollments as $enrollment)
                <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
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
    </x-filament::section>
</x-filament::page>
