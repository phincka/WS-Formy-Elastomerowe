<?php
function faqNav() {
  global $post; 
  $title = $post->post_title;
  $parent = get_post($post->post_parent);


  $children = get_pages( array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'parent' => $post->ID,

    'sort_column' => 'date', 
    'sort_order' => 'desc', 
  ));
  
  
  if (!$children):
    $children = get_pages( array(
      'post_type' => 'page',
      'post_status' => 'publish',
      'parent' => $parent->ID,

      'sort_column' => 'date', 
      'sort_order' => 'desc', 
    ));
  ?>
    <a class="faq1__nav__single" href="<?= get_permalink($parent->ID) ?>">
      <span class="faq1__nav__single--icon"><?= get_svg(get_the_post_thumbnail_url($parent->ID)) ?></span>
      <h3 class="faq1__nav__single--title txt-22">Pytania ogólne</h3>
    </a>
  <?php else: ?>
    <a class="faq1__nav__single active-item" href="<?= get_permalink($post->ID) ?>">
      <span class="faq1__nav__single--icon"><?= get_svg(get_the_post_thumbnail_url($post->ID)) ?></span>
      <h3 class="faq1__nav__single--title txt-22">Pytania ogólne</h3>
    </a>
  <?php endif;

    
  foreach ($children as $child):
  if ($child->post_title == $title):
  ?>
    <a class="faq1__nav__single active-item" href="<?= get_permalink($child->ID) ?>">
      <span class="faq1__nav__single--icon"><?= get_svg(get_the_post_thumbnail_url($child->ID)) ?></span>
      <h3 class="faq1__nav__single--title txt-22"><?= $child->post_title ?></h3>
    </a>
  <?php else: ?>
    <a class="faq1__nav__single" href="<?= get_permalink($child->ID) ?>">
      <span class="faq1__nav__single--icon"><?= get_svg(get_the_post_thumbnail_url($child->ID)) ?></span>
      <h3 class="faq1__nav__single--title txt-22"><?= $child->post_title ?></h3>
    </a>
  <?php endif; ?>
  <?php endforeach; 
}
