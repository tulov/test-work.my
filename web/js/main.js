/**
 * Created by lex on 17.03.2016.
 */
$(document).ready(function(){
    $('div.loop').click(function(){
        var target = $(this);
        target.toggleClass('zoom');
    });
    $(document).on('click', '.showModalButton', function(){
        var modal = $('#modal');
        if (modal.data('bs.modal').isShown) {
            modal.find('#modalContent').load($(this).attr('value'));
            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        } else {
            modal.modal('show').find('#modalContent').load($(this).attr('value'));
            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        }
    });
});