<?php
function subPageNav() {
  global $post; 
  $title = $post->post_title;
  $parent = get_post($post->post_parent);


  $children = get_pages( array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'parent' => $parent->ID
  ));
  
  if ($post->post_type == 'accreditations') {
    $args = [
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template_accreditations.php'
    ];
    $page = get_posts( $args )[0];
    $accredPage = get_post($page);

    $title = $accredPage->post_title;

    $children = get_pages( array(
      'post_type' => 'page',
      'post_status' => 'publish',
      'parent' => $accredPage->post_parent
    ));
  }
  
  if (!$children) {
    $children = get_pages( array(
      'post_type' => 'page',
      'post_status' => 'publish',
      'parent' => 0
    ));
  }
  
?>
  <nav class="asideNav">
    <?php 
      foreach ($children as $child):
      if ($child->post_title == $title):
    ?>
      <a class="asideNav--single active-item txt-18" href="<?= get_permalink($child->ID) ?>"><span><?= $child->post_title ?></span></a>
    <?php else: ?>
      <a class="asideNav--single txt-18" href="<?= get_permalink($child->ID) ?>"><span><?= $child->post_title ?></span></a>
    <?php endif; ?>
    <?php endforeach; ?>
  </nav>
<?php 
}
