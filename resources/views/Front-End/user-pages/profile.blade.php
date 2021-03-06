@extends('Front-End.Front_desgin')
@section('content')

    <!-- Start profile -->
    <div class="relative col-span-11 ">
        <!-- Information header -->
        <div class="flex col-span-4 py-5 mt-24 mr-32">
            <img src="{{ asset('user-style/user-images/' . $username->avatar) }}"
                class="object-cover w-48 h-48 ml-auto border-2 border-black rounded-full img-responsive">
            <div class="w-1/3 ml-32 mr-auto">
                <div class="flex items-center justify-center mb-5 ">
                    <h1 class="flex-1 text-4xl text-gray-900 ">{{ $username->username }}</h1>
                    <a href="{{ url('/profile/edit/' . $username->id) }}"><button
                            class="flex-1 px-5 py-1 text-sm border border-gray-500 rounded bg-none">
                            Edit Profile</button></a>
                    <i class="ml-10 fa fa-cog fa-spin fa-2x" title="settings"></i>
                </div>
                <div class="flex items-center justify-center mb-5 ">
                    <span class="flex-1 mr-4 text-gray-900 text-md "> <strong class="pr-1 text-lg">90</strong>
                        posts</span>
                    <span class="flex-1 mr-4 text-gray-900 text-md "><strong
                            class="pr-1 text-lg">{{ $username->Followers }}</strong>
                        Followers</span>
                    <span class="flex-1 text-gray-900 text-md "><strong
                            class="pr-1 text-lg">{{ $username->Followering }}</strong>
                        Following</span>
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
        <!--header for posts-->
        <hr class="mt-24 text-gray-500">
        <div x-data="{tab:'posts'}">
            <div class="relative flex items-center justify-center mb-4">
                <div class="p-4 mr-4 " :class="{'border-t-2 border-black' : tab ==='posts'}" @click.prevent="tab='posts'">
                    <i class="pr-1 fa fa-table"></i>
                    <span>Posts</span>
                </div>
                <div class="flex p-4 mr-4" :class="{'border-t-2 border-black' : tab ==='GTV'}" @click.prevent="tab='GTV'">
                    <svg fill="#8e8e8e" class="w-5 h-5 pr-1" viewBox="0 0 48 48">
                        <path
                            d="M41 10c-2.2-2.1-4.8-3.5-10.4-3.5h-3.3L30.5 3c.6-.6.5-1.6-.1-2.1-.6-.6-1.6-.5-2.1.1L24 5.6 19.7 1c-.6-.6-1.5-.6-2.1-.1-.6.6-.7 1.5-.1 2.1l3.2 3.5h-3.3C11.8 6.5 9.2 7.9 7 10c-2.1 2.2-3.5 4.8-3.5 10.4v13.1c0 5.7 1.4 8.3 3.5 10.5 2.2 2.1 4.8 3.5 10.4 3.5h13.1c5.7 0 8.3-1.4 10.5-3.5 2.1-2.2 3.5-4.8 3.5-10.4V20.5c0-5.7-1.4-8.3-3.5-10.5zm.5 23.6c0 5.2-1.3 7-2.6 8.3-1.4 1.3-3.2 2.6-8.4 2.6H17.4c-5.2 0-7-1.3-8.3-2.6-1.3-1.4-2.6-3.2-2.6-8.4v-13c0-5.2 1.3-7 2.6-8.3 1.4-1.3 3.2-2.6 8.4-2.6h13.1c5.2 0 7 1.3 8.3 2.6 1.3 1.4 2.6 3.2 2.6 8.4v13zM34.6 25l-9.1 2.8v-3.7c0-.5-.2-.9-.6-1.2-.4-.3-.9-.4-1.3-.2l-11.1 3.4c-.8.2-1.2 1.1-1 1.9.2.8 1.1 1.2 1.9 1l9.1-2.8v3.7c0 .5.2.9.6 1.2.3.2.6.3.9.3.1 0 .3 0 .4-.1l11.1-3.4c.8-.2 1.2-1.1 1-1.9s-1.1-1.2-1.9-1z">
                        </path>
                    </svg>
                    <span>IGTV</span>
                </div>
                <div class="p-4 mr-4 " :class="{'border-t-2 border-black' : tab ==='saved'}" @click.prevent="tab='saved'">
                    <i class="pr-1 fa fa-bookmark-o"></i>
                    <span>Saved</span>
                </div>
                <div class="p-4 mr-4 " :class="{'border-t-2 border-black' : tab ==='taged'}" @click.prevent="tab='taged'">
                    <i class="pr-1 fa fa-user"></i>
                    <span>Taged</span>
                </div>
            </div>
            <div class="ml-5 ">
                <div x-show="tab ==='posts'">
                    <div class="flex flex-wrap items-center justify-center" x-data="{overLay:false}">
                        @foreach ($posts as $post)
                            @if (empty($post->image) && empty($post->video))
                                <div class="relative w-1/4 h-full mb-2 mr-2 overflow-hidden">
                                    <p class="h-64 px-3 py-3 bg-white border border-gray-100 shadow-lg">
                                        {{ $post->body }}
                                    </p>
                                    <div class="absolute inset-0 bg-black opacity-75 " x-show="overLay">
                                        <span
                                            class="z-40 flex items-center my-32 text-2xl font-bold text-white justify-evenly ">
                                            <i class=" fa fa-comment-o fa-2x"></i>
                                            <i class=" fa fa-heart-o fa-2x"></i>
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div class="relative w-1/4 h-64 mb-2 mr-2 overflow-hidden">
                                    <img src="{{ asset('user-style/posts-images/' . $post->image) }}"
                                        class="z-0 rounded-md shadow-md img-responsive" @mouseenter="overLay=true">
                                    <div class="absolute inset-0 bg-black opacity-75 " x-show="overLay">
                                        <span
                                            class="z-40 flex items-center my-32 text-2xl font-bold text-white justify-evenly ">
                                            <i class=" fa fa-heart-o fa-2x"></i>
                                            <i class=" fa fa-heart-o fa-2x"></i>

                                        </span>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
                <div x-show="tab ==='GTV'">
                    GTV content
                </div>
                <div x-show="tab ==='saved'">
                    saved content
                </div>
                <div x-show="tab ==='taged'">
                    taged content
                </div>
            </div>
        </div>
    </div>
    <!-- End right pabel -->
@endsection
