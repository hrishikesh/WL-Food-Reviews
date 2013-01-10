<?php
class AddingMealItems extends CakeMigration {

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
                'meal_items' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
                    'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50,'after' => 'id'),
                    'meal_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'after' => 'name'),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'after' => 'meal_id'),
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
                'meal_items'
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
        $MealItem = $this->generateModel('MealItem');
        $MealItem->saveAll(array(
            array('name'=>'Breakfast','meal_id'=> 1),
            array('name'=>'Dry Vegetable','meal_id'=> 2),
            array('name'=>'Gravy Vegetable','meal_id'=> 2),
            array('name'=>'Daal','meal_id'=> 2),
            array('name'=>'Rice','meal_id'=> 2),
            array('name'=>'Roti','meal_id'=> 2),
            array('name'=>'Salad','meal_id'=> 2),
            array('name'=>'Non-veg','meal_id'=> 2),
        ));
		return true;
	}
}
