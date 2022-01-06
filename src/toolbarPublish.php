<?php

/**
 *  @package Toolbar Publish
 * Plugin Name: Toolbar Publish
 * Description: Adds a "Publish" or "Update" button to the toolbar for easy access while working on long posts.
 * Version: 1.0.2
 * Author: Dalton McGee
 * Twitter: DaltonMcGee16
 * License: MIT
 * Text Domain: toolbar_publish
 */


add_action('admin_bar_menu', function ($wp_admin_bar) {
  // $post gets the post object of the page you're on.
  global $post;
  // $pagenow get the uri after the '/wp-content/' section,
  // e.g. post.php or edit.php.
  global $pagenow;

  // Checking to make sure that we're in fact on a post page,
  // and that it isn't the post listing page.
  if (!!$post && $pagenow !== "edit.php") {
    $label = $post->post_status === "publish" ? "Update" : "Publish";

    // Sets the html and the id attribute of the item to place in the
    // menu toolbar.
    $args = [
      'title' => "<label for='publish'>$label</label>",
      'id' => 'publish'
    ];

    // Adds it to the menu toolbar.
    $wp_admin_bar->add_menu($args);
  }

  // It's best practice to be explicit and provide a return statement
  // even if it's not doing anything. It lets anyone looking here that you
  // didn't just stop writing the function.
  return;
});


// This just makes sure out CSS and JS are added to the DOM.
wp_enqueue_style('toolbar_publish_styles', plugins_url('/toolbar_publish/styles.css'));
wp_enqueue_script('toolbar_publish_scripts', plugins_url('/toolbar_publish/scripts.js'));
