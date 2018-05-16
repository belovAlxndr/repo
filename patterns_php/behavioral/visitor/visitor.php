interface Animal
{
    public function accept(AnimalOperation $operation);
}

interface AnimalOperation
{
    public function visitMonkey(Monkey $monkey);
    public function visitLion(Lion $lion);
    public function visitDolphin(Dolphin $dolphin);
}

class Monkey implements Animal
{
    public function shout()
    {
        echo 'У-у-а-а!';
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitMonkey($this);
    }
}

class Lion implements Animal
{
    public function roar()
    {
        echo 'рррр!';
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitLion($this);
    }
}

class Dolphin implements Animal
{
    public function speak()
    {
        echo '*звуки дельфина*!'; // Я понятия не имею как описать их звуки
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitDolphin($this);
    }
}

class Speak implements AnimalOperation
{
    public function visitMonkey(Monkey $monkey)
    {
        $monkey->shout();
    }

    public function visitLion(Lion $lion)
    {
        $lion->roar();
    }

    public function visitDolphin(Dolphin $dolphin)
    {
        $dolphin->speak();
    }
}

class Jump implements AnimalOperation
{
    public function visitMonkey(Monkey $monkey)
    {
        echo 'Прыгает на 20 футов!';
    }

    public function visitLion(Lion $lion)
    {
        echo 'Прыгает на 7 футов!';
    }

    public function visitDolphin(Dolphin $dolphin)
    {
        echo 'Появился над водой и исчез!';
    }
}

$monkey = new Monkey();
$lion = new Lion();
$dolphin = new Dolphin();

$speak = new Speak();

$monkey->accept($speak);    // У-у-а-а!    
$lion->accept($speak);      // Рррр!
$dolphin->accept($speak);   // *звуки дельфина*!

$jump = new Jump();

$monkey->accept($speak);   // У-у-а-а!
$monkey->accept($jump);    // Прыгает на 20 футов!

$lion->accept($speak);     // Рррр!
$lion->accept($jump);      // Прыгает на 7 футов!

$dolphin->accept($speak);  // *звуки дельфинов*!
$dolphin->accept($jump);   // Появился над водой и исчез
