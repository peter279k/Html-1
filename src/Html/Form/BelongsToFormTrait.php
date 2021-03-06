<?php

namespace Runn\Html\Form;

/**
 * Trait for elements that belong to some form
 *
 * Trait BelongsToFormTrait
 * @package Runn\Html\Form
 *
 * @implements \Runn\Html\Form\BelongsToFormInterface
 */
trait BelongsToFormTrait
    /*implements BelongsToFormInterface*/
{

    /** @var \Runn\Html\Form\Form|null  */
    protected $form = null;

    /**
     * @return bool
     */
    public function belongsToForm(): bool
    {
        return null !== $this->form;
    }

    /**
     * @param \Runn\Html\Form\Form|null $form
     * @return $this
     */
    public function setForm(?Form $form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return \Runn\Html\Form\Form|null
     */
    public function getForm(): ?Form
    {
        return $this->form;
    }

}
