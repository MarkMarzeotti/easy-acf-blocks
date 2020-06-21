<?php
/**
 * Testimonial Block.
 * 
 * Title:       Testimonial
 * Description: A custom testimonial block.
 * Category:    widgets
 * Icon:        admin-comments
 * Keywords:    client, testimony
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * 
 * @param array      $block      Block settings and attributes.
 * @param string     $content    Would be child blocks if they were possible.
 * @param bool       $is_preview If the view is in preview mode.
 * @param int|string $post_id    The Post ID this block is displayed on.
 *
 * @link       https://markmarzeotti.com
 * @since      1.0.0
 *
 * @package    Easy_ACF_Blocks
 * @subpackage Easy_ACF_Blocks/testimonial
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'eab-testimonial-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'eab-testimonial';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text   = get_field( 'testimonial' ) ?: 'Your testimonial here...';
$author = get_field( 'author' ) ?: 'Author name';
$role   = get_field( 'role' ) ?: 'Author role';

?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <blockquote class="eab-testimonial-blockquote">
        <p class="eab-testimonial-text"><?php echo $text; ?></p>
        <span class="eab-testimonial-author"><?php echo $author; ?></span>
        <span class="eab-testimonial-role"><?php echo $role; ?></span>
    </blockquote>
</div>