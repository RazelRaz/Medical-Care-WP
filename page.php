<?php
 
    if( have_posts() ) :
      while( have_posts() ) : the_post();

      ?>
        <article>
            <h2>from page.php</h2>
            <h1><?php the_title(); ?></h1>
            <p>page</p>
            <p><?php the_content(); ?></p>
        </article>
      <?php
     
      endwhile;


    else:
      _e('No Post Found', 'manutdtheme');
    endif;
 
  ?>