<?php

namespace Wulkanowy;

class SimpleListGenerator implements GeneratorInterface
{
    private $counties;

    public function __construct(array $counties)
    {
        $this->counties = $counties;
    }

    public function save(string $filename) : bool
    {
        $items = [];

        foreach ($this->counties as $name) {
            $items[] = (new StringFormatter($name[1]))
                    ->latinize()
                    ->lowercase()
                    ->removeDashes()
                    ->removeSpaces()
                    ->get();
        }

        return file_put_contents($filename, implode(PHP_EOL, $items));
    }
}