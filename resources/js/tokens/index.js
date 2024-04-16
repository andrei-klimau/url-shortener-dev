$(function() {
    $('[data-role="modal-create-token-btn-submit"]').on('click', function(e) {
        let btnSubmit = $(e.target);
        let modal = btnSubmit.parents('[data-role="modal-create-token"]');
        let form = modal.find('[data-role="modal-create-token-form"]');
        let message = modal.find('[data-role="modal-create-token-message"]');
 
        message.hide().removeAttr('class').text('');
        btnSubmit.attr('disabled', '');
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                modal.data('need-update', true);
                form.hide();
                btnSubmit.hide();
                message.addClass('alert alert-success');
                $('<p>').addClass('fw-normal')
                    .text(message.data('success-msg')).appendTo(message);
                $('<p>').addClass('font-monospace')
                    .text(data.token).appendTo(message);
                $('<p>').addClass('fw-bold').text(message.data('save-token-msg'))
                    .appendTo(message);
                message.show();
            },
            error: function(jqXHR) {
                message.addClass('alert alert-danger');
                message.text(jqXHR.responseJSON.message);
                message.show();
            },
            complete: function() {
                btnSubmit.removeAttr('disabled');
            }
        });
    });
    
    $('[data-role="modal-create-token"]').on('show.bs.modal', function(e) {
        let modal = $(e.target);
        let btnSubmit = modal.find('[data-role="modal-create-token-btn-submit"]');
        let form = modal.find('[data-role="modal-create-token-form"]');
        let message = modal.find('[data-role="modal-create-token-message"]');
        
        form.show();
        btnSubmit.removeAttr('disabled');
        btnSubmit.show();
        message.hide();
        form.trigger('reset');
        modal.data('need-update', false);
    });
    
    $('[data-role="modal-create-token"]').on('hidden.bs.modal', function(e) {
        let needUpdate = $(e.target).data('need-update');
        if (needUpdate) {
            location.reload();
        }
    });
});