<?php

namespace Market\Form;

use \Zend\Form\Form;
use \Zend\Form\Element\Select;
use \Zend\Form\Element\Text;
use \Zend\Form\Element\Submit;

class PostForm extends Form
{

    private $categories;

    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    public function buildForm()
    {
        $this->setAttribute("method", "POST");

        $category = new Select("Category");
        $category->setLabel("Category")
                ->setValueOptions(array_combine($this->categories, $this->categories));

        $title = new Text("Title");
        $title->setLabel("Title")
                ->setAttributes(array(
                    'size' => 25,
                    'maxLenght' => 128,
        ));
        
        $submit = new Submit('Submit');
        $submit->setAttribute('value', 'Post');
        
        $this->add($category)
                ->add($title)
                ->add($submit);
    }

}
