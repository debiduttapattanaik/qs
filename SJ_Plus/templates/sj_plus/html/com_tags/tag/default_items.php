<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
// includes placehold
$yt_temp = JFactory::getApplication()->getTemplate();
include (JPATH_BASE . '/templates/'.$yt_temp.'/includes/placehold.php');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

// Get the user object.
$user = JFactory::getUser();

// Begin: dungnv added
global $leadingFlag;
$doc = JFactory::getDocument();
$app = JFactory::getApplication();
$templateParams = JFactory::getApplication()->getTemplate(true)->params;
// End: dungnv added

// Check if user is allowed to add/edit based on tags permissions.
// Do we really have to make it so people can see unpublished tags???
$canEdit = $user->authorise('core.edit', 'com_tags');
$canCreate = $user->authorise('core.create', 'com_tags');
$canEditState = $user->authorise('core.edit.state', 'com_tags');
$items = $this->items;
$n = count($this->items);

?>

<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="form-inline">
	<?php if ( $this->params->get('filter_field') !== '0' || $this->params->get('show_pagination_limit')) :?>
	<fieldset class="filters btn-toolbar">
		<?php if ($this->params->get('filter_field') != 'hide') :?>
			<div class="btn-group">
				<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="inputbox" onchange="document.adminForm.submit();" title="<?php echo JText::_('COM_TAGS_FILTER_SEARCH_DESC'); ?>" placeholder="<?php echo JText::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>" />
			</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_pagination_limit')) : ?>
			<div class="btn-group pull-right">
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
		<?php endif; ?>

		<input type="hidden" name="filter_order" value="" />
		<input type="hidden" name="filter_order_Dir" value="" />
		<input type="hidden" name="limitstart" value="" />
		<input type="hidden" name="task" value="" />
		<div class="clearfix"></div>
	</fieldset>
	<?php endif; ?>

	<?php if ($this->items == false || $n == 0) : ?>
		<p> <?php echo JText::_('COM_TAGS_NO_ITEMS'); ?></p>
	<?php else : ?>

	<ul class="blank items-row">
		<?php foreach ($items as $i => $item) : ?>
				<li class="item">
					
					<a style="display:none;" href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
						<?php echo $this->escape($item->core_title); ?>
					</a>

					<?php $images  = json_decode($item->core_images);?>
					<?php if ($this->params->get('tag_list_show_item_image', 1) == 1 && !empty($images->image_intro)) :?>
						
							<?php
							$imgfloat = (empty($images->float_intro)) ?  'left' :$images->float_intro; 
							$imgW = (isset($leadingFlag) && $leadingFlag)?$templateParams->get('leading_width', '300'):$templateParams->get('intro_width', '200');
							$imgH = (isset($leadingFlag) && $leadingFlag)?$templateParams->get('leading_height', '300'):$templateParams->get('intro_height', '200');
							$imgsrc = YTTemplateUtils::resize($images->image_intro, $imgW, $imgH, array($templateParams->get('thumbnail_background', '#ffffff')));
							
							//Create placeholder items images
							$src = $images->image_intro;
							if (file_exists(JPATH_BASE . '/' . $src)) {								
								$thumb_img = '<img src="'.$imgsrc.'"'.$imgattr.' alt="'.$images->image_intro_alt.'" />';
								$full_img =  JURI::base().'/'.htmlspecialchars($images->image_intro);
							} else if ($is_placehold) {					
								$thumb_img = yt_placehold($placehold_size['listing']);
								$full_img  = 'http://placehold.it/'.$placehold_size['article'].'/969696';
							}	
							
							?>
							<figure class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image" style="min-width:<?php echo $imgW ?>px;min-height:<?php echo $imgH ?>px">
								<a  data-rel="prettyPhoto"   title="<?php echo htmlspecialchars($images->image_intro_alt); ?>" href="<?php echo $full_img; ?>" >
									<?php echo $thumb_img; ?>
								</a>
							</figure>
						
					<?php endif; ?>
					
					<div class="article-text">
						<div class="page-header">
							<h2>
								<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
									<?php echo $this->escape($item->core_title); ?>
								</a>
							</h2>
						</div>
						<div class="item-headinfo">
							<dl class="article-info muted">
								<dt></dt>
								<dd>
									<div class="create">
									<?php echo JText::sprintf( JHTML::_('date',$item->tag_date, 'M d Y')); ?>
									</div>
								</dd>
								
							</dl>
						</div>
						
						<?php if ($this->params->get('all_tags_show_tag_descripion', 1)) : ?>
							<?php echo JHtml::_('string.truncate', $item->core_body, $this->params->get('tag_list_item_maximum_characters')); ?>
							<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" class="readmore"> 
								<?php echo JText::_('READ MORE'); ?>	
							</a>
						<?php endif; ?>
						
						
					</div>
		
				</li>
			
		<?php endforeach; ?>
	</ul>

	
</form>

<?php endif; ?>
