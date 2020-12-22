<?php
/**
 * Como vemos la inyectamos la dependencia
 * DataBase mediante el constructor y la dependencia Request
 * se la inyectamos al método store de la clase. Con esto logramos
 * desacoplar un poco las clases ya que nuestra clase UserController
 * no tiene la responsabilidad de crear ella misma los objetos.
 *
 */
namespace App;

use DataBase;
use Request;

class UserController
{
  private $db;

  public function __construct(DataBase $database)
  {
    $this->db = $database;
  }

  public function store(Request $request)
  {
    $user = new User();
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));

    $this->db->insert($user);

    return $this->response('Usuario registrado');
  }
}

/**
 * Cuando usas inyección de dependencias, si quieres cambiar
 * el “DataBase” del “UseController”, lo único que tienes que hacer es crear
 * una clase que extienda la clase DataBase y pasarla como dependencia
 * de la clase UseController y listo!
 */
class DataBase
{
  public function __construct()
  {
  }
}

class MySQLDatabase extends DataBase
{
  public function __construct()
  {
  }
}

class PostgresDatabase extends DataBase
{
  public function __construct()
  {
  }
}

class SqliteDatabase extends DataBase
{
  public function __construct()
  {
  }
}

$msyql = new MySQLDatabase();
$postgres = new PostgresDatabase();
$sqlite = new SqliteDatabase();

$msyqlUser = new UserController($msyql);
$postgresUser = new UserController($postgres);
$sqliteUser = new UserController($sqlite);
