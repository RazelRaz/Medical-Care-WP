jQuery(document).ready(function($) {
    let frame;

    // Add Images button
    $('.add-slider-images-button').on('click', function(e) {
        e.preventDefault();

        if ( frame ) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'Select or Upload Images',
            button: { text: 'Use these images' },
            multiple: true
        });

        frame.on('select', function() {
            let images = frame.state().get('selection').toJSON();
            let imageList = $('#slider-images-list');

            images.forEach(function(image) {
                imageList.append(`
                    <li>
                        <img src="${image.sizes.thumbnail.url}" />
                        <input type="hidden" name="slider_images[]" value="${image.id}" />
                        <a href="#" class="remove-slider-image">Remove</a>
                    </li>
                `);
            });
        });

        frame.open();
    });

    // Remove Images button
    $(document).on('click', '.remove-slider-image', function(e) {
        e.preventDefault();
        $(this).closest('li').remove();
    });
});
