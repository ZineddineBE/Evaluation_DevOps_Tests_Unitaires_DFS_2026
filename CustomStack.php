<?php

namespace EvaluationSampleCode;

use Exception;

class StackCantBeEmptyException extends Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}

class CustomStack
{
    private array $list = [];

    public function count(): int
    {
        return count($this->list);
    }

    public function push(int $value): void
    {
        $this->list[] = $value;
    }

    public function pop(): int
    {
        if ($this->count() === 0) {
            throw new StackCantBeEmptyException("Can't call Pop on an empty stack.");
        }

        return array_pop($this->list);
    }
}