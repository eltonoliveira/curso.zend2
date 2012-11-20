<?php

namespace LivrariaAdmin\Form;

use Zend\Form\Form;

class Categoria extends Form
{
	
	public function __construct($nome = NULL)
	{
		parent::__construct('categoria');

		self::setAttribute('method', 'post');

		self::setInputFilter(new CategoriaFilter());

		self::add(array(
			'name' => 'id',
			'attributes' => array(
				'type' => 'hidden'
			)
		));

		self::add(array(
			'name' => 'nome',
			'options' => array(
				'type' 	=> 'text',
				'label' => 'Nome'
			),
			'attributes' => array(
				'id' 		  => 'nome',
				'placeholder' => 'Entre com o nome'
			)
		));

		self::add(array(
			'name' => 'submit',
			'type' => 'Zend\Form\Element\Submit',
			'attributes' => array(
				'value' => 'Salvar',
				'class' => 'btn-success'
			)
		));
	}

}