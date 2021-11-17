<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

?>

<h2>
	<?php echo JText::_('COM_DAVIDIX_ANIMATEDBOOK_BOOKS_VIEW_BOOK_TITLE'); ?>: <i><?php echo $this->item->type; ?></i>
	<span class="pull-right" style="font-weight:300; font-size:15px;">[<a href="<?php echo JRoute::_('index.php?option=com_davidix_animatedbook&task=book.edit&id=' . (int) $this->item->id); ?>"><?php echo JText::_('JACTION_EDIT') ?></a>]</span>
</h2>

<table class="table table-striped">
	<tbody>
			<tr>
				<td>Type</td>
				<td><?php echo $this->escape($this->item->type); ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo $this->escape($this->item->name); ?></td>
			</tr>
			<tr>
				<td>Author</td>
				<td><?php echo $this->escape($this->item->author); ?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?php echo $this->escape($this->item->description); ?></td>
			</tr>
			<tr>
				<td>Short_description</td>
				<td><?php echo $this->escape($this->item->short_description); ?></td>
			</tr>
			<tr>
				<td>Ribbon_text</td>
				<td><?php echo $this->escape($this->item->ribbon_text); ?></td>
			</tr>
			<tr>
				<td>Ribbon_color</td>
				<td><?php echo $this->escape($this->item->ribbon_color); ?></td>
			</tr>
			<tr>
				<td>Cover_top_color</td>
				<td><?php echo $this->escape($this->item->cover_top_color); ?></td>
			</tr>
			<tr>
				<td>Cover_buttom_color</td>
				<td><?php echo $this->escape($this->item->cover_buttom_color); ?></td>
			</tr>
			<tr>
				<td>Cover_image</td>
				<td><?php echo $this->escape($this->item->cover_image); ?></td>
			</tr>
			<tr>
				<td>Book_direction</td>
				<td><?php echo $this->escape($this->item->book_direction); ?></td>
			</tr>
			<tr>
				<td>Link1</td>
				<td><?php echo $this->escape($this->item->link1); ?></td>
			</tr>
			<tr>
				<td>Link1_src</td>
				<td><?php echo $this->escape($this->item->link1_src); ?></td>
			</tr>
			<tr>
				<td>Link2</td>
				<td><?php echo $this->escape($this->item->link2); ?></td>
			</tr>
			<tr>
				<td>Link2_src</td>
				<td><?php echo $this->escape($this->item->link2_src); ?></td>
			</tr>
		<tr>
			<td>ID</td>
			<td><?php echo $this->escape($this->item->id); ?></td>
		</tr>
	</tbody>
</table>
<p><a href="index.php?option=com_davidix_animatedbook&view=books"><?php echo JText::_('JPREVIOUS'); ?></a></p>