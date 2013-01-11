<?php
/**
 * @var $this view
 */
?>
    <div class='container-narrow sign-in'>

        <div class="row-fluid">
            <div class="span12">

            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <h3>Sign in with...</h3>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <!--<div style="margin: 0 auto;width:120px;">-->
                <p>
                    <?php if(isset($login_url) && !empty($login_url)) :?>
                    <?php echo $this->Html->link($this->Html->image('google-Icon.png',array('width'=>170,"height"=>60)), $login_url, array('escape'=>false,'class'=>'btn btn-large btn-custom','div'=>true));?>
                    <?php endif; ?>
                </p>
                <!--</div>-->
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <?php echo $this->Session->flash('auth'); ?>
            </div>
        </div>
    </div>
