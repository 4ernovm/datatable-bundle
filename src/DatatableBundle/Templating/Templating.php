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
     * @var string
     */
    private $html;

    /**
     * @var string
     */
    private $js;

    /**
     * @param EngineInterface $templating
     * @param string $html
     * @param string $js
     */
    public function __construct(EngineInterface $templating, $html, $js)
    {
        $this->templating = $templating;
        $this->html = $html;
        $this->js = $js;
    }

    /**
     * @param array $params
     * @return string
     */
    public function html(array $params)
    {
        return $this->templating->render($this->html, $params);
    }

    /**
     * @param array $params
     * @return string
     */
    public function js(array $params)
    {
        return $this->templating->render($this->js, $params);
    }
}
