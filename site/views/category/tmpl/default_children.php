<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

$class = ' class="first"';
if (count($this->children[$this->category->id]) > 0 && $this->maxLevel != 0) :
?>
<ul>
<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
	<?php
	if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) :
	if (!isset($this->children[$this->category->id][$id + 1]))
	{
		$class = ' class="last"';
	}
	?>
	<li<?php echo $class; ?>>
		<?php $class = ''; ?>
			<span class="item-title"><a href="<?php echo JRoute::_(Davidix_animatedbookHelperRoute::getCategoryRoute($child->id));?>">
				<?php echo $this->escape($child->title); ?></a>
			</span>

			<?php if ($this->params->get('show_subcat_desc') == 1) :?>
			<?php if ($child->description) : ?>
				<div class="category-desc">
					<?php echo JHtml::_('content.prepare', $child->description, '', 'com_davidix_animatedbook.category'); ?>
				</div>
			<?php endif; ?>
            <?php endif; ?>

            <?php if ($this->params->get('show_cat_num_links') == 1) :?>
			<dl class="weblink-count"><dt>
				<?php echo JText::_('COM_DAVIDIX_ANIMATEDBOOK_NUM'); ?></dt>
				<dd><?php echo $child->numitems; ?></dd>
			</dl>
		<?php endif; ?>

			<?php if (count($child->getChildren()) > 0 ) :
				$this->children[$child->id] = $child->getChildren();
				$this->category = $child;
				$this->maxLevel--;
				echo $this->loadTemplate('children');
				$this->category = $child->getParent();
				$this->maxLevel++;
			endif; ?>
		</li>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul>
<?php endif;
