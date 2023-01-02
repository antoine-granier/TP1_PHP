<?php 
class UserManager{
    private $db;
    public function __construct($db)
    {
        $this->db=$db;
    }
    public function login(User $user) {
        $req = $this->db->prepare(
            'SELECT * FROM user
            WHERE email = :email AND password = :password'
        );

        $req->execute(
            array(
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            )
        );
        return $req->fetch();
    }
    public function create(User $user) {
        $req = $this->db->prepare(
        'INSERT INTO user ( lastName, firstName, email, address, postalCode, city,
        password, admin )
        VALUES ( :lastName, :firstName, :email, :address, :cp, :city, :password, 0 )'
    );
        $req->execute(
            array(
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName(),
                'email' => $user->getEmail(),
                'address' => $user->getAddress(),
                'cp' => $user->getPostalCode(),
                'city' => $user->getCity(),
                'password' => $user->getPassword()
            )
        );
    }
    public function findAll() {
        $req = $this->db->prepare(
            'SELECT *
            FROM user'
        );
        $req->execute();
        return $req->fetchAll();
    }
    public final function findOne($id) {
        $req = $this->db->prepare(
            'SELECT * 
            FROM user
            WHERE id = :id'
        );
        $req->execute(
            array('id' => $id)
        );
        return $req->fetch();     
    }
    public final function update(User $user) {
        $req = $this->db->prepare(
            'UPDATE user
            SET 
            lastName=:lastName, firstName=:firstName, email=:email, address=:address, postaleCode=:cp, city=:city, password=:password
            WHERE id = :id'
        );
        $req->execute(
            array(
                'id' => $user->getId(),
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName(),
                'email' => $user->getEmail(),
                'address' => $user->getAddress(),
                'cp' => $user->getPostalCode(),
                'city' => $user->getCity(),
                'password' => $user->getPassword()
            )
        ); 
    }
    public final function delete(User $user) {
        $req = $this->db->prepare(
            'DELETE FROM user
            WHERE id = :id'
        );
        $req->execute(
            array(
                'id' => $user->getId()
            )
        );
    }
    public final function findByEmail($email)
    {
        $req = $this->db->prepare(
            'SELECT * 
            FROM user
            WHERE email = :email'
        );
        $req->execute(
            array('email' => $email)
        );
        return $req->fetch();
    }
}
?>
