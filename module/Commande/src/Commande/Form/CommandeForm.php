<?php
namespace Commande\Form;

use Zend\Form\Form;

class CommandeForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('commande');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nom',
            ),
        ));
        $this->add(array(
            'name' => 'prix',
            'attributes' => array(
                'type'  => 'int',
            ),
            'options' => array(
                'label' => 'Prix',
            ),
        ));
        $this->add(array(
            'name' => 'etat',
            'attributes' => array(
                'type'  => 'boolean',
            ),
            'options' => array(
                'label' => 'Etat',
                
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}