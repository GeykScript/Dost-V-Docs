<!-- Profile Photo Upload Form -->
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
        <button type="button" onclick="document.getElementById('profileInput').click()"
                class="absolute bottom-0 md:bottom-4 right-2 bg-orange-500 text-white p-1.5 rounded-full shadow-md hover:bg-orange-600">
                <x-heroicon-o-camera class="w-4 h-4 md:w-5 md:h-5" />
        </button>
    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="hidden" >
        @csrf
        <input id="profileInput" type="file" accept="image/*" name="profilePhoto" class="hidden" onchange="this.form.submit()"> 
    </form>
</div>

                