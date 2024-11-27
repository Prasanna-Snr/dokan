<?php 
class User{
    public string $fullname;
    public string $username;
    public string $email;
    public string $password;
    public string $confirm;

    public function __construct(string $fullname, string $username, string $email, string $password, string $confirm){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirm = $confirm;
    }
}
?>