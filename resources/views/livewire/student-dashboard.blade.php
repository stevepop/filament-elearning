<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">My Learning Dashboard</h1>

    @if($enrolledCourses->isEmpty())
        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
            <h3 class="text-lg font-medium text-gray-900 mb-2">No courses yet</h3>
            <p class="text-gray-600 mb-4">Start your learning journey by enrolling in a course.</p>
            <a href="/" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Browse Courses
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($enrolledCourses as $course)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 text-sm rounded-full {{
                                $course->level === 'beginner' ? 'bg-green-100 text-green-800' :
                                ($course->level === 'intermediate' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800')
                            }}">
                                {{ ucfirst($course->level) }}
                            </span>
                        </div>

                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $course->title }}</h3>

                        <!-- Progress Section -->
                        <div class="mt-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Progress</span>
                                <span>{{ $course->pivot->progress ?? 0 }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full"
                                     style="width: {{ $course->pivot->progress ?? 0 }}%">
                                </div>
                            </div>
                        </div>

                        <!-- Modules Complete -->
                        <div class="mt-4 text-sm text-gray-600">
                            {{ $course->pivot->completed_modules ?? 0 }} of {{ $course->modules->count() }} modules complete
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('courses.show', $course) }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Continue Learning
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
