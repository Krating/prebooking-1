$('#q').each(function() {
        var $this = $(this);
        var src = $this.data('action');

        $this.autocomplete({
            source: src,
            minLength: 2,
            select: function(event, ui) {
                $this.val(ui.item.value);
                $('#id').val(ui.item.id);
            }
        });
    });