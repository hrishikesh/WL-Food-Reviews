<?php
/**
 * @var $this view
 */
?>


        <div class="row-fluid">
            <div class="span12">

                <p>
                    <?php if(isset($login_url) && !empty($login_url)) :?>
                    <?php echo $this->Html->link($this->Html->image('google-Icon.png',array('width'=>170,"height"=>60)), $login_url, array('escape'=>false,'class'=>'btn btn-large btn-custom','div'=>true));?>
                    <?php endif; ?>
                </p>

            </div>
        </div>


