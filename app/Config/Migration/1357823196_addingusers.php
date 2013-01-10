<?php
class AddingUsers extends CakeMigration {

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
            'create_table' => array(
               'users'=>array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
                    'googleid' => array('type' => 'string', 'null' => true, 'default' => NULL),
                    'username' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
                    'password' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
                    'role_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
                    'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
                    'profile_image_url' => array('type' => 'string', 'null' => true, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1)
                    ),
                    'tableParameters' => array('collate' => 'utf8_bin', 'engine' => 'MyISAM'),
               ),
            )
		),
		'down' => array(
            'drop_table' => array(
                'users'
            ),
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
