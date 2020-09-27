<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script import 'alpinejs'>
    </script>
</head>

<body class="bg-gray-100">
    <!-- include top nav bar -->
    @include('layouts.front-layout.top_navbar')
    <div class="container grid grid-cols-12 gap-10 mb-10 ">
        <!-- Start profile -->
        <div class="relative col-span-11 ">
            <!-- Information header -->
            <div class="flex col-span-4 py-5 mt-24 mr-32">
                <img src="{{ asset('admin-style/admin-images/IMG_1282.jpg') }}"
                    class="w-48 h-48 ml-auto border-2 border-black rounded-full img-responsive">
                <div class="w-1/3 ml-32 mr-auto">
                    <div class="flex items-center justify-center mb-5 ">
                        <h1 class="flex-1 text-4xl text-gray-900 ">{{ $username->username }}</h1>
                        <button class="flex-1 px-1 py-1 text-sm border border-gray-500 bg-none">
                            Edit Profile</button>
                        <i class="ml-10 fa fa-cog fa-spin fa-2x" title="settings"></i>
                    </div>
                    <div class="flex items-center justify-center mb-5 ">
                        <span class="flex-1 mr-4 text-gray-900 text-md "> <strong class="text-lg">90</strong>
                            posts</span>
                        <span class="flex-1 mr-4 text-gray-900 text-md "><strong class="text-lg">90</strong>
                            Followers</span>
                        <span class="flex-1 text-gray-900 text-md "><strong class="text-lg">90</strong> Following</span>
                    </div>
                    <p class="mb-4 text-sm font-bold text-black">
                        @if (empty($username->First_name) && empty($username->First_name))
                            {{ $username->email }}
                        @else
                            {{ $username->First_name . ' ' . $username->Last_name }}
                        @endif
                    </p>
                    <p class="text-sm text-gray-600">
                        @if (empty($username->description))
                            Edit Your Bio
                        @else
                            {{ $username->description }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="p-16 mt-24 mb-10 ml-5 bg-white rounded shadow-lg ">

            </div>
            <div class="mt-2 ml-5 rounded shadow-lg max-h-xl">
                <div class="relative flex w-full px-3 py-3 bg-white" x-data="{isOpen:false }">
                    <img src="{{ asset('admin-style/admin-images/profile_defult.jpg') }}"
                        class="items-center justify-center w-12 h-12 p-2 border-2 border-black rounded-full img-responsive">
                    <h3 class="py-3 ml-4 bg-white cursor-pointer hover:text-gray-600">Mohammad Al Salamat</h3>
                    <a href="#" class="py-3 ml-2 text-blue-500 hover:text-blue-800"> Follow</a>
                    <div class="absolute right-0 items-center float-left ">
                        <p class="py-3 mr-4 text-lg cursor-pointer hover:text-gray-600"><i class="fa fa-ellipsis-h"
                                @click="isOpen=!isOpen" @keydown.escape="isOpen=false"></i>
                        <ul class="absolute right-0 w-48 text-center capitalize bg-white rounded shadow-lg "
                            x-show="isOpen" @click.away="isOpen=false">
                            <li class="px-3 py-3 text-red-500 hover:bg-gray-200">block</li>
                            <li class="px-3 py-3 hover:bg-gray-200">Follow</li>
                            <li class="px-3 py-3 hover:bg-gray-200">go post</li>
                            <li class="px-3 py-3 hover:bg-gray-200">share</li>
                            <li class="px-3 py-3 hover:bg-gray-200">copy link</li>
                            <li class="px-3 py-3 hover:bg-gray-200">cancel</li>
                        </ul>
                        </p>
                    </div>
                </div>
                <img class="object-fill object-center w-full h-auto"
                    src="{{ asset('admin-style/admin-images/IMG_1282.jpg') }}" alt="Dinner">
                <div class="relative flex px-6 py-3">
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-heart-o fa-1x"></i>
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-comment-o fa-1x"></i>
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-paper-plane-o fa-1x"></i>
                    <i class="absolute right-0 pr-2 cursor-pointer hover:text-gray-600 fa fa-bookmark-o"></i>

                </div>
                <div class="px-6">
                    <div class="mb-2 text-xl font-bold">The Coldest Sunset</div>
                    <p class="text-base text-gray-700">
                        this place to add text
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span
                        class="inline-block px-3 py-1 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#photography</span>
                    <span
                        class="inline-block px-3 py-1 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#travel</span>
                    <span
                        class="inline-block px-3 py-1 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#winter</span>
                </div>
            </div>
        </div>
        <!-- End right pabel -->
    </div>
</body>

</html>
