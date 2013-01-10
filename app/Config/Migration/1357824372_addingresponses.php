<?php
class AddingResponses extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = 'Adding Responses Table';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
            'create_table' => array(
                'responses' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
                    'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50,'after' => 'id'),
                    'text' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50,'after' => 'name'),
                    'image' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'after' => 'text'),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'after' => 'image'),
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
                'responses'
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
        $Response = $this->generateModel('Response');
        $Response->saveAll(array(
            array('name'=>'Awesome','text'=>'Awesome... Loved it!!','image'=>'awesome.png'),
            array('name'=>'Good','text'=>'It was good','image'=>'awesome.png'),
            array('name'=>'Average','text'=>'I &apos; m not sure if I liked it..','image'=>'awesome.png'),
            array('name'=>'Bad','text'=>'Mom.... Take me home...','image'=>'awesome.png'),
        ));
		return true;
	}
}
