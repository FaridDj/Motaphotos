jQuery(document).ready(function ($) {
    $('#category-select').on('change', function () {
        let categoryID = $(this).val();

        if (!categoryID) {
            $('#category-content').html('<p>Veuillez sélectionner une catégorie.</p>');
            return;
        }

        $.ajax({
            url: ajaxurl, // Défini automatiquement par WordPress
            type: 'POST',
            data: {
                action: 'load_category_content',
                nonce: category_ajax.nonce,
                category_id: categoryID,
            },
            beforeSend: function () {
                $('#category-content').html('<p>Chargement...</p>');
            },
            success: function (response) {
                if (response.success) {
                    $('#category-content').html(response.data);
                } else {
                    $('#category-content').html('<p>' + response.data + '</p>');
                }
            },
            error: function () {
                $('#category-content').html('<p>Une erreur est survenue.</p>');
            },
        });
    });
});
