<!-- Start right pabel -->
<div class="col-span-8 ">
    <div class="p-16 mt-24 mb-10 ml-5 bg-white rounded shadow-lg ">

    </div>
    @foreach ($posts_data as $item)
        @if (empty($item->image) && empty($item->video))
            <div class="mt-2 ml-5 rounded shadow-lg max-h-xl">
                <div class="relative flex w-full px-3 py-3 bg-white" x-data="{isOpen:false }">
                    <img src="{{ asset('user-style/user-images/' . $item->Frontuser->avatar) }}"
                        class="items-center justify-center w-12 h-12 p-2 border-2 border-black rounded-full img-responsive">
                    <h3 class="py-3 ml-4 bg-white cursor-pointer hover:text-gray-600">
                        {{ $item->Frontuser->username }}
                    </h3>
                    <a href="#" class="py-3 ml-2 text-blue-500 hover:text-blue-800">
                        @if ($item->user_id == $username->id)
                        @else
                            Follow
                        @endif
                    </a>
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
                <div class="px-6">
                    <div class="mb-2 text-xl font-bold">The Coldest Sunset</div>
                    <p class="text-base text-gray-700">
                        {{ $item->body }}
                    </p>
                </div>
                <div class="relative flex px-6 py-3">
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-heart-o fa-1x"></i>
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-comment-o fa-1x"></i>
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-paper-plane-o fa-1x"></i>
                    <i class="absolute right-0 pr-2 cursor-pointer hover:text-gray-600 fa fa-bookmark-o"></i>

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

        @else
            <div class="mt-2 ml-5 rounded shadow-lg max-h-xl">
                <div class="relative flex w-full px-3 py-3 bg-white" x-data="{isOpen:false }">
                    <img src="{{ asset('user-style/user-images/' . $item->Frontuser->avatar) }}"
                        class="items-center justify-center w-12 h-12 p-2 border-2 border-black rounded-full img-responsive">
                    <h3 class="py-3 ml-4 bg-white cursor-pointer hover:text-gray-600">
                        {{ $item->Frontuser->username }}
                    </h3>
                    <a href="#" class="py-3 ml-2 text-blue-500 hover:text-blue-800">
                        @if ($item->user_id == $username->id)
                        @else
                            Follow
                        @endif
                    </a>
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
                    src="{{ asset('user-style/posts-images/' . $item->image) }}" alt="Dinner">
                <div class="relative flex px-6 py-3">
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-heart-o fa-1x"></i>
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-comment-o fa-1x"></i>
                    <i class="pr-3 cursor-pointer hover:text-gray-600 fa fa-paper-plane-o fa-1x"></i>
                    <i class="absolute right-0 pr-2 cursor-pointer hover:text-gray-600 fa fa-bookmark-o"></i>

                </div>
                <div class="px-6">
                    <div class="mb-2 text-xl font-bold">The Coldest Sunset</div>
                    <p class="text-base text-gray-700">
                        {{ $item->body }}
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
        @endif
    @endforeach
</div>
<!-- End right pabel -->
