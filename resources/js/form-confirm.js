
export function init() {
    $(function() {
        $('[data-role="modal-confirm"]').on('show.bs.modal', function (e) {
            let confirmLink = $(e.relatedTarget);
            let modal = $(this);
            modal.find('[data-role="modal-confirm-form"]').attr('action', confirmLink.data('confirm-action'));
            modal.find('[data-role="modal-confirm-message"]').text(confirmLink.data('confirm-message'));
        });
        $('[data-role="modal-confirm-btn-not"]').on('click', function (e) {
            let modal = $(e.target).siblings('[data-role="modal-confirm-form"]');
            modal.find('[data-role="modal-confirm-form"]').attr('action', '/');
            modal.find('[data-role="modal-confirm-message"]').text('');
        });
        $('[data-role="modal-confirm-btn-yes"]').on('click', function(e) {
            $(e.target).siblings('[data-role="modal-confirm-form"]').trigger('submit');
        });
    });
}
