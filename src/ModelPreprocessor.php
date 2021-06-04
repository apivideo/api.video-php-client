<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use ApiVideo\Client\Model\ModelInterface;

final class ModelPreprocessor
{
    public static function execute(ModelInterface $model)
    {
        $definition = $model::getDefinition();

        foreach ($definition->openAPITypes as $propertyName => $type) {
            $setter = $definition->setters[$propertyName];
            $getter = $definition->getters[$propertyName];

            if ('\\' === substr($type, 0, 1) && false !== strpos($type, 'ApiVideo') && class_exists($type)) {
                $model->$setter(new $type($model->$getter()));

                continue;
            }

            if ('\\' === substr($type, 0, 1) && '[]' === substr($type, -2)) {
                if (is_null($model->$getter())) {
                    continue;
                }

                $objectClassName = substr($type, 0, -2);
                $items = [];
                foreach ($model->$getter() as $data) {
                    $items[] = new $objectClassName($data);
                }
                $model->$setter($items);

                continue;
            }
        }
    }
}
