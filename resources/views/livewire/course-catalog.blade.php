<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($courses as $course)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-2 py-1 text-sm rounded {{ $course->level === 'beginner' ? 'bg-green-100 text-green-800' : ($course->level === 'intermediate' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($course->level) }}
                            </span>
                            <span class="text-gray-600">${{ $course->price }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">{{ $course->title }}</h3>
                        <p class="mt-2 text-gray-600">{{ Str::limit($course->description, 150) }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="{{ route('courses.show', $course) }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                View Course
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    </div>
</div>
