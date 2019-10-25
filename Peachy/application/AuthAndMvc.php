<?php

class authAndMvc
{

    const LOGGED = "LOGGED";
    
    const AUTH = "AUTH";
    
    const GUEST = "GUEST";
    
    private $lifetime_cookie = 3600;
    
    private $status;
    
    private $protected_directory = "admin";
    
    public function __construct()
    {
        
        $this->authent_session();
        if(!$this->getLogged() && !isset($_SESSION['state']))
        {
            $this->setStatus();
        }     
        
        if(!$this->getLogged() && $this->check_protected_directory()):        
            $this->setStatus("AUTH");
            //Redirect vers page de login
            //$this->redirect("../");
        else:        
            $this->setStatus();
        endif;
    }
    
    /**
     * Vérifie que la session existe
     * @return boolean
     */
    public function getLogged()
    {
        $is_logged = (isset($_SESSION['state']))?password_verify($this::LOGGED, $_SESSION['state']):false;
        return $is_logged;
        
    }
    
    public function getStatus()
    {
        $status_avaliable = ['GUEST', 'LOGGED', 'AUTH'];
        $status = "GUEST";
        
        foreach ($status_avaliable as $value) {
            if(password_verify($value, $_SESSION['state']))
            {
                return $value;
            }
        }
        
        return $status;        
    }
    
    
    public function setStatus(string $status = null) 
    {
        switch ($status) {
            case "AUTH":
                $this->status = $this::AUTH;
            break;
            case "LOGGED":
                $this->status = $this::LOGGED;
                break;
            default:
                $this->status = $this::GUEST;
            break;
        }            
       
        $_SESSION['role'] = $this->status;
        $_SESSION['state'] = password_hash($this->status, PASSWORD_BCRYPT); 
        return ;
    }
    
    public function redirect($url, $statusCode = 301)
    {
        header('Location: '.$url, true, $statusCode);
        die();
    }
    
    private function check_protected_directory(){
        $pattern = '/\/'.$this->protected_directory.'./';
        $subject = $_SERVER["REQUEST_URI"];
        $checked = preg_match($pattern, $subject);
        return ($checked > 0);
    }
    
    private function authent_session() {
        if(session_status() == PHP_SESSION_NONE){
            session_start([
                'cookie_lifetime' => $this->lifetime_cookie,
            ]);
        }
    }
}

