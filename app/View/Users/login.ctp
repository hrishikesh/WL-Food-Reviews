<?php
/**
 * @var $this view
 */
?>
    <div class='form-signin'>
        <?php echo $this->Session->flash('auth'); ?>
        <?php /*echo $this->Form->create('User'); */?><!--

            <h2 class="form-signin-heading"><?php /*echo __('Please sign in'); */?></h2>
            <?php /*echo $this->Form->input('username', array('class'=>'input-block-level', 'placeholder'=>'Username'));
            echo $this->Form->input('password', array('class'=>'input-block-level', 'placeholder'=>'Password'));
            */?>

        --><?php /*echo $this->Form->submit(__('Login'), array('class'=>'btn btn-large btn-primary'));
            echo $this->Form->end();
        */?>

        <!--<a href="<?php /*echo $login_url;*/?>"><div class='btn btn-large btn-primary'>Google</div></a>-->
        <?php if(isset($login_url) && !empty($login_url)) :?>
            <?php echo $this->Html->link(__('Google Login'), $login_url, array('class'=>'btn btn-large btn-primary','div'=>true));?>
        <?php endif; ?>

    </div>
