

let cropper;
let selectedFile;

window.submitProfileForm = function(input) {
    if (input.files && input.files[0]) {
        selectedFile = input.files[0];

        const reader = new FileReader();
        reader.onload = function (e) {
            const cropImage = document.getElementById('cropImage');
            cropImage.src = e.target.result;

            const cropModal = document.getElementById('cropModal');
            cropModal.classList.remove('hidden');
            cropModal.classList.add('flex');

            if (cropper) cropper.destroy();

            cropper = new Cropper(cropImage, {
                aspectRatio: 1,
                viewMode: 1,
                preview: '.preview'
            });
        };

        reader.readAsDataURL(selectedFile);
    }
};

window.closeCropModal = function() {
    const cropModal = document.getElementById('cropModal');
    cropModal.classList.add('hidden');
    cropModal.classList.remove('flex');

    if (cropper) cropper.destroy();
};

window.cropAndUpload = function() {
    if (!cropper) return;

    const canvas = cropper.getCroppedCanvas({ width: 300, height: 300 });

    canvas.toBlob(function(blob) {
        const input = new File([blob], 'profile.jpg', { type: 'image/jpeg' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(input);

        const profileInput = document.getElementById('profileInput');
        profileInput.files = dataTransfer.files;

        // Show loading modal
        const loadingModal = document.getElementById('loadingModal');
        loadingModal.classList.remove('hidden');
        loadingModal.classList.add('flex');

        const cropModal = document.getElementById('cropModal');
        cropModal.classList.add('hidden');
        cropModal.classList.remove('flex');

        document.getElementById('profileForm').submit();
    }, 'image/jpeg');
};