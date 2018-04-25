<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_related
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php'); ?>
<div class="tagsrelated <?php echo $moduleclass_sfx; ?>">
<?php if ($list) : ?>

	<?php $lastElement = end($list);?>

	<?php foreach ($list as $i => $item) : ?>
	<?php 
		// get images
		$img = json_decode($item->core_images);
		$intro_image = $img->image_intro;
		$full_image  = $img->image_fulltext
	?>
		<div>

			<div class="uk-panel">
				<?php if ($image_intro) : ?>
					<div class="uk-align-left uk-margin-remove-bottom uk-margin-small-right">
						<div class="uk-background-cover" style="background-image: url(<?php echo $intro_image ;?>); height: 50px; width: 50px;"></div>
					</div>
				<?php endif; ?>
				<div>
					<div style="margin-bottom: 5px;">
						<?php $item->route = new JHelperRoute; ?>
						<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
							<?php if (!empty($item->core_title)) :
								echo htmlspecialchars($item->core_title, ENT_COMPAT, 'UTF-8');
							endif; ?>
						</a>
					</div>
					<?php if ($created_date) : ?>
						<div class="uk-text-muted uk-text-small">
							<?php echo 'Datum objave: ' . JHtml::_('date', $item->core_created_time, JText::_('DATE_FORMAT_LC3'));	?>
						</div>
					<?php endif; ?>
					<?php if ($published_date) : ?>
						<div class="uk-text-muted uk-text-small">
							<?php echo 'Datum objave: ' . JHtml::_('date', $item->core_publish_up, JText::_('DATE_FORMAT_LC3'));	?>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>

		<?php if($item !== $lastElement) : ?>
			<hr>
		<?php endif; ?>

	<?php endforeach; ?>

<?php else : ?>
	<span><?php echo JText::_('MOD_TAGS_RELATED_NO_MATCHING_TAGS'); ?></span>
<?php endif; ?>
</div>
