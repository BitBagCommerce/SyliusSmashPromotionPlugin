$(() => {
    $('.smash-image').on('click', function () {
        $('#smash-modal-' + $(this).data('smash-id')).modal('show');
    });
});
