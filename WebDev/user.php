<?php
/**
 * Created by PhpStorm.
 * User: Laganovskis
 * Date: 11/9/2016
 * Time: 7:26 PM
 */
class User{

    private $connection;

    function __construct($dbconnection)
    {
        $this->connection = $dbconnection;
    }

    public function register($fullname,$email,$password)
    {
        try{
            $pass = password_hash($password,PASSWORD_DEFAULT);
            $stmt = $this->connection
                ->prepare("INSERT INTO users(fullname,email,password) VALUES(:fullname,:email,:password)");
            $stmt->bindParam(':fullname',$fullname);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            return $stmt;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function login($email,$password)
    {
        //check the database for entered email and password
        $stmt = $this->connection
            ->prepare("SELECT * FROM users WHERE email=:email or password=:password");
        $stmt->execute(['email'=>$email,'password'=>$password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount()>0)
        {
            //for now I am verifying without hash because there is a test user in the database and he's password is not hashed
            //if(password_verify($password,$user['password']))
            if($password === $user['password'])
            {
                //set user session
                $_SESSION['user_id'] = $user['id'];
                return true;
            }
        }
        else{
            //give error message
            return false;
        }
    }
    public function isloggedin()
    {
        return (isset($_SESSION['user_id']));
    }
    //not necessary
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_id']);
        return true;
    }


}