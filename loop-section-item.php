<?php
/**
 * Template for displaying curriculum tab of single course v2.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  4.1.5
 */

defined( 'ABSPATH' ) || exit();

// PARAM: section_item, course_item, can_view_item, user, course_id is required.
// $course_item : as lesson, quiz....
/**
 * @var LP_Model_User_Can_View_Course_Item $can_view_item
 * @var LP_Course_Item $course_item
 */
if ( empty( $section_item ) || empty( $course_item ) || empty( $can_view_item ) || empty( $course_id ) ) {
	return;
}

$post_type  = str_replace( 'lp_', '', $course_item->get_post_type() );
$course     = learn_press_get_course( $course_id );
$section_id = LP_Section_DB::getInstance()->get_section_id_by_item_id( $section_item['ID'] );
$section    = $course->get_sections( 'object', $section_id );

?>
<li class="<?php echo implode( ' ', $course_item->get_class_v2( $course_id, $section_item['ID'], $can_view_item ) ); ?>" data-id="<?php echo esc_attr( $section_item['ID'] ); ?>">
<div class="custom-container-lesson">
    <div class="custom-block-1">
      <div class="custom-img-container">
    	    <?php echo get_the_post_thumbnail( $course_item->get_id(), 'thumbnail' ) ?>
      </div>
      <div class="custom-link-container">
        <a class="<?php echo $post_type; ?>-title course-item-title button-load-item" href="<?php echo $course_item->get_permalink(); ?> ">
          <?php
            do_action( 'learn-press/before-section-loop-item-title', $course_item, $section_item, $course );
           echo '<p>'.$course_item->get_title().'</p>';
            ?>
        </a>
      </div>
    </div>
    <div class="custom-block-2">
      <?php
      do_action( 'learn-press/after-section-loop-item-title', $course_item, $section_item, $course );
      do_action( 'learn-press/after-section-loop-item', $course_item, $section_item, $course );
      ?>
    </div>
</div>
</li>
