
    <!-- js/components/cropping.js - JavaScript code for handling profile picture cropping and uploading. -->
    
    <!-- Profile Upload   -->
    <div class="bg-white rounded-full absolute flex -top-5 md:-top-10 md:left-6 p-0 m-0">
        @if ($profile)
            <div class="rounded-full p-1 bg-gradient-to-r from-orange-500 to-sky-500 inline-block">
                <img src="{{ asset('storage/' . $profile) }}" 
                    alt="Profile Picture" 
                    class="w-24 h-24 md:w-40 md:h-40 rounded-full object-cover border-4 border-white">
            </div>
        @else
            <!-- Default Profile  -->
            <x-heroicon-s-user-circle class="w-24 h-24 md:w-40 md:h-40 scale-110 rounded-full  text-brand-blue" />
        @endif

        <!-- Open File Button -->
        <button type="button" id="openFileBtn" class="absolute bottom-0 md:bottom-4 right-2 bg-orange-500 text-white p-1.5 rounded-full shadow-md hover:bg-orange-600">
                <x-heroicon-o-camera class="w-4 h-4 md:w-5 md:h-5" />
        </button>
            <!-- Upload Form  -->
            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="hidden" id="profileForm">
                @csrf
                <input id="profileInput" type="file" accept="image/*" name="profilePhoto" class="hidden">
            </form>
                
                <!-- Crop Modal -->
                <div id="cropModal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-70 z-50 p-2">
                    <div class="bg-white p-4 md:p-6 rounded-lg w-full max-w-xl flex  flex-col">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="bg-orange-50 rounded-full p-4">
                                <x-heroicon-s-photo class="w-6 h-6 text-orange-600 scale-110" />
                            </div>
                            <div>
                                <h2 class="text-md md:text-lg font-bold text-gray-800">Update Profile Picture</h2>
                                <p class="text-xs md:text-sm text-gray-600">Drag to reposition and adjust the crop for a perfect fit.</p>
                            </div>
                        </div>
                        <div class="w-full h-96">
                            <img id="cropImage" class="max-w-full">
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <button id="cancelUploadBtn" class="px-3 py-2 text-sky-500 hover:bg-sky-100 font-semibold rounded">Cancel</button>
                            <button id="uploadPhotoBtn" class="px-6 py-1 bg-sky-500 hover:bg-sky-400 text-white rounded font-semibold">
                                <x-heroicon-s-pencil-square class="w-4 h-4 inline-block mr-1" />
                                Save</button>
                        </div>
                    </div>
                </div>

                <!-- Loading Modal When Uploading -->
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

                    <x-form.loading-modal open="loading" id="loadingModal" message="Processing..." />

    </div>

