   
    <div class="bg-white rounded-full absolute flex -top-5 md:-top-10 md:left-6 p-0 m-0">
            @if ($profile)
                <div class="rounded-full p-1 bg-gradient-to-r from-orange-500 to-sky-500 inline-block">
                    <img src="{{ asset('storage/' . $profile) }}" 
                        alt="Profile Picture" 
                        class="w-24 h-24 md:w-40 md:h-40 rounded-full object-cover border-4 border-white">
                </div>
            @else
                <x-heroicon-s-user-circle class="w-24 h-24 md:w-40 md:h-40 scale-110 rounded-full  text-brand-blue" />
            @endif

                <!-- Button and form (your existing code) -->
                <button type="button" onclick="document.getElementById('profileInput').click()"
                        class="absolute bottom-0 md:bottom-4 right-2 bg-orange-500 text-white p-1.5 rounded-full shadow-md hover:bg-orange-600">
                    <x-heroicon-o-camera class="w-4 h-4 md:w-5 md:h-5" />
                </button>

                    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="hidden" id="profileForm">
                        @csrf
                        <input id="profileInput" type="file" accept="image/*" name="profilePhoto" class="hidden" onchange="submitProfileForm(this)"> 
                    </form>

                    <!-- Loading Modal -->
                         <div id="loadingModal" class="fixed inset-0  items-center justify-center bg-black bg-opacity-50 hidden z-50">
                        
                        <div class="bg-white rounded-lg p-6 flex flex-col items-center w-72 max-w-sm">
                            
                            <svg class="w-16 h-16 mb-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                                <circle fill="#00AEEF" stroke="#00AEEF" stroke-width="15" r="15" cx="40" cy="100">
                                    <animate attributeName="opacity" calcMode="spline" dur="2"
                                        values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1"
                                        repeatCount="indefinite" begin="-.4"></animate>
                                </circle>
                                <circle fill="#00AEEF" stroke="#00AEEF" stroke-width="15" r="15" cx="100" cy="100">
                                    <animate attributeName="opacity" calcMode="spline" dur="2"
                                        values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1"
                                        repeatCount="indefinite" begin="-.2"></animate>
                                </circle>
                                <circle fill="#00AEEF" stroke="#00AEEF" stroke-width="15" r="15" cx="160" cy="100">
                                    <animate attributeName="opacity" calcMode="spline" dur="2"
                                        values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1"
                                        repeatCount="indefinite" begin="0"></animate>
                                </circle>
                            </svg>

                            <p class="text-md font-semibold text-brand-blue">Uploading...</p>
                        </div>
                    </div>
                <!-- Crop Modal -->
                    <div id="cropModal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-70 z-50">
                        <div class="bg-white p-4 rounded-lg w-full max-w-xl">
                            <div class="w-full h-96">
                                <img id="cropImage" class="max-w-full">
                            </div>

                            <div class="flex justify-end gap-2 mt-4">
                                <button onclick="closeCropModal()" class="px-3 py-1 bg-gray-300 rounded">Cancel</button>
                                <button onclick="cropAndUpload()" class="px-6 py-1 bg-sky-500 text-white rounded font-semibold">
                                    <x-heroicon-s-plus class="w-4 h-4 inline-block mr-1" />
                                    Upload</button>
                            </div>
                        </div>
                    </div>
    </div>

