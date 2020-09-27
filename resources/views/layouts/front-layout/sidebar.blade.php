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
          <div class="fixed right-0 flex col-span-4 py-5 mt-24 mr-32 border-t-2 border-blue-700 rounded ">
              <img src="{{ asset('admin-style/admin-images/IMG_1282.jpg') }}"
                  class="w-12 h-12 border-2 border-black rounded-full img-responsive">
              <h3 class="ml-4 text-gray-900 bold">{{ $username->username }}
                  <p class="text-sm text-gray-600">
                      @if (empty($username->First_name) && empty($username->First_name))
                          {{ $username->email }}
                      @else
                          {{ $username->First_name . ' ' . $username->Last_name }}
                      @endif
                  </p>
              </h3>
          </div>
      @endif
