<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('user.profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-gray-50 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                            <div class="-mx-3 md:flex">
                                <div class="md:w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="bio">
                                        Bio
                                    </label>
                                    <textarea rows="9" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="bio" id="bio" placeholder="Bio">{{ $user->bio }}</textarea>

                                    <label class="mt-4 block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="banner">
                                        Banner
                                    </label>
                                    <input type="file" id="banner" name="banner"/>

                                    <label class="mt-4 block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="defaultBanner">
                                        Use default banner
                                    </label>
                                    <input type="checkbox" id="defaultBanner" name="defaultBanner"/>
                                </div>

                                <div class="w-full">
                                    <div class="pl-2">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                            Avatar
                                        </label>
                                        @include('components.upload-image')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
