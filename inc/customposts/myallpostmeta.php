<?php

// gallery
if( !function_exists( 'medical_add_custom_box_for_gallery' ) ){
    function medical_add_custom_box_for_gallery() {
        add_meta_box(
        'gallery_meta',
        'View Details text',
        'gallery_display_callback'
        );
    }
}

if( !function_exists( 'gallery_display_callback' ) ) {
    function gallery_display_callback( $post ) {
        // GET
        $galtextbtn = get_post_meta( $post->ID, 'gal_key', true );
        ?>
          <label for="addicon">View Detials Icon Text</label>
          <input type="text" name="gal_add_btn_text" id="gal_add_btn_text" value="<?php echo $galtextbtn; ?>">
        <?php
    }
}


if( !function_exists( 'gallery_meta_save' ) ) {
    // save
    function gallery_meta_save( $post_id ) {
        // Check if 'gal_btn_text' is set to avoid undefined index warnings
        if( isset( $_POST['gal_add_btn_text'] ) ) {
            update_post_meta(
              $post_id,
              'gal_key',
              sanitize_text_field($_POST['gal_add_btn_text']),
            );
        }
    }
}
add_action( 'save_post', 'gallery_meta_save' );

// funfacts
if( !function_exists( 'medical_add_custom_box_for_funfacts' ) ) {
    function medical_add_custom_box_for_funfacts() {
        add_meta_box(
          'funfacts_meta',
          'Fun Fact Icon',
          'funfact_display_callback',
          'my_own_myfunfacts'
        );
    }
}

if( !function_exists( 'funfact_display_callback' ) ) {
    function funfact_display_callback( $post ) {
        // GET
        $funsaveIcon = get_post_meta( $post->ID, 'fun_key', true );
        ?>

        <label for="addicon">Add Fun Fact Icon Name Here (Example: icofont-ambulance-cross )</label>
        <p>Find All Icons <a href="https://icofont.com/">Here</a></p>
        <input type="text" name="fun_add_icon" id="fun_add_icon" value="<?php echo $funsaveIcon ?>">
        
        <?php 

    }
}

if( !function_exists( 'funfact_meta_save' ) ) {
    // save
    function funfact_meta_save( $post_id ) {
        // Check if 'fun_add_icon' is set to avoid undefined index warnings
        if( isset( $_POST['fun_add_icon'] ) ) {
            update_post_meta(
              $post_id,
              'fun_key',
              sanitize_text_field( $_POST['fun_add_icon'] ),
            );
        }
    }
}

add_action( 'save_post', 'funfact_meta_save' );


      // help 

      if( !function_exists( 'medical_add_custom_box' ) ) {
        function medical_add_custom_box() {
            add_meta_box(
                'help_meta',
                'Add Icon',
                'help_display_callback',
                'my_own_help'

            );
        }
    }

    if( !function_exists( 'help_display_callback' ) ) {
        function help_display_callback($post) {
          //get
          $saveIcon = get_post_meta( $post->ID, 'save_key', true );
          ?>
            <label for="addicon">Add Help Service Icon Name Here (Example: icofont-ambulance-cross )</label>
            <p></p>
            <input type="text" name="add_icon" id="add_icon" value="<?php echo $saveIcon ?>">
            
          <?php 
        }
    }


    if( !function_exists( 'help_meta_save' ) ) {
      // SAVE
      function help_meta_save( $post_id ) {
            // Check if 'add_icon' is set to avoid undefined index warnings
            if ( isset( $_POST['add_icon'] ) ) {
              update_post_meta(
                $post_id,
                'save_key',
                sanitize_text_field( $_POST['add_icon'] ), // Sanitizes input to enhance security
              );
            }
        }
    }
    add_action( 'save_post', 'help_meta_save' );


      // schedule
      if( !function_exists( 'medical_add_custom_box_for_schedule' ) ) {
        function medical_add_custom_box_for_schedule() {
            add_meta_box(
              'schedule_meta',
              'Top Short Title',
              'schedule_display_callback',
              'my_custom_schedule'
            );
        }
    }

    if( !function_exists( 'schedule_display_callback' ) ) {
        function schedule_display_callback( $post ) {
          // get
            $schedule_short_save =  get_post_meta( $post->ID, 'schedule_key', true );
            $learn_more_text = get_post_meta( $post->ID, 'learn_more_text_key', true ); // New meta field for Learn More text
            ?>
              <label for="schedule">Add Short Top Title Here</label>
              <input type="text" name="add_schedule" id="add_schedule" value="<?php echo $schedule_short_save; ?>">
              <br><br>
              <label for="learn_more_text">Learn More Text</label>
              <input type="text" name="learn_more_text" id="learn_more_text" value="<?php echo esc_attr($learn_more_text); ?>"> <!-- New field for "Learn More" text -->
            <?php
        }
    }

    if( !function_exists( 'schedule_meta_save' ) ) {
      // save
        function schedule_meta_save( $post_id ) {
           // Check if 'add_schedule_short' is set to avoid undefined index warnings
           if( isset( $_POST['add_schedule'] ) ) {
            update_post_meta(
              $post_id,
              'schedule_key',
              sanitize_text_field( $_POST['add_schedule'] ) // Sanitizes input to enhance security
            );
           }

           if( isset( $_POST['learn_more_text'] ) ) {
              update_post_meta(
                $post_id,
                'learn_more_text_key',
                sanitize_text_field( $_POST['learn_more_text'] ),
              );
           }
            
        }
    }

    add_action( 'save_post', 'schedule_meta_save' );
