<?php

namespace Chernoff\DatatableBundle\Templating;

use Chernoff\Datatable\TemplatingInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * Class Templating
 * @package Chernoff\DatatableBundle\Templating
 */
class Templating implements TemplatingInterface
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var array
     */
    private $templates;

    /**
     * @param EngineInterface $templating
     * @param array $templates
     */
    public function __construct(EngineInterface $templating, array $templates)
    {
        $this->templating = $templating;
        $this->templates = $templates;
    }

    /**
     * @param array $params
     * @return string
     */
    public function html(array $params)
    {
        return $this->templating->render($this->templates['html'], $params);
    }

    /**
     * @param array $params
     * @return string
     */
    public function js(array $params)
    {
        return $this->templating->render($this->templates['js'], $params);
    }
}
