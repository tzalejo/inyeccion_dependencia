<?php
/**
 * Podemos ver, que la clase UserController tiene varias dependencias(*),
 * primero depende de la clase DataBase para crear una instancia de la misma
 * y utilizarla para insertar un usuario. Luego el método store() depende de la clase
 * Request para recibir la información que viene del exterior y también depende de la
 * clase User para crear el objeto usuario que luego será persistido.
 *
 *
 * (*)Una dependencia es un instancia de la clase B, que la clase A necesita
 * para poder hacer su trabajo.
 */
namespace App;

use DataBase;
use Request;
use User;

class UserController
{
  private $db;

  public function __construct()
  {
    $this->db = new DataBase();
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
/**
 * El problema con la implementación anterior, es que la clase “DataBase” 
 * se declara implícitamente o dicho de otra forma: No es posible saber que 
 * existe dicho objeto hasta inspeccionar código fuente de la clase UserController. 
 * Por lo tanto no solamente la declaración es implícita sino que las clases 
 * también están acopladas.
 * 
 * Es decir, que no puedes sustituir la clase DataBase, por PostgresDatabase o 
 * MySQLDatabase sin modificar el código de la clase UserController. De ésta 
 * misma manera, la clase se vuelve difícil de mantener y difícil de depurar. 
 * Es aquí donde entra en juego la inyección de dependencia, ya que cuando utilizas 
 * éste patrón estás haciendo explicita la declaración de la clase y por lo tanto 
 * desacoplando UserController de DataBase. 
 * 
 */