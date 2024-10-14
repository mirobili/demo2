<?php

namespace App\Framework\_deleteme;

class ViewModel
{
    private array $data = [];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data ?? [];
    }

    public function get($key): array
    {
        return $this->data[$key] ?? [];
    }

    /**
     * @param array $data
     */
    public function set(string $key, array $data): void
    {
        $this->data[$key] = $data;
    }

    public function addData(string $key, array $data): void
    {
        $this->data[$key][] = $data;
    }




}