<?php

require_once(dirname(__FILE__) . '/../config/PDO/PDO_init.php');

class Role {
    private int $_id;
    private string $_role;
    private object $_pdo;

                /**
     * Création de la méthode magique construct visant à créer un rôle
     * @param int $id
     * @param string $role
     * @param object $pdo
     */

    public function __construct( $role = ''){
        $this->_role = $role;
        $this->_pdo = DataBase::dbConnect();
    }


}