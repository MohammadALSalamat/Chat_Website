@extends('Front-End.Front_desgin')
@section('content')
    <div class="relative flex items-center justify-center col-span-12 mt-32">
        <!--header for posts-->
        <div x-data="{tab:'profile'}" class="flex">
            <div class="col-span-3">
                <div class="p-4 mr-4 hover:bg-gray-200 hover:text-gray-600 hover:border-gray-700 hover:border-l "
                    :class="{'border-l border-gray-700 ' : tab ==='profile'} " @click.prevent="tab='profile'">
                    <i class="pr-1 fa fa-user-o"></i>
                    <span>Profile Info</span>
                </div>
                <div class="flex p-4 mr-4 hover:bg-gray-200 hover:text-gray-600 hover:border-gray-700 hover:border-l"
                    :class="{'border-l border-gray-700' : tab ==='GTV'}" @click.prevent="tab='GTV'">
                    <i class="pr-2 fa fa-lock"></i>
                    <span>Change Password</span>
                </div>
                <div class="p-4 mr-4 hover:bg-gray-200 hover:text-gray-600 hover:border-gray-700 hover:border-l "
                    :class="{'border-l border-gray-700' : tab ==='saved'}" @click.prevent="tab='saved'">
                    <i class="pr-1 fa fa-bookmark-o"></i>
                    <span>Uplode Avater</span>
                </div>
                <div class="p-4 mr-4 hover:bg-gray-200 hover:text-gray-600 hover:border-gray-700 hover:border-l"
                    :class="{'border-l border-gray-700' : tab ==='taged'}" @click.prevent="tab='taged'">
                    <i class="pr-1 fa fa-user"></i>
                    <span>Additional Info</span>
                </div>
            </div>
            <div class="col-span-7">
                <div x-show="tab ==='profile'" class="items-center justify-center w-full h-auto ml-5">
                    <form id="quickForm" class="block w-full px-5 py-5 bg-white shadow-lg "
                        action="{{ url('/Store_Edit_Profile/' . $username->id) }}" method="post">
                        @csrf
                        <h3
                            class="pb-5 mb-2 font-mono text-2xl font-semibold text-center border-b-2 border-gray-400 cursor-pointer hover:text-gray-500">
                            Update Profile page</h3>
                        <div class="flex flex-wrap py-5 form-group">
                            <div class="w-full ">
                                <label for="exampleInputEmail1"
                                    class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">First_Name :
                                </label>
                                <input type="text" name="f_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    id="f_name" placeholder="Enter First Name" value="{{ $username->First_name }}">
                            </div>
                            <div class="w-full">
                                <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Last_Name
                                    :</label>
                                <input type="text" name="l_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    placeholder="Enter Last Name" value="{{ $username->Last_name }}">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="exampleInputEmail1" class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">User_Name :
                            </label>
                            <input type="text" name="username"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                id="U_name" placeholder="Enter User Name " required value="{{ $username->username }}">
                        </div>
                        <div class="w-full">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Email
                                :</label>
                            <input type="email" name="email"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                placeholder="Enter Your Email Address" required value="{{ $username->email }}">
                        </div>
                        <span class="text-sm text-gray-500"> <strong class="text-red-600 text-md">Note :</strong> down below
                            where you can add description about
                            your self to let others know more about you</span>
                        <div class="flex flex-col mt-3 mb-3 form-group focus:border-gray-500 ">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Bio
                                :</label>
                            <textarea name="Desc"
                                class="w-full px-2 py-2 border-2 border-gray-500 rounded shadow-md form-control"
                                placeholder="Message">{{ $username->description }}</textarea>
                        </div>
                        <!-- /.card-body -->
                        <div class="relative card-footer">
                            <button type="submit"
                                class="px-10 py-2 mt-10 font-mono font-semibold text-gray-700 transition duration-700 ease-in-out bg-white border-2 border-blue-500 rounded shadow hover:bg-blue-400 hover:text-white">Update
                                Profile</button>

                        </div>
                    </form>
                </div>
                <div x-show="tab ==='GTV'">
                    <form id="quickForm" class="block w-full px-5 py-5 bg-white shadow-lg " action="" method=" POST">
                        @csrf
                        <h3
                            class="pb-5 mb-2 font-mono text-2xl font-semibold text-center border-b-2 border-gray-400 cursor-pointer hover:text-gray-500">
                            Update The Password</h3>
                        <div class="flex flex-wrap py-5 form-group">
                            <div class="w-full ">
                                <label for="exampleInputEmail1"
                                    class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">First_Name :
                                </label>
                                <input type="text" name="f_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    id="f_name" placeholder="Enter First Name" value="{{ $username->First_name }}">
                            </div>
                            <div class="w-full">
                                <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Last_Name
                                    :</label>
                                <input type="text" name="l_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    placeholder="Enter Last Name" value="{{ $username->Last_name }}">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="exampleInputEmail1" class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">User_Name :
                            </label>
                            <input type="text" name="username"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                id="U_name" placeholder="Enter User Name " required value="{{ $username->username }}">
                        </div>
                        <div class="w-full">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Email
                                :</label>
                            <input type="email" name="email"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                placeholder="Enter Your Email Address" required value="{{ $username->email }}">
                        </div>
                        <span class="text-sm text-gray-500"> <strong class="text-red-600 text-md">Note :</strong> down below
                            where you can add description about
                            your self to let others know more about you</span>
                        <div class="flex flex-col mt-3 mb-3 form-group focus:border-gray-500 ">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Bio
                                :</label>
                            <textarea name="Desc"
                                class="w-full px-2 py-2 border-2 border-gray-500 rounded shadow-md form-control"
                                placeholder="Message">{{ $username->description }}</textarea>
                        </div>
                        <!-- /.card-body -->
                        <div class="relative card-footer">
                            <button type="submit"
                                class="px-10 py-2 mt-10 font-mono font-semibold text-gray-700 transition duration-700 ease-in-out bg-white border-2 border-blue-500 rounded shadow hover:bg-blue-400 hover:text-white">Update
                                Profile</button>

                        </div>
                    </form>
                </div>
                <div x-show="tab ==='saved'">
                    <form id="quickForm" class="block w-full px-5 py-5 bg-white shadow-lg " action="" method=" POST">
                        @csrf
                        <h3
                            class="pb-5 mb-2 font-mono text-2xl font-semibold text-center border-b-2 border-gray-400 cursor-pointer hover:text-gray-500">
                            Add your Avatar</h3>
                        <div class="flex flex-wrap py-5 form-group">
                            <div class="w-full ">
                                <label for="exampleInputEmail1"
                                    class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">First_Name :
                                </label>
                                <input type="text" name="f_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    id="f_name" placeholder="Enter First Name" required value="{{ $username->First_name }}">
                            </div>
                            <div class="w-full">
                                <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Last_Name
                                    :</label>
                                <input type="text" name="l_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    placeholder="Enter Last Name" required value="{{ $username->Last_name }}">
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="exampleInputEmail1" class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">User_Name :
                            </label>
                            <input type="text" name="username"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                id="U_name" placeholder="Enter User Name " required value="{{ $username->username }}">
                        </div>
                        <div class="w-full">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Email
                                :</label>
                            <input type="email" name="email"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                placeholder="Enter Your Email Address" required value="{{ $username->email }}">
                        </div>
                        <span class="text-sm text-gray-500"> <strong class="text-red-600 text-md">Note :</strong> down below
                            where you can add description about
                            your self to let others know more about you</span>
                        <div class="flex flex-col mt-3 mb-3 form-group focus:border-gray-500 ">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Bio
                                :</label>
                            <textarea name="Desc"
                                class="w-full px-2 py-2 border-2 border-gray-500 rounded shadow-md form-control"
                                placeholder="Message">{{ $username->description }}</textarea>
                        </div>
                        <!-- /.card-body -->
                        <div class="relative card-footer">
                            <button type="submit"
                                class="px-10 py-2 mt-10 font-mono font-semibold text-gray-700 transition duration-700 ease-in-out bg-white border-2 border-blue-500 rounded shadow hover:bg-blue-400 hover:text-white">Update
                                Profile</button>

                        </div>
                    </form>
                </div>
                <div x-show="tab ==='taged'">
                    <form id="quickForm" class="block w-full px-5 py-5 bg-white shadow-lg " action="" method=" POST">
                        @csrf
                        <h3
                            class="pb-5 mb-2 font-mono text-2xl font-semibold text-center border-b-2 border-gray-400 cursor-pointer hover:text-gray-500">
                            Additional Information</h3>
                        <div class="flex flex-wrap py-5 form-group">
                            <div class="w-full ">
                                <label for="exampleInputEmail1"
                                    class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">First_Name :
                                </label>
                                <input type="text" name="f_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    id="f_name" placeholder="Enter First Name" required value="{{ $username->First_name }}">
                            </div>
                            <div class="w-full">
                                <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Last_Name
                                    :</label>
                                <input type="text" name="l_name"
                                    class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                    placeholder="Enter Last Name" required value="{{ $username->Last_name }}">
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="exampleInputEmail1" class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">User_Name :
                            </label>
                            <input type="text" name="username"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                id="U_name" placeholder="Enter User Name " required value="{{ $username->username }}">
                        </div>
                        <div class="w-full">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Email
                                :</label>
                            <input type="email" name="email"
                                class="w-full px-2 py-2 mt-2 mb-4 border border-gray-400 border-dotted rounded shadow-md form-control"
                                placeholder="Enter Your Email Address" required value="{{ $username->email }}">
                        </div>
                        <span class="text-sm text-gray-500"> <strong class="text-red-600 text-md">Note :</strong> down below
                            where you can add description about
                            your self to let others know more about you</span>
                        <div class="flex flex-col mt-3 mb-3 form-group focus:border-gray-500 ">
                            <label class="mt-3 mb-3 mr-2 font-semibold text-gray-700 ">Bio
                                :</label>
                            <textarea name="Desc"
                                class="w-full px-2 py-2 border-2 border-gray-500 rounded shadow-md form-control"
                                placeholder="Message">{{ $username->description }}</textarea>
                        </div>
                        <!-- /.card-body -->
                        <div class="relative card-footer">
                            <button type="submit"
                                class="px-10 py-2 mt-10 font-mono font-semibold text-gray-700 transition duration-700 ease-in-out bg-white border-2 border-blue-500 rounded shadow hover:bg-blue-400 hover:text-white">Update
                                Profile</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
