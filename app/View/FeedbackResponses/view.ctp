<div class="feedbackResponses view">
<h2><?php  echo __('Feedback Response'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($feedbackResponse['FeedbackResponse']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feedback'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedbackResponse['Feedback']['comment'], array('controller' => 'feedbacks', 'action' => 'view', $feedbackResponse['Feedback']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meal Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedbackResponse['MealItem']['name'], array('controller' => 'meal_items', 'action' => 'view', $feedbackResponse['MealItem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedbackResponse['Response']['name'], array('controller' => 'responses', 'action' => 'view', $feedbackResponse['Response']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Feedback Response'), array('action' => 'edit', $feedbackResponse['FeedbackResponse']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Feedback Response'), array('action' => 'delete', $feedbackResponse['FeedbackResponse']['id']), null, __('Are you sure you want to delete # %s?', $feedbackResponse['FeedbackResponse']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedback Responses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback Response'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Items'), array('controller' => 'meal_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Item'), array('controller' => 'meal_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
