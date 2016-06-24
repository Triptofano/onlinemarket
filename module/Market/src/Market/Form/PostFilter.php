<?php

namespace Market\Form;

use \Zend\InputFilter\InputFilter;
use \Zend\InputFilter\Input;
use \Zend\Validator\Regex;

class PostFilter extends InputFilter
{

    private $categories;

    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    public function buildFilter()
    {
        $category = new Input("Category");
        $category->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags')
                ->attachByName('StringToLower');

        $category->getValidatorChain()
                ->attachByName('InArray', array('haystack' => $this->categories));

        $title = new Input("Title");
        $title->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags');

        $titleRegEx = new Regex(array('pattern' => '/^[a-zA-Z0-9 ]*$/'));
        $titleRegEx->setMessage('Tittle should only contain numbers, lettes or spaces');

        $title->getValidatorChain()
                ->attach($titleRegEx)
                ->attachByName('StringLength', array('min' => 1, 'max' => 128));

        $this->add($category)
                ->add($title);
    }

}
