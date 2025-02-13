<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-6">
        <a href="/" class="text-blue-600 hover:text-blue-800">← Back to Courses</a>
    </div>

    <div class="lg:grid lg:grid-cols-3 lg:gap-8">
        <!-- Main Content -->
        <div class="col-span-2">
            <div class="flex items-center justify-between mb-4">
                <span class="px-3 py-1 text-sm rounded-full {{
                    $course->level === 'beginner' ? 'bg-green-100 text-green-800' :
                    ($course->level === 'intermediate' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800')
                }}">
                    {{ ucfirst($course->level) }}
                </span>
                <span class="text-2xl font-bold text-gray-900">${{ number_format($course->price, 2) }}</span>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $course->title }}</h1>

            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex items-center mb-4">
                    <img src="https://ui-avatars.com/api/?name=Instructor&background=random"
                         alt="Instructor"
                         class="h-12 w-12 rounded-full">
                    <div class="ml-4">
                        <p class="text-lg font-medium text-gray-900">Instructor</p>
                        <p class="text-gray-600">Course Instructor</p>
                    </div>
                </div>
            </div>

            <div class="prose prose-blue max-w-none">
                <p class="text-gray-600">{{ $course->description }}</p>
            </div>
        </div>

        <!-- Sidebar -->
        <div>
            <div class="bg-white rounded-lg shadow-lg p-6 sticky top-6">
                <h2 class="text-xl font-semibold mb-4">Course Content</h2>
                <div class="space-y-3">
                    @foreach ($course->modules as $module)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                {{ $loop->iteration }}
                            </span>
                            <span class="ml-3 text-gray-700">{{ $module->title }}</span>
                        </div>
                    @endforeach
                </div>

                <button wire:click="enroll"
                        class="w-full mt-6 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    Enroll Now
                </button>
            </div>
        </div>
    </div>
</div>
