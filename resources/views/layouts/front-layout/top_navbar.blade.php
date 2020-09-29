<!-- Start the Top Navbar -->
<nav class="fixed z-10 flex items-center justify-between w-full p-4 font-sans bg-white border-b-2">
    <div class="flex float-left ">
        <img src="{{ asset('admin-style/admin-images/profile_defult.jpg') }}"
            class="w-12 h-12 border-0 img-circle img-responsive">
        <p class="mt-3 ml-4 text-blue ">Syria News</p>
    </div>
    <div class="float-left ">
        <i class="p-3 fa fa-search"></i>
        <input type="text" placeholder="Search " class="p-1 pl-4 border-2 ">
    </div>
    <div class="float-right">
        <ul class="flex">
            <li class="mr-6">
                <a class="text-black hover:text-black-800" href="{{ url('/') }}"><i
                        class="pr-2 fa fa-home fa-lg"></i></a>
            </li>
            @if (!empty(Session::get('UserEmail')))
                <li class="mr-6">
                    <a class="text-black-500 hover:text-black-800" href="#"><i class="pr-2 fa fa-send-o fa-lg"></i></a>
                </li>
                <li class="mr-6">
                    <a class="text-black-500 hover:text-black-800" href="#"><i class="fa fa-heart-o fa-lg"></i></a>
                </li>
            @endif
            <div x-data="{isOpen:false}">
                <li class="mr-6">
                    <a class="text-black-500 hover:text-black-800" href="#"><i class="fa fa-user fa-lg"
                            @click="isOpen=true"></i></a>
                </li>
                <!--
                here is if statemnt work depends on if the user login or not
                if user login then show dropdown to update his profile and more featuers
                if not then show him regiter and login page
                -->
                @if (empty(Session::has('UserEmail')))
                    <!-- Show model to toggle a login page-->
                    <div x-show="isOpen" style=" background:rgba(0 ,0 ,0 ,.5) ;"
                        class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg">
                        <div class="container overflow-y-auto rounded-lg max-auto lg:px-32">
                            <div class="bg-gray-900 rounded ">
                                <div class="flex justify-end pt-2 pr-4">
                                    <button @click=" isOpen = false"
                                        class="leading-none text-white text:3xl hover:text-gray-300">&times;</button>
                                </div>
                                <div class="px-8 py-8 model-body" x-data="{ Login:'Login'}">
                                    <form id="quickForm" class="block px-5 py-5 bg-white border-2 shadow-lg"
                                        x-show="Login === 'Login'" action="{{ route('Login_page') }}" method="POST">
                                        @csrf
                                        <h3
                                            class="pb-5 mb-2 font-mono text-2xl font-semibold text-center border-b-2 border-gray-400 cursor-pointer hover:text-gray-500">
                                            Login page</h3>
                                        <div class="flex flex-col py-5 form-group">
                                            <label for="exampleInputEmail1" class="mb-2 font-semibold">Email address :
                                            </label>
                                            <input type="email" name="email"
                                                class="w-3/4 px-2 py-2 border-2 border-gray-500 rounded shadow-md form-control"
                                                id="exampleInputEmail1" placeholder="Enter Email" required>
                                        </div>
                                        <div class="flex flex-col form-group ">
                                            <label class="mb-2 font-semibold">Password :</label>
                                            <input type="password" name="pass" required
                                                class="w-3/4 px-2 py-2 border-2 border-gray-500 rounded shadow-md form-control"
                                                placeholder="Password">
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="relative card-footer">
                                            <button type="submit"
                                                class="px-10 py-2 mt-10 font-mono font-semibold text-gray-700 transition duration-700 ease-in-out bg-white border-2 border-blue-500 rounded shadow hover:bg-blue-400 hover:text-white">Login</button>
                                            <a href="#" @click.prevent="Login ='Register'"
                                                class="px-10 py-3 mt-10 ml-4 font-mono font-semibold text-white transition duration-700 ease-in-out bg-red-700 border-2 border-red-700 rounded shadow hover:bg-white hover:text-gray-700">Register</a>

                                        </div>
                                    </form>
                                    <form id="quickForm" class="block w-full px-5 py-5 bg-white border-2 shadow-lg "
                                        x-show="Login ==='Register'" action="{{ route('register_page') }}"
                                        method="POST">
                                        @csrf
                                        <h3
                                            class="pb-5 mb-2 font-mono text-2xl font-semibold text-center border-b-2 border-gray-400 cursor-pointer hover:text-gray-500">
                                            Register page</h3>
                                        <div class="flex flex-wrap py-5 form-group">
                                            <div class="w-full md:w-1/2">
                                                <label for="exampleInputEmail1" class="mb-2 font-semibold">First_Name :
                                                </label>
                                                <input type="text" name="f_name"
                                                    class="px-2 py-2 border-b-2 border-black border-dotted rounded shadow-md form-control"
                                                    id="f_name" placeholder="Enter First Name" required>
                                            </div>
                                            <div class="w-full md:w-1/2">
                                                <label class="mb-2 font-semibold">Last_Name
                                                    :</label>
                                                <input type="text" name="l_name"
                                                    class="px-2 py-2 border-b-2 border-black border-dotted rounded shadow-md bg-none form-control"
                                                    placeholder="Enter Last Name" required>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap py-5 form-group">
                                            <div class="w-full md:w-1/2">
                                                <label for="exampleInputEmail1" class="mb-2 font-semibold">User_Name :
                                                </label>
                                                <input type="text" name="username"
                                                    class="px-2 py-2 border-b-2 border-black border-dotted rounded shadow-md form-control"
                                                    id="U_name" placeholder="Enter User Name " required>
                                            </div>
                                            <div class="w-full md:w-1/2">
                                                <label class="mb-2 font-semibold">Email
                                                    :</label>
                                                <input type="email" name="email"
                                                    class="px-2 py-2 border-b-2 border-black border-dotted rounded shadow-md form-control"
                                                    placeholder="Enter Your Email Address" required>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap py-1 form-group">
                                            <label for="exampleInputEmail1"
                                                class="mt-3 mb-3 mr-2 font-semibold ">Password :
                                            </label>
                                            <input type="password" name="pass"
                                                class="w-3/4 px-2 py-2 border-b-2 border-black border-dotted rounded shadow-md form-control"
                                                id="pass" placeholder="Enter Password" required>
                                        </div>
                                        <div class="flex flex-col mt-3 mb-3 form-group focus:border-gray-500 ">
                                            <label class="mb-2 font-semibold">Description
                                                :</label>
                                            <textarea name="Desc"
                                                class="w-full px-2 py-2 border-2 border-gray-500 rounded shadow-md form-control"
                                                placeholder="Message"></textarea>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="relative card-footer">
                                            <button type="submit"
                                                class="px-10 py-2 mt-10 font-mono font-semibold text-gray-700 transition duration-700 ease-in-out bg-white border-2 border-blue-500 rounded shadow hover:bg-blue-400 hover:text-white">Submit</button>
                                            <a href="#" @click.prevent="Login ='Login'"
                                                class="px-10 py-3 mt-10 ml-4 font-mono font-semibold text-white transition duration-700 ease-in-out bg-red-700 border-2 border-red-700 rounded shadow hover:bg-white hover:text-gray-700">Login</a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of First condation that shows the login page-->
                @else
                    <div x-show.transition.duration.300ms="isOpen" style=" background:rgba(0 ,0 ,0 ,.5) ;"
                        class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg">
                        <div class="container w-2/4 rounded-lg max-auto lg:px-32">
                            <div class="bg-white rounded ">
                                <div class="flex justify-end pt-2 pr-4">
                                    <button @click.away="isOpen=false" @click="isOpen=false"
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
                @endif
            </div>
        </ul>
    </div>
</nav>

<!-- End the Top Navbar -->
