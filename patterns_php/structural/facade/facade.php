class Computer
{
    public function getElectricShock()
    {
        echo "Ай!";
    }

    public function makeSound()
    {
        echo "Бип-бип!";
    }

    public function showLoadingScreen()
    {
        echo "Загрузка..";
    }

    public function bam()
    {
        echo "Готов к использованию!";
    }

    public function closeEverything()
    {
        echo "Буп-буп-буп-бззз!";
    }

    public function sooth()
    {
        echo "Zzzzz";
    }

    public function pullCurrent()
    {
        echo "Аах!";
    }
}

class ComputerFacade
{
    protected $computer;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function turnOn()
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff()
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}

$computer = new ComputerFacade(new Computer());
$computer->turnOn(); // Ай! Бип-бип! Загрузка.. Готов к использованию!
$computer->turnOff(); // Буп-буп-буп-бззз! Аах! Zzzzz
