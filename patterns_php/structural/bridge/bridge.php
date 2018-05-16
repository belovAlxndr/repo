<?php
interface WebPage
{
    public function __construct(Theme $theme);
    public function getContent();
}

class About implements WebPage
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return "Страница с информацией в " . $this->theme->getColor();
    }
}

class Careers implements WebPage
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return "Страница карьеры в " . $this->theme->getColor();
    }
}

interface Theme
{
    public function getColor();
}


class DarkTheme implements Theme
{
    public function getColor()
    {
        return 'темной теме';
    }
}

class LightTheme implements Theme
{
    public function getColor()
    {
        return 'светлой теме';
    }
}

class AquaTheme implements Theme
{
    public function getColor()
    {
        return 'голубой теме';
    }
}

$darkTheme = new DarkTheme();

$about = new About($darkTheme);
$careers = new Careers($darkTheme);

echo $about->getContent(); // "Страница информации в темной теме";
echo $careers->getContent(); // "Страница карьеры в темной теме";
