abstract class Account
{
    protected $successor;
    protected $balance;

    public function setNext(Account $account)
    {
        $this->successor = $account;
    }

    public function pay(float $amountToPay)
    {
        if ($this->canPay($amountToPay)) {
            echo sprintf('Оплата %s, используя %s' . PHP_EOL, $amountToPay, get_called_class());
        } elseif ($this->successor) {
            echo sprintf('Нельзя заплатить, используя %s. Обработка ..' . PHP_EOL, get_called_class());
            $this->successor->pay($amountToPay);
        } else {
            throw new Exception('Ни на одном из аккаунтов нет необходимого количества денег');
        }
    }

    public function canPay($amount): bool
    {
        return $this->balance >= $amount;
    }
}

class Bank extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

class Paypal extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

class Bitcoin extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

$bank = new Bank(100);          // Банк с балансом 100
$paypal = new Paypal(200);      // Paypal с балансом 200
$bitcoin = new Bitcoin(300);    // Bitcoin с балансом 300

$bank->setNext($paypal);
$paypal->setNext($bitcoin);

// Попробуем оплатить через банк
$bank->pay(259);
