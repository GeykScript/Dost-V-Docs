

    let cropper;
    let selectedFile;

    document.addEventListener('DOMContentLoaded', () => {

        const profileInput = document.getElementById('profileInput');
        const cropImage = document.getElementById('cropImage');

        const cropModal = document.getElementById('cropModal');
        const loadingModal = document.getElementById('loadingUpdatePhoto');

        const profileForm = document.getElementById('profileForm');

        const openFileBtn = document.getElementById('openFileBtn');
        const cancelBtn = document.getElementById('cancelUploadBtn');
        const uploadBtn = document.getElementById('uploadPhotoBtn');

        // Open file to select image
        if (openFileBtn) {
        openFileBtn.addEventListener('click', () => {
            profileInput.value = ''; // Reset the input to allow re-selecting the same file
            profileInput.click();
        });
    }

        // When file is selected
        if (profileInput) {
        profileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                selectedFile = this.files[0];

                const reader = new FileReader();
                reader.onload = function (e) {
                    cropImage.src = e.target.result;

                    cropModal.classList.remove('hidden');
                    cropModal.classList.add('flex');

                    if (cropper) cropper.destroy();

                    cropper = new Cropper(cropImage, {
                        aspectRatio: 1,
                        viewMode: 1,
                    });
                };

                reader.readAsDataURL(selectedFile);
            }
        });
    }

        // Cancel button
        if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            profileInput.value = ''; // Reset the input
            cropModal.classList.add('hidden');
            cropModal.classList.remove('flex');

            if (cropper) cropper.destroy();
        });
    }

     // Upload button
    if (uploadBtn) {
        uploadBtn.addEventListener('click', () => {
            if (!cropper) return;

            const canvas = cropper.getCroppedCanvas({ width: 300, height: 300 });

            const originalType = selectedFile.type;
            const extension = originalType.split('/')[1];

            canvas.toBlob(function(blob) {
                const file = new File([blob], `profile.${extension}`, { type: originalType });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                profileInput.files = dataTransfer.files;

                // Hide crop modal
                cropModal.classList.add('hidden');
                cropModal.classList.remove('flex');

                // Show loading modal via Alpine event
                window.dispatchEvent(new CustomEvent('show-loading'));

                // Submit the form
                profileForm.submit();
            }, originalType);
        });
    }

    });
    