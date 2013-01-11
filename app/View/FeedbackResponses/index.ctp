<div class="feedbackResponses index">
	<h2><?php echo __('Feedback Responses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('feedback_id'); ?></th>
			<th><?php echo $this->Paginator->sort('meal_item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('response_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($feedbackResponses as $feedbackResponse): ?>
	<tr>
		<td><?php echo h($feedbackResponse['FeedbackResponse']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($feedbackResponse['Feedback']['comment'], array('controller' => 'feedbacks', 'action' => 'view', $feedbackResponse['Feedback']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($feedbackResponse['MealItem']['name'], array('controller' => 'meal_items', 'action' => 'view', $feedbackResponse['MealItem']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($feedbackResponse['Response']['name'], array('controller' => 'responses', 'action' => 'view', $feedbackResponse['Response']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $feedbackResponse['FeedbackResponse']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feedbackResponse['FeedbackResponse']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feedbackResponse['FeedbackResponse']['id']), null, __('Are you sure you want to delete # %s?', $feedbackResponse['FeedbackResponse']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Feedback Response'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Items'), array('controller' => 'meal_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Item'), array('controller' => 'meal_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
