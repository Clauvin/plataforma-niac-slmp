<?php
App::uses(
    'AppModel', 'Model',
    'BlowfishPasswordHasher', 'Controller/Component/Auth'
);
/**
 * Funcionario Model
 *
 */
class Funcionario extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'pessoas_idPessoa';

    public $belongsTo = array(
        'Pessoa' => array(
            'className' => 'Pessoa',
            'foreignKey' => 'pessoas_idPessoa'
        )
    );

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'O nome de usuário deve ser preenchido.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Este nome de usuário já existe!'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'O campo \'senha\' deve ser preenchido.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'area' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'O campo \'área\' deve ser preenchido.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        $this->data[$this->alias]['dataEntrada'] = mktime();
        return true;
    }

}
