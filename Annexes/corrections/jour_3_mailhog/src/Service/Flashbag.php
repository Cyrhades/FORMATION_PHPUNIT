<?php

namespace App\Service;

class FlashBag
{
    public function add(string $type, string $message): void
    {
        if(!isset($_SESSION['flashbag'][$type])) {
            $_SESSION['flashbag'][$type] = [];
        }
        $_SESSION['flashbag'][$type][] = $message;
    }

    public function get(string $type): array
    {
        if(isset($_SESSION['flashbag'][$type])) {
            $data =  $_SESSION['flashbag'][$type];
            unset($_SESSION['flashbag'][$type]);
            return $data;
        }
        return [];
    }

    public function getAll(): array
    {
        if(isset($_SESSION['flashbag'])) {
            $data = $_SESSION['flashbag'];
            unset($_SESSION['flashbag']);
            return $data;
        }
        return [];
    }

    public function success(string $message): void
    {
        $this->add('success', $message);
    }

    public function error(string $message): void
    {
        $this->add('error', $message);
    }

    public function info(string $message): void
    {
        $this->add('info', $message);
    }

    public function warning(string $message): void
    {
        $this->add('warning', $message);
    }
}
