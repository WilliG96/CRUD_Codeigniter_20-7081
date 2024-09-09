<?php 
namespace App\Models;
use CodeIgniter\Model;

class ClienteModel extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'clientes'; 

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos permitidos para insertar o actualizar
    protected $allowedFields = ['nombre', 'direccion', 'telefono', 'email', 'cui']; // Ajusta los campos a los que necesites
}
