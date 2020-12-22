<?php
/**
 * Podemos ver, que la clase UserController tiene varias dependencias(*),
 * primero depende de la clase MySQLDatabase para crear una instancia de la misma
 * y utilizarla para insertar un usuario. Luego el método store() depende de la clase
 * Request para recibir la información que viene del exterior y también depende de la
 * clase User para crear el objeto usuario que luego será persistido.
 *
 *
 * (*)Una dependencia es un instancia de la clase B, que la clase A necesita
 * para poder hacer su trabajo.
 */
namespace App;

use MySQLDatabase;
use Request;
use User;

class UserController
{
  private $db;

  public function __construct()
  {
    $this->db = new MySQLDatabase();
  }

  public function store()
  {
    $request = new Request();
    $user = new User();
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));

    $this->db->insert($user);

    return $this->response('Usuario registrado');
  }
}
