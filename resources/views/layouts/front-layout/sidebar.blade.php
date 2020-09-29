<!--side bar -->
@if (empty(Session::get('UserEmail')))
    <div class="fixed right-0 flex col-span-4 py-5 mt-24 mr-32 border-t-2 border-blue-700 rounded ">
        <img src="{{ asset('admin-style/admin-images/profile_defult.jpg') }}"
            class="w-12 h-12 border-2 border-black rounded-full img-responsive">
        <h3 class="ml-4 text-gray-900 bold">
            <p class="text-sm text-gray-600">
                Please Login To Complete your Access
            </p>
        </h3>
    </div>
@else
    <div class="fixed right-0 block col-span-4 py-5 mt-24 mr-32 border-t-2 border-blue-700 rounded "
        x-data="{model:''}">
        <div class="flex">
            <img src="{{ asset('user-style/user-images/' . $username->avatar) }}"
                class="w-12 h-12 border-2 border-black rounded-full img-responsive">
            <h3 class="ml-4 text-gray-900 bold"><a href="{{ route('Front_page', $username->id) }}"
                    class="cursor-pointer">{{ $username->username }}</a>
                <p class="text-sm text-gray-600">
                    @if (empty($username->First_name) && empty($username->First_name))
                        {{ $username->email }}
                    @else
                        {{ $username->First_name . ' ' . $username->Last_name }}
                    @endif
                </p>
            </h3>
        </div>
        <div class="items-center justify-between px-3 py-2 mt-10 mb-5 border rounded">
            <a href="#"><i class="mr-4 fa fa-plus-square-o fa-lg hover:text-gray-600"
                    @click.prevent="model='add_text'"></i></a>
            <a href="#"><i class="mr-5 fa fa-image fa-lg hover:text-gray-600 "
                    @click.prevent="model='add_image'"></i></a>
            <a href="#"><i class="mr-5 fa fa-youtube-play fa-lg hover:text-gray-600 "></i></a>
            <a href="#"><i class="fa fa-home fa-lg hover:text-gray-600"></i></a>
        </div>

        <!--Models to add text -->
        <div x-show.transition.duration.300ms="model ==='add_text'" style=" background:rgba(0 ,0 ,0 ,.5) ;"
            class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg">
            <div class="container w-2/4 rounded-lg max-auto lg:px-32">
                <div class="bg-white rounded ">
                    <div class="flex justify-end pt-2 pr-4">
                        <button @click.away="model=false" @click="model=false"
                            class="leading-none text-black text:3xl hover:text-gray-700">&times;</button>
                    </div>
                    <div class="px-8 py-8 model-body">
                        <ul class="text-center">
                            <a href="{{ url('/Front_page/' . $username->id) }}">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Profile</li>
                            </a>
                            <a href="#">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Edit Profile</li>
                            </a>
                            <a href="#">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Sittings</li>
                            </a>
                            <a href="{{ route('Front_logout') }}">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Log Out</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Models to add image-->
        <div x-show.transition.duration.300ms="model ==='add_image'" style=" background:rgba(0 ,0 ,0 ,.5) ;"
            class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg">
            <div class="container w-2/4 rounded-lg max-auto lg:px-32">
                <div class="bg-white rounded ">
                    <div class="flex justify-end pt-2 pr-4">
                        <button @click.away="model=false" @click="model=false"
                            class="leading-none text-black text:3xl hover:text-gray-700">&times;</button>
                    </div>
                    <div class="px-8 py-8 model-body">
                        <ul class="text-center">
                            <a href="{{ url('/Front_page/' . $username->id) }}">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Profile</li>
                            </a>
                            <a href="#">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Edit Profile</li>
                            </a>
                            <a href="#">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Sittings</li>
                            </a>
                            <a href="{{ route('Front_logout') }}">
                                <li
                                    class="px-4 py-5 border-b border-gray-300 shadow-md cursor-pointer hover:bg-gray-200 hover:text-gray-600">
                                    Log Out</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
