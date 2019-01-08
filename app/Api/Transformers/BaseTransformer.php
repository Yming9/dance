<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/1/11
 * Time: 17:42
 */

namespace App\Api\Transformers;


use League\Fractal\TransformerAbstract;

class BaseTransformer extends TransformerAbstract
{
    public $action = null;

    /**
     * Transformer constructor.
     */
    public function __construct($action = null)
    {
        $this->action = $action;
    }

    public function transform($item)
    {
        $commonActionName = 'common';
        $commonTransRes = [];
        if(method_exists($this, $commonActionName))
            $commonTransRes = $this->$commonActionName($item);

        $actionName = camel_case('trans_' . (string)$this->action);
        $transRes = $this->$actionName($item);

        return array_merge($commonTransRes, $transRes);
    }

    public function item($data, $transformerAbstract, $resourceKey = NULL)
    {
        return $transformerAbstract->transform($data);
    }

    public function collection($data, $transformerAbstract, $resourceKey = NULL)
    {
        return $data->map(function ($item) use ($transformerAbstract) {
            return $transformerAbstract->transform($item);
        })->values()->toArray();
    }

    public function setArgu($name, $value)
    {
        $this->$name = $value;

        return $this;
    }
}