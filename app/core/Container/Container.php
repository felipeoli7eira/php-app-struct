<?php

declare(strict_types=1);

namespace Core\Container;

use Closure;
use ReflectionClass;
use ReflectionMethod;

class Container
{
    private array $bindings = [];

    public function bind(string $key, mixed $value)
    {
        $this->bindings[$key] = $value;
    }

    public function mapDependenciesFrom(string|array $bindings): void
    {
        if (is_array($bindings) && sizeof($bindings)) {
            foreach ($bindings as $key => $value) {
                $this->bind($key, $value);
            }

            return;
        }

        $filePath = ROOT_PATH . DIRECTORY_SEPARATOR . $bindings;

        if (file_exists($filePath) && is_file($filePath) && is_readable($filePath)) {
            $this->bindings = require $filePath;
        }
    }

    public function get(string $key)
    {
        if (array_key_exists($key, $this->bindings) && $this->bindings[$key] instanceof Closure) {
            return $this->bindings[$key]();
        }

        if (class_exists($key)) {
            return $this->resolveClassInstance($key);
        }

        return $this->bindings[$key];
    }

    private function resolveClassInstance(string $object)
    {
        $reflection = new ReflectionClass($object);

        $constructor = $reflection->getConstructor();

        if (is_null($constructor)) {
            return new $object();
        }

        return $reflection->newInstanceArgs($this->resolveMethodParameters($constructor));
    }

    public function resolveMethodParameters(ReflectionMethod $method): array
    {
        $resolvedDependencies = array_map(
            fn($param) => $this->get($param->getType()->getName()),
            $method->getParameters()
        );

        return $resolvedDependencies;
    }
}
