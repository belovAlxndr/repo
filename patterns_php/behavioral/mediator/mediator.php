<?php
interface ChatRoomMediator 
{
        public function showMessage(User $user, string $message);
}

class ChatRoom implements ChatRoomMediator
{
        public function showMessage(User $user, string $message)
            {
                        $time = date('M d, y H:i');
                                $sender = $user->getName();

                                        echo $time . '[' . $sender . ']:' . $message;
                                            }
}

class User {
        protected $name;
            protected $chatMediator;

                public function __construct(string $name, ChatRoomMediator $chatMediator) {
                            $this->name = $name;
                                    $this->chatMediator = $chatMediator;
                                        }

                                            public function getName() {
                                                        return $this->name;
                                                            }

                                                                public function send($message) {
                                                                            $this->chatMediator->showMessage($this, $message);
                                                                                }
}

$mediator = new ChatRoom();

$john = new User('John Doe', $mediator);
$jane = new User('Jane Doe', $mediator);

$john->send('Привет!');
$jane->send('Привет!');
