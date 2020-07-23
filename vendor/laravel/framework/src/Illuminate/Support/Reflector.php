<?php

namespace Illuminate\Support;

use ReflectionClass;
use ReflectionNamedType;

class Reflector
{
    /**
     * Get the class name of the given parameter's type, if possible.
     *
     * @param  \ReflectionParameter  $parameter
     * @return string|null
     */
    public static function getParameterClassName($parameter)
    {
        $type = $parameter->getType();

        if (! $type instanceof ReflectionNamedType || $type->isBuiltin()) {
            return;
        }

        $name = $type->getName();

<<<<<<< HEAD
        if (! is_null($class = $parameter->getDeclaringClass())) {
            if ($name === 'self') {
                return $class->getName();
            }

            if ($name === 'parent' && $parent = $class->getParentClass()) {
                return $parent->getName();
            }
=======
        if ($name === 'self') {
            return $parameter->getDeclaringClass()->getName();
>>>>>>> ca06f3736ca28c7c52a74d0ff9524246336f6d76
        }

        return $name;
    }

    /**
     * Determine if the parameter's type is a subclass of the given type.
     *
     * @param  \ReflectionParameter  $parameter
     * @param  string  $className
     * @return bool
     */
    public static function isParameterSubclassOf($parameter, $className)
    {
        $paramClassName = static::getParameterClassName($parameter);

        return ($paramClassName && class_exists($paramClassName))
            ? (new ReflectionClass($paramClassName))->isSubclassOf($className)
            : false;
    }
}
