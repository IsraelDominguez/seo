<?php
// This is global bootstrap for autoloading

require __DIR__.'/../vendor/autoload.php';

/**
 * Returns data directory.
 *
 * @param string $path Relative path inside data dir.
 * @return string
 */
function dataDir($path = '')
{
    return __DIR__.'/_data/'.ltrim($path, '/');
}

/**
 * Gets an object's property, even if it is public, protected or private. Use this function only for testing purposes.
 *
 * @param object $obj
 * @param string $name Property name.
 * @return mixed Property value.
 * @throws Exception If property does not exists.
 * @throws InvalidArgumentException
 */
function getProperty($obj, $name)
{
    if (!is_object($obj)) {
        throw new InvalidArgumentException('You must provide a valid object instance.');
    }
    if (!is_string($name) || !$name) {
        throw new InvalidArgumentException('You must provide a valid property name.');
    }
    $class = new \ReflectionClass($obj);
    if (!$class->hasProperty($name)) {
        throw new Exception('Property does not exists in provided object.');
    }
    $property = $class->getProperty($name);
    $property->setAccessible(true);
    return $property->getValue($obj);
}

/**
 * Gets an object's property, even if it is public, protected or private. Use this function only for testing purposes.
 *
 * @param string $class_name
 * @param string $property_name
 * @return mixed Property value.
 * @throws Exception If property does not exists.
 * @throws InvalidArgumentException
 */
function getStaticProperty($class_name, $property_name)
{
    if (!is_string($class_name) || !$class_name) {
        throw new InvalidArgumentException('You must provide a valid property name.');
    }
    if (!is_string($property_name) || !$property_name) {
        throw new InvalidArgumentException('You must provide a valid property name.');
    }
    $class = new \ReflectionClass($class_name);
    if (!$class->hasProperty($property_name)) {
        throw new Exception('Static property does not exists in '.$class_name);
    }
    $property = $class->getProperty($property_name);
    $property->setAccessible(true);
    return $property->getValue();
}

/**
 * Calls a public, private or protected method. Use this function only for testing purposes.
 *
 * @param object $obj
 * @param string $name Property name.
 * @param array $args Method arguments.
 * @return mixed Property value.
 * @throws Exception If property does not exists.
 * @throws InvalidArgumentException
 */
function callMethod($obj, $name, array $args = [])
{
    if (!is_object($obj)) {
        throw new InvalidArgumentException('You must provide a valid object instance.');
    }
    if (!is_string($name) || !$name) {
        throw new InvalidArgumentException('You must provide a valid method name.');
    }

    $class = new \ReflectionClass($obj);
    if (!$class->hasMethod($name)) {
        throw new Exception('Method does not exists in provided object.');
    }
    $method = $class->getMethod($name);
    $method->setAccessible(true);
    return $method->invokeArgs($obj, $args);
}