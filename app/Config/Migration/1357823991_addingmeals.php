<?php
class AddingMeals extends CakeMigration {

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
                'meals' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
                    'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50,'after' => 'id'),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'after' => 'name'),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'after' => 'created'),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('collate' => 'utf8_bin', 'engine' => 'MyISAM'),
                ),
            )
		),
		'down' => array(
            'drop_table' => array(
                'meals'
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
        $Meal = $this->generateModel('Meal');
        $Meal->saveAll(array(
            array('name'=>'Breakfast'),
            array('name'=>'Lunch')
        ));
		return true;
	}
}
