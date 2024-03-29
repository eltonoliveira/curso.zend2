<?php

namespace LivrariaAdmin\Form;

use Zend\InputFilter\InputFilter;

class CategoriaFilter extends InputFilter
{
	public function __construct()
	{
		
		self::add(array(
			'name' => 'nome',
			'required' => TRUE,
			'filters' => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim')
			),
			'validators' => array(array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array('isEmpty' => 'O nome não pode estar em branco.')
					)
				)
			)
		));
		
	}


}