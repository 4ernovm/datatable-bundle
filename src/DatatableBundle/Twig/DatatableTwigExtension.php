<?php

namespace Chernoff\DatatableBundle\Twig;

use Chernoff\Datatable\Manager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class DatatableTwigExtension
 * @package Chernoff\DatatableBundle\Twig
 */
class DatatableTwigExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return "chernoff_datatable_twig_extension";
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new TwigFunction("datatable_render", [$this, "datatableRender"], ["is_safe" => ["all"]]),
            new TwigFunction("datatable_render_js", [$this, "datatableRenderJs"], ["is_safe" => ["all"]]),
            new TwigFunction("datatable_attr", [$this, "datatableAttribute"], ["is_safe" => ["all"]]),
            new TwigFunction("datatable_html_attr", [$this, "datatableHtmlAttribute"], ["is_safe" => ["all"]]),
        );
    }

    /**
     * @param Manager $datatable
     * @return string
     */
    public function datatableRender(Manager $datatable)
    {
        return $datatable->render();
    }

    /**
     * @return string
     */
    public function datatableRenderJs()
    {
        return Manager::getJS();
    }

    /**
     * @param $attribute
     * @return int|string
     */
    public function datatableAttribute($attribute)
    {
        switch (true) {
            case (is_bool($attribute)):
                $result = ($attribute) ? 'true' : 'false';
                break;

            case (is_numeric($attribute)):
                $result = $attribute;
                break;

            case (is_array($attribute)):
                $result = json_encode($attribute);
                break;

            default:
                $result = "\"{$attribute}\"";
        }

        return $result;
    }

    /**
     * @param array $attributes
     * @return string
     */
    public function datatableHtmlAttribute(array $attributes)
    {
        $output = "";

        if ($attributes) {
            foreach ($attributes as $attr => $value) {
                if ($attr && $value) {
                    $output .= "{$attr}=\"{$value}\" ";
                }
            }
        }

        return $output;
    }
}
