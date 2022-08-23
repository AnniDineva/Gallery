$(document).ready(function() {
    console.log("ready!");
    console.log(window.location.hash);
    if (window.location.hash == '#register') {
        $('#registerModal').modal('show');
    } else if ($('#loginModal .alert').length && $('#contactsErrors').length == 0 && $('#commentErrors').length == 0) {
        $('#loginModal').modal('show');
    }

    $('#deleteUser').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('rowid')
        var modal = $(this)
        modal.find('.userId').val(recipient);

    })

    $('#deletePhoto').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('rowid')
        var modal = $(this)
        modal.find('.photoId').val(recipient);

    })

    $('#deleteComment').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('rowid')
        var modal = $(this)
        modal.find('.commentId').val(recipient);

    })


    $(function() {
        // Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            console.log(input.files);
            if (input.files) {
                var filesAmount = input.files.length;
                var countCurentPhotos = $('#countOfPhothos').val();
                var countAllowedPhotos = 10 - countCurentPhotos;

                if (filesAmount > countAllowedPhotos) {
                    $('#images_upload_form').trigger("reset");
                    $('#errorMessage').show();
                    $('#errorMessage').html('Максималният брой снимки, които са ви oстанали за качване са  ' + countAllowedPhotos + ' бр. Моля изберете до ' + countAllowedPhotos + ' снимки.')
                } else {
                    $('#errorMessage').hide();
                    $(imgPreviewPlaceholder).html("");
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }
        };
        $('#images').on('change', function() {
            previewImages(this, 'div.images-preview-div');
        });
    });
});