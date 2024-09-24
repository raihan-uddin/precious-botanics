<x-app-layout>

    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" x-data="tagForm()">
                    <form method="POST" action="{{ route('tags.update', $tag->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Tag Name -->
                        <div>
                            <x-input-label for="name" :value="__('Tag Name')" />
                            <x-text-input id="name" type="text" name="name" 
                                x-model="name" 
                                @input="generateSlug()" 
                                class="block mt-1 w-full" 
                                required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <!-- Slug -->
                        <div class="mt-4">
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" type="text" name="slug" 
                                x-model="slug" 
                                class="block mt-1 w-full" 
                                readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button>{{ __('Update Tag') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tagForm() {
            return {
                name: '{{ $tag->name }}', // Bind the initial name value
                slug: '{{ $tag->slug }}', // Bind the initial slug value
                
                generateSlug() {
                    this.slug = this.name.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
                }
            }
        }
    </script>
</x-app-layout>
