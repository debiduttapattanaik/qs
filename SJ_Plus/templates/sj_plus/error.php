<?php
/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
?>

<html  lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
		
	<link rel="stylesheet" href="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/css/error.css" type="text/css" />	
</head>
<body>
	
	
	<div class="wrapall">
		<div class="wrap-inner">
			<div class="contener">
				<div class="block-left">
					<img class="img_404" src="<?php echo JURI::base() . 'templates/' . JFactory::getApplication()->getTemplate();?>/images/404/404.png" alt="" />
				</div>
				<div class="block-main">
					<div class="logo">
						<a href="index.php">
							<img class="img_logo" src="<?php echo JURI::base() . 'templates/' . JFactory::getApplication()->getTemplate();?>/images/styling/red/logo.png" alt="" />
						</a>
						<div class="mess-code"><?php echo $this->error->getMessage(); ?></div>
						<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
					</div>
					<div class="firts-block">
						<div class="lW" style="width:293px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:268px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:242px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:217px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:191px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:166px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:140px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:115px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:89px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:64px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:38px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:13px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div>
						<ul>
							<li><span>1</span><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
							<li><span>2</span><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
							<li><span>3</span><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
							<li><span>4</span><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
							<li><span>5</span><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
							<li><span>6</span><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
						</ul>
					</div>
					<div class="second-block">
						<p class="title">
							<?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?>
							<a class="btn" href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>">
								<?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?>
							</a>
						</p>
							
						<span><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>.</span>
						<div id="techinfo">
						<span><?php echo $this->error->getMessage(); ?></span>
						<span>
							<?php if ($this->debug) :
								echo $this->renderBacktrace();
							endif; ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
		
</body>
</html>
