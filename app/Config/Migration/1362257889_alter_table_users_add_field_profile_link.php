<?php
class AlterTableUsersAddFieldProfileLink extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
            'create_field'=>array(
                'users'=>array(
                    'profile_link'=>array(
                        'type' => 'string',
                        'null' => true,
                        'default' => NULL,
                        'after'=>'profile_image_url'
                    )
                )
            )
		),
		'down' => array(
            'drop_field'=>array(
                'users'=>array(
                    'profile_link'
                )
            )
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
