<?php

function skcp_add( $comment ) : void {
  if (function_exists('cp_alterPoints') && $comment->user_id >= 0) {
    cp_alterPoints($comment->user_id, get_option('cp_comment_points'));
    cp_log('schreikasten',$comment->user_id,get_option('cp_comment_points'),$comment->id);
  }
}
add_action('sk_add', 'skcp_add');

function skcp_delete( $comment ) : void {
  if (function_exists('cp_alterPoints') && $comment->user_id >= 0) {
    cp_alterPoints($comment->user_id, -get_option('cp_del_comment_points'));
    cp_log('schreikasten',$comment->user_id, -get_option('cp_del_comment_points'), $comment->id);
  }
}
add_action('sk_delete', 'skcp_delete');

function skcp_points( $points, $comment ) {
  if (function_exists('cp_displayPoints') && $comment->user_id >= 0) {
    return sprintf(" (%s)", cp_displayPoints($comment->user_id, true, true));
  }

  return null;
}
add_filter('sk_points', 'skcp_points', 1, 2);
