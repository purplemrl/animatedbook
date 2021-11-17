<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

// necessary libraries
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'book.cancel' || document.formvalidator.isValid(document.id('book-form')))
		{
			Joomla.submitform(task, document.getElementById('book-form'));
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_davidix_animatedbook&id=' . (int)$this->item->id); ?>" method="post" name="adminForm" id="book-form" class="form-validate">
	
	<div class="form-inline form-inline-header">
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('name'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('name'); ?></div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
		</div>
	</div>

	<div class="form-horizontal">
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', 'Book', $this->item->id, true); ?>
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid form-horizontal-desktop">			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('type'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('type'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('author'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('author'); ?></div>
			</div>	
	<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('short_description'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('short_description'); ?></div>
			</div>			
		
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('book_direction'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('book_direction'); ?></div>
			</div>				
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('description'); ?></div>
			</div>			
				
			
				</div>
			</div>
			<div class="span3">
				<?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		
			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'Cover', JText::_('COM_DAVIDIX_ANIMATEDBOOK_BOOKS_COVER AND RIBBON_DESC', true)); ?>
		<div class="row-fluid">
			<div class="span6">
			
						<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('ribbon_text'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('ribbon_text'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('ribbon_color'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('ribbon_color'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('cover_top_color'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('cover_top_color'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('cover_buttom_color'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('cover_buttom_color'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('cover_image'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('cover_image'); ?></div>
			</div>	
				
				</div>
			</div>
			
			
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		
		
		
		
		
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'links', JText::_('COM_DAVIDIX_ANIMATEDBOOK_BOOKS_LINKS_DESC', true)); ?>
		<div class="row-fluid">
			<div class="span6">
			
				<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('link1'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('link1'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('link1_src'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('link1_src'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('link2'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('link2'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('link2_src'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('link2_src'); ?></div>
			</div>
				</div>
			</div>
			
			
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		
		<?php echo JLayoutHelper::render('joomla.edit.params', $this); ?>
				
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'acl', 'ACL Configuration', true); ?>		
		<div class="row-fluid">
			<div class="span12">
				<fieldset class="panelform">
					<legend><?php echo $this->item->type ?></legend>
					<?php echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
					<?php echo JHtml::_('sliders.panel', JText::_('ACL Configuration'), 'access-rules'); ?>
					<?php echo $this->form->getInput('rules'); ?>
					<?php echo JHtml::_('sliders.end'); ?>
				</fieldset>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		
	<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>