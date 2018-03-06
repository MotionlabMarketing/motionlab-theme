<?php
/**
 * MENUS BLOCKS – INTERNAL -------------------------------------
 * This block adds a customisable menu block into the page
 * where the user can link to the internal scroll to points.
 *
 * @author Joe Curran
 * @created 27 Feb 2018
 *
 * @version 1.00
 */

$block['buttons'] = get_sub_field($current . '_buttons');
?>

<section id="<?=$block['custom_id']?>" class="menu-internal relative clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="links <?=$block['button_alignment']?>">

        <?php foreach ($block['buttons'] as $button):?>

            <a href="<?=$button['button_button_link']['url']?>" <?=($button['button_button_link']['target'] ? 'target="'.$button['button_button_link']['target'].'"' : '')?> class="btn btn-medium <?=$button['button_system_text_colours']?> <?=$button['button_system_background_colours']?>"><?=$button['button_button_link']['title']?></a>

        <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>