<?php
abstract class Builder
{
    final public function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    abstract public function test();
    abstract public function lint();
    abstract public function assemble();
    abstract public function deploy();
}

class AndroidBuilder extends Builder
{
    public function test()
    {
        echo 'Запуск Android тестов';
    }

    public function lint()
    {
        echo 'Копирование Android кода';
    }

    public function assemble()
    {
        echo 'Android сборка';
    }

    public function deploy()
    {
        echo 'Развертывание сборки на сервере';
    }
}

class IosBuilder extends Builder
{
    public function test()
    {
        echo 'Запуск iOS тестов';
    }

    public function lint()
    {
        echo 'Копирование iOS кода';
    }

    public function assemble()
    {
        echo 'iOS сборка';
    }

    public function deploy()
    {
        echo 'Развертывание сборки на сервере';
    }
}

$androidBuilder = new AndroidBuilder();
$androidBuilder->build();
$iosBuilder = new IosBuilder();
$iosBuilder->build();
