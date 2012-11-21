<?php
add_filter('post_updated_messages', 'my_post_updated_messages');
function my_post_updated_messages( $messages ) {
  global $post_ID;

	$messages['game'] = array(
	  0 => '', // Unused. Messages start at index 1.
	  1 => sprintf( __('Game updated. <a href="%s">View Game</a>'), esc_url( get_permalink($post_ID) ) ),
	  2 => __('Custom field updated.'),
	  3 => __('Custom field deleted.'),
	  4 => __('Game updated.'),
	  /* translators: %s: date and time of the revision */
	  5 => isset($_GET['revision']) ? sprintf( __('Game restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	  6 => sprintf( __('Game published. <a href="%s">View Game</a>'), esc_url( get_permalink($post_ID) ) ),
	  7 => __('Game saved.'),
	  8 => sprintf( __('Game submitted. <a target="_blank" href="%s">Preview Game</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  9 => sprintf( __('Game scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Game</a>'),
	    // translators: Publish box date format, see http://php.net/date
	    date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	  10 => sprintf( __('Game draft updated. <a target="_blank" href="%s">Preview Game</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	$messages['resource'] = array(
	  0 => '', // Unused. Messages start at index 1.
	  1 => sprintf( __('Resource updated. <a href="%s">View Resource</a>'), esc_url( get_permalink($post_ID) ) ),
	  2 => __('Custom field updated.'),
	  3 => __('Custom field deleted.'),
	  4 => __('Resource updated.'),
	  /* translators: %s: date and time of the revision */
	  5 => isset($_GET['revision']) ? sprintf( __('Resource restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	  6 => sprintf( __('Resource published. <a href="%s">View Resource</a>'), esc_url( get_permalink($post_ID) ) ),
	  7 => __('Resource saved.'),
	  8 => sprintf( __('Resource submitted. <a target="_blank" href="%s">Preview Resource</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  9 => sprintf( __('Resource scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Resource</a>'),
	    // translators: Publish box date format, see http://php.net/date
	    date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	  10 => sprintf( __('Resource draft updated. <a target="_blank" href="%s">Preview Resource</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	$messages['person'] = array(
	  0 => '', // Unused. Messages start at index 1.
	  1 => sprintf( __('Person updated. <a href="%s">View Person</a>'), esc_url( get_permalink($post_ID) ) ),
	  2 => __('Custom field updated.'),
	  3 => __('Custom field deleted.'),
	  4 => __('Person updated.'),
	  /* translators: %s: date and time of the revision */
	  5 => isset($_GET['revision']) ? sprintf( __('Person restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	  6 => sprintf( __('Person published. <a href="%s">View Person</a>'), esc_url( get_permalink($post_ID) ) ),
	  7 => __('Person saved.'),
	  8 => sprintf( __('Person submitted. <a target="_blank" href="%s">Preview Person</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  9 => sprintf( __('Person scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Person</a>'),
	    // translators: Publish box date format, see http://php.net/date
	    date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	  10 => sprintf( __('Person draft updated. <a target="_blank" href="%s">Preview Person</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}

function add_help_text($contextual_help, $screen_id, $screen) { 
  //$contextual_help .= var_dump($screen); // use this to help determine $screen->id
  if ('student_project' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a Game:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct class number such as 152B, or 157A.') . '</li>' .
      '<li>' . __('Specify the correct team mebers of the Game.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the Student Project to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-book' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of Game blah blah blah.') . '</p>' ;
  }

  if ('book' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a book:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct genre such as Mystery, or Historic.') . '</li>' .
      '<li>' . __('Specify the correct writer of the book.  Remember that the Author module refers to you, the author of this book review.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the book review to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-book' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of books blah blah blah.') . '</p>' ;
  }
  return $contextual_help;
}
