<?php

namespace Runn\Html\Form;

use Runn\Core\Std;
use Runn\Html\HasAttributesInterface;
use Runn\Html\HasAttributesTrait;
use Runn\Html\HasTitleInterface;
use Runn\Html\HasTitleTrait;

/**
 * Abstract form button class
 *
 * Class Button
 * @package Runn\Html\Form
 */
abstract class Button implements FormElementInterface, HasAttributesInterface, HasTitleInterface
{

    use FormElementTrait, HasAttributesTrait, HasTitleTrait;

    public const DEFAULT_TYPE = 'submit';

    /**
     * @param string|null $type
     * @param string|null $title
     */
    public function __construct(string $type = null, string $title = null)
    {
        $this->setType($type ?? static::DEFAULT_TYPE);
        if (null !== $title) {
            $this->setTitle($title);
        }
    }

    /**
     * @param string $type
     * @return \Runn\Html\Form\Button $this
     */
    public function setType(string $type)
    {
        /* set type to first place! */
        $this->attributes = (new Std(['type' => $type]))->merge($this->attributes ?: []);
        $this->attributes->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->getAttributes()->type ?? null;
    }

    protected function escape(string $val): string
    {
        return htmlspecialchars($val, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

}
