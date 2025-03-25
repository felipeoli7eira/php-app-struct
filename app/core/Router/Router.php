<?php

declare(strict_types=1);

namespace Core\Router;

use Core\Container\Container;
use DomainException;
use ReflectionMethod;

class Router
{
    private string $handler;
    private string $action;

    public function __construct(private readonly Container $container) {}

    public function run(array $routes): void
    {
        if (! sizeof($routes)) {
            return;
        }

        foreach ($routes as $route => $handler) {
            if ($route === $_SERVER['REQUEST_URI']) {

                $classHandler = $handler[0];
                $action = $handler[1];

                $this->handler = $classHandler;
                $this->action = $action;

                $this->callHandler();
            }
        }
    }

    private function callHandler(): mixed
    {
        if (! class_exists($this->handler)) {
            throw new DomainException('Handler not found: ' . $this->handler);
        }

        if (! method_exists($this->handler, $this->action)) {
            throw new DomainException('Action not found: ' . $this->handler . ' ' . $this->action);
        }

        $handler = $this->container->get($this->handler);
        $reflectionMethod = new ReflectionMethod($handler, $this->action);

        if (! $reflectionMethod->isPublic()) {
            throw new DomainException('Action not public: ' . $this->handler . ' ' . $this->action);
        }

        $methodParameters = $reflectionMethod->getParameters();

        if (! sizeof($methodParameters)) {
            return $handler->{$this->action}();
        }

        return $handler->{$this->action}(
            ...$this->container->resolveMethodParameters($reflectionMethod)
        );
    }
}
