<?php
/**
 * Tip Block.
 * 
 * Title:       Tip
 * Description: A custom tip block.
 * Category:    widgets
 * Icon:        lightbulb
 * Keywords:    help
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
 * @subpackage Easy_ACF_Blocks/tip
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'eab-tip-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'eab-tip';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field( 'heading' ) ?: 'A helpful tip:';
$text    = get_field( 'tip' ) ?: 'Your tip here...';

?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <span class="eab-tip-heading"><?php echo $heading; ?></span>
    <p class="eab-tip-text"><?php echo $text; ?></p>
</div>