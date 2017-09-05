<?php

namespace Runn\tests\Html\Form\Form;

use Runn\Html\Form\Fields\PasswordField;
use Runn\Html\Form\Fields\TextField;
use Runn\Html\Form\Form;
use Runn\Html\Form\ElementsGroup;

class FormTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \BadMethodCallException
     */
    public function testSetParent1()
    {
        $group = new class extends ElementsGroup {};
        $form = new Form;
        $form->setParent($group);
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testSetParent2()
    {
        $group = new class extends ElementsGroup {};
        $form = new Form;
        $group->part = $form;
    }

    public function testRender()
    {
        $form =
            (new Form(['login' => new TextField, 'p' => new PasswordField('pass')]))
            ->setAttribute('action', 'index.php');
        $form->repeat = new PasswordField;

        $this->assertSame(
            str_replace("\n", PHP_EOL, "<form action=\"index.php\">\n    <input type=\"text\" name=\"login\">\n    <input type=\"password\" name=\"pass\">\n    <input type=\"password\" name=\"repeat\">\n</form>"),
            $form->render()
        );
    }

}