<div class="feedbackResponses form">
<?php echo $this->Form->create('FeedbackResponse'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Feedback Response'); ?></legend>
	<?php
		echo $this->Form->input('feedback_id');
		echo $this->Form->input('meal_item_id');
		echo $this->Form->input('response_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Feedback Responses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Items'), array('controller' => 'meal_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Item'), array('controller' => 'meal_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
