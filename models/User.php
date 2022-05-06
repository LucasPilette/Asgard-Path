<?php

require_once(dirname(__FILE__) . '/../config/PDO/PDO_init.php');

class User {

    private int $_id;
    private string $_lastname;
    private string $_firstname;
    private string $_email;
    private string $_login;
    private string $_password;
    private int $_id_roles;
    private string $_registered_at;
    public ?string $_validated_at;
    private object $_pdo;

            /**
     * Création de la méthode magique construct visant à créer un utilisateur
     * @param int $id
     * @param string $lastname
     * @param string $firstname
     * @param string $email
     * @param string $login
     * @param string $password
     * @param string $_registered_at;
     * @param string $_validated_at;
     * @param int $_id_roles
     * @param object $pdo
     */

    public function __construct(string $lastname = '', string $firstname = '', string $email = '', string $login = '', string $password = '', int $_id_roles = 0, string $_registered_at = '', ?string $_validated_at = NULL){
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_email = $email;
        $this->_login = $login;
        $this->_password = $password;
        $this->_id_roles = $_id_roles;
        $this->_registered_at = $_registered_at;
        $this->_validated_at = $_validated_at;
        $this->_pdo = DataBase::dbConnect();
    }

        /**
     * GETTER ID
     * @return int
     */

    public function getId():int{
        return $this->_id;
    }

    /**
     * GETTER lastname
     * @return string
     */

    public function getLastname():string{
        return $this->_lastname;
    }

        /**
     * GETTER firstname
     * @return string
     */

    public function getFirstname():string{
        return $this->_firstname;
    }

            /**
     * GETTER email
     * @return string
     */

    public function getEmail():string{
        return $this->_email;
    }

                /**
     * GETTER login
     * @return string
     */

    public function getLogin():string{
        return $this->_login;
    }

                    /**
     * GETTER password
     * @return string
     */

    public function getPassword():string{
        return $this->_password;
    }

                        /**
     * GETTER password
     * @return int
     */

    public function getIdRoles():int{
        return $this->_id_roles;
    }

                            /**
     * GETTER password
     * @return int
     */

    public function getValidatedAt():string{
        return $this->_validated_at;
    }
    

        /**
     * SETTER pour l'attribut privé _id
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id):void{
        $this->_id = $id;
    }

        /**
     * SETTER pour l'attribut privé _lastname
     * @param string $lastname
     * 
     * @return void
     */
    public function setLastname(string $lastname):void{
        $this->_lastname = $lastname;
    }

        /**
     * SETTER pour l'attribut privé _firstname
     * @param string $firstname
     * 
     * @return void
     */
    public function setFirstname(string $firstname):void{
        $this->_firstname = $firstname;
    }

            /**
     * SETTER pour l'attribut privé _email
     * @param string $email
     * 
     * @return void
     */
    public function setEmail(string $email):void{
        $this->_email = $email;
    }

                /**
     * SETTER pour l'attribut privé _login
     * @param string $login
     * 
     * @return void
     */
    public function setLogin(string $login):void{
        $this->_login = $login;
    }

                /**
     * SETTER pour l'attribut privé _password
     * @param string $password
     * 
     * @return void
     */
    public function setPassword(string $password):void{
        $this->_password = $password;
    }

                    /**
     * SETTER pour l'attribut publique _validated_at
     * @param string $validated_at
     * 
     * @return void
     */
    public function setValidatedAt(string $_validated_at):void{
        $this->_validated_at = $_validated_at;
    }

                    /**
     * SETTER pour l'attribut privé _password
     * @param string $password
     * 
     * @return void
     */
    public function setIdRoles(int $_id_roles):void{
        $this->_id_roles= $_id_roles;
    }

    public function add():int{
        try{
            $db = DataBase::dbConnect();
            $sth = $db->prepare('INSERT INTO `users` (`firstname`,`lastname`,`mail`,`login`,`password`,`id_roles`) VALUES (:firstname,:lastname,:mail,:loginUser,:passwordUser,:id_roles)');
            $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
            $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->getEmail(), PDO::PARAM_STR);
            $sth->bindValue(':loginUser', $this->getLogin(), PDO::PARAM_STR);
            $sth->bindValue(':passwordUser', $this->getPassword(), PDO::PARAM_STR);
            $sth->bindValue(':id_roles', $this->getIdRoles(), PDO::PARAM_INT);
            if($sth->execute()){
                $lastId = $db->lastInsertId();
            } 
            return $lastId;
        } catch (PDOException $e){
            return false;
        }
    }
    public static function isExist(string $loginUser){
        try{
            $sql = "SELECT `login` FROM `users` WHERE `login` = :loginUser; ";
            $sth = DataBase::dbConnect()-> prepare($sql);
            $sth->bindValue(':loginUser', $loginUser, PDO::PARAM_STR);
            if($sth->execute()){
                return $sth->fetch();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }


    public static function getOne(int $id):object{
        $sql = 'SELECT * FROM `users` WHERE `users`.`ID` = :id;';
        try{
            $sth =  DataBase::dbConnect()->prepare($sql);
            $sth->bindValue(':id',$id, PDO::PARAM_INT);
            $verif = $sth ->execute();
            if(!$verif){
                throw new PDOException();
            } else {
                return $sth->fetch();
            }
        } catch(PDOException $e){
            return $e;
        }
    }

    public static function getOneLogin(string $loginUser):object{
        $sql = 'SELECT * FROM `users` WHERE `users`.`login` = :loginUser;';
        try{
            $sth =  DataBase::dbConnect()->prepare($sql);
            $sth->bindValue(':loginUser',$loginUser, PDO::PARAM_STR);
            $sth ->execute();
            $result = $sth->fetch();
            if(!$result){
                throw new PDOException();
            } else {
                return $result;
            }
        } catch(PDOException $e){
            return $e;
        }
    }

    public function modifyOne($id){
        $sql = 
        'UPDATE `users`  
        SET `firstname` = :newFirstname, `lastname` = :newLastname, `mail` = :newMail, `login` = :newLogin, `password` = :newMPassword
        WHERE `ID` = :id';
        $sth =  DataBase::dbConnect()->prepare($sql);
        $sth->bindValue(':newLastname', $this->getLastname(), PDO::PARAM_STR);
        $sth->bindValue(':newFirstname', $this->getFirstname(), PDO::PARAM_STR);
        $sth->bindValue(':newBirthDate', $this->getEmail(), PDO::PARAM_STR);
        $sth->bindValue(':newPhone', $this->getLogin(), PDO::PARAM_STR);
        $sth->bindValue(':newMail', $this->getPassword(), PDO::PARAM_STR);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth ->execute();
        return $sth->fetch(); 
    }


    public function updateValidation(){
        $sql = 
        'UPDATE `users`  
        SET `validated_at` = :validated_at
        WHERE `login` = :loginUser';
        $sth =  DataBase::dbConnect()->prepare($sql);
        $sth->bindValue(':validated_at', $this->getValidatedAt(), PDO::PARAM_STR);
        $sth->bindValue(':loginUser', $this->getLogin(), PDO::PARAM_STR);
        return $sth->execute(); 
    }

    public function update(object $user){
        $this->_login = $user->login;
        $this->_validated_at = $user->validated_at;
    }


    public function deleteUser($id){
        $sql = 'DELETE FROM `users`
        WHERE `users`.`ID` = :id';
        $sth = DataBase::dbConnect()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth ->execute();  
        return $sth->fetch();
    }


}