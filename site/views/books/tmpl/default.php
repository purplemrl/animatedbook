<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

// necessary libraries
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

// sort ordering and direction
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$archived	= $this->state->get('filter.published') == 2 ? true : false;
$trashed	= $this->state->get('filter.published') == -2 ? true : false;
$user = JFactory::getUser();

$count=0;
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base() . 'components/com_davidix_animatedbook/css/book.css');
$document->addStyleSheet(JUri::base() . 'components/com_davidix_animatedbook/css/book2.css');
?>
<style>
.row2 {
	background-color: #e4e4e4;
}
</style>

<h2><?php echo JText::_('COM_DAVIDIX_ANIMATEDBOOK_BOOKS_VIEW_BOOKS_TITLE'); ?></h2>
<form action="<?php JRoute::_('index.php?option=com_mythings&view=mythings'); ?>" method="post" name="adminForm" id="adminForm">

		<?php foreach ($this->items as $i => $item) :
		$canEdit	= $this->user->authorise('core.edit',       'com_davidix_animatedbook'.'.book.'.$item->id);
		$canEditOwn	= $this->user->authorise('core.edit.own',   'com_davidix_animatedbook'.'.book.'.$item->id) && $item->created_by == $this->user->id;
		$canDelete	= $this->user->authorise('core.delete',       'com_davidix_animatedbook'.'.book.'.$item->id);
		$canCheckin	= $this->user->authorise('core.manage',     'com_checkin') || $item->checked_out == $this->user->id || $item->checked_out == 0;
		$canChange	= $this->user->authorise('core.edit.state', 'com_davidix_animatedbook'.'.book.'.$item->id) && $canCheckin;
		$count++;
		$ssclass='ribbon'.$count;
		$style ='.ribbon'.$count .'{ background:'. $item->ribbon_color .'; 
	color: #fff;
	display: block;
	font-size: 1.3em;
	position: absolute;
	top: 11px;
	right: 1px;
	width: 40px;
	height: 20px;
	line-height: 20px;
	letter-spacing: 0.15em; 
	text-align: center;
	-webkit-transform: rotateZ(45deg) translateZ(1px);
	-moz-transform: rotateZ(45deg) translateZ(1px);
	transform: rotateZ(45deg) translateZ(1px);
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	backface-visibility: hidden;
	z-index: 10;
}

ribbon'.$count.'::before,
ribbon'.$count.'::after{
	position: absolute;
	top: -20px;
	width: 0;
	height: 0;
	border-bottom: 20px solid '.$item->ribbon_color. ';
	border-top: 20px solid transparent;}   
	' .' 
	';
	
$document->addStyleDeclaration($style);
		
		?>
		


		
		
		
		
	<figure class="book">

							<!-- Front -->

							<ul class="hardcover_front">
								<li>
								
									<div class="coverDesign yellow"  
									style="    background-color: #f1c40f;
    background-image: -webkit-linear-gradient(top, <?php echo ($item->cover_top_color);  ?> 58%, <?php echo ($item->cover_buttom_color);  ?> 0%);
    background-image: -moz-linear-gradient(top, <?php echo ($item->cover_top_color);  ?> 58%, <?php echo ($item->cover_buttom_color);  ?> 0%);
    background-image: linear-gradient(top, <?php echo ($item->cover_top_color);  ?> 58%, <?php echo ($item->cover_buttom_color);  ?> 0%);"
									>
									
									
								<?php	if( $item->cover_image != "" ){ ?>
								<img class="imgx" src="<?php echo $this->escape($item->cover_image); ?>" alt="" width="100%" height="100%">
								<?php } ?>
										<?php if( $item->ribbon_text != "" ) { ?>
										
										<span  class=<?php if($item->ribbon_color !="")echo $ssclass;
else echo ribbon										?> ><?php echo ($item->ribbon_text);  ?></span>
										<?php } ?>
										
									<h1><?php echo $this->escape($item->name) ; ?></h1>
										
										<p><?php echo($item->short_description) ; ?></p>
									</div>
								</li>
								<li></li>
							</ul>

							<!-- Pages -->

							<ul class="page">
								<li></li>
								<li>
								
								<?php if ($item->link1 !="") 
								{?>
									<a class="btnc" href="<?php echo ($item->link1_src); ?>"><?php echo ($item->link1); ?></a>
								<?php } ?>
								<?php if($item->link2 != ""){ ?>
									<a class="btnc" href="<?php echo ($item->link2_src); ?>"><?php echo ($item->link2); ?></a>
								<?php } ?>
								</li>
								<li></li>
								<li></li>
								<li></li>
							</ul>

							<!-- Back -->

							<ul class="hardcover_back">
								<li></li>
								<li></li>
							</ul>
							<ul class="book_spine">
								<li></li>
								<li></li>
							</ul>
							<figcaption>
								<h1><?php echo($item->name);?></h1>
								<span><?php echo($item->author);?></span>
								<p><?php echo($item->description);?></p>
							</figcaption>
						</figure>
	
	
	<?php endforeach ?>
	
	
		<input type="hidden" name="task" value=" " />
		<input type="hidden" name="boxchecked" value="0" />
		<!-- Sortierkriterien -->
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	
</form>

