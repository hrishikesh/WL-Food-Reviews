<?php
/**
 * @var View $this
  */
?>
<style>
    .tab-content td.selected-response, .tab-content td.selected-response:hover {
        background-color: #EEEEEE !important;
    }
</style>
<script>
$(document).ready(function(){
   $("#breakfast table tr").live('click',function(){
       $('#breakfast #response_id').val($(this).attr('response'));
       $('#breakfast table tr').find("td div.select-marker").html('');
       $(this).find("td div.select-marker").html('<img src="/img/correct.png">');
   });

   $('#lunch table tr td').live('click', function(){
        if($(this).hasClass('selected-response')) {
            $(this).removeClass('selected-response');
            $(this).parent().find('td input.meal_item').val('');
            $(this).parent().find('td input.response').val('');
        } else {
            $(this).parent().find('td').removeClass('selected-response');
            $(this).addClass('selected-response');
            $(this).parent().find('td input.meal_item').val($(this).parent().attr('meal_item'));
            $(this).parent().find('td input.response').val($(this).attr('response'));
        }
/*        var response_data = $('#lunch #response_data').val();
        var response = $(this).parent().attr('meal_item') + '-' + $(this).attr('response');
        if(response_data!='') {
            response_data += ',' + response;

        } else {
            response_data = response;
        }
       $('#lunch #response_data').val(response_data);*/
   });
});
</script>
<div class="feedbackResponses tab-content">
    <div id="breakfast" class="tab-pane fade active in">

        <?php /*echo "<pre>"; print_r($responses); echo "</pre>"*/?>
       <table class="table table-hover">
        <?php foreach($responses as $response): ?>
            <tr style="cursor: pointer;" response="<?php echo $response['Response']['id'] ?>">
                <td><?php echo $this->Html->image("smiley/{$response['Response']['image']}")?></td>
                <td style="vertical-align: middle"><?php echo $response['Response']['text'] ?></td>
                <td style="vertical-align: middle"><div class="select-marker"></div></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <?php
            echo $this->Form->hidden('response_id', array('value'=>'','name'=>'data[FeedbackResponse][response_id]'));
            echo $this->Form->hidden('meal_item_id', array('value'=> 1, 'name'=>'data[FeedbackResponse][meal_item_id]'));
            echo $this->Form->hidden('meal_id', array('value'=>1,  'name'=>'data[FeedbackResponse][meal_id]'));
            echo $this->Form->textarea('comment');
            echo $this->Form->end(__('Submit'));
        ?>
    </div>

    <div id="lunch" class="tab-pane">

        <?php echo $this->Form->create('FeedbackResponse'); ?>
        <table class="table">
            <?php $counter=0; foreach($mealItems as $mealItemId => $mealItem): ?>
            <tr meal_item="<?php echo $mealItemId;?>">
                <td><?php echo $mealItem; ?></td>
                <?php foreach($responses as $response): ?>
                    <td response="<?php echo $response['Response']['id'] ?>">
                        <div style="width: 48px; margin: 0 auto;cursor: pointer;"><?php echo $this->Html->image("smiley/{$response['Response']['image']}")?></div>
                    </td>
                <?php endforeach; ?>
                <td>
                    <?php echo $this->Form->hidden('meal_item_id_'.$counter , array('value'=>'','name'=>'data[FeedbackResponse][response_data]['.$counter.'][meal_item_id]', 'class'=>'meal_item'));?>
                    <?php echo $this->Form->hidden('response_id_'.$counter , array('value'=>'','name'=>'data[FeedbackResponse][response_data]['.$counter.'][response_id]', 'class'=>'response'));?>
                </td>
            </tr>
            <?php $counter++; endforeach; ?>
        </table>

        <?php
            echo $this->Form->textarea('comment');
            echo $this->Form->hidden('meal_id', array('value'=>2));
            echo $this->Form->end(__('Submit'));
        ?>
    </div>
</div>
<!--<div class="actions">
	<h3><?php /*echo __('Actions'); */?></h3>
	<ul>

		<li><?php /*echo $this->Html->link(__('List Feedback Responses'), array('action' => 'index')); */?></li>
		<li><?php /*echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); */?> </li>
		<li><?php /*echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); */?> </li>
		<li><?php /*echo $this->Html->link(__('List Meal Items'), array('controller' => 'meal_items', 'action' => 'index')); */?> </li>
		<li><?php /*echo $this->Html->link(__('New Meal Item'), array('controller' => 'meal_items', 'action' => 'add')); */?> </li>
		<li><?php /*echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); */?> </li>
		<li><?php /*echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); */?> </li>
	</ul>
</div>-->
