<?php 
namespace App\Controllers;
use App\Models\ClienteModel; // Cambiamos el nombre del modelo a ClienteModel
use CodeIgniter\Controller;

class ClienteCrud extends Controller
{
   // Muestra la lista de clientes
    public function index(){
        $clienteModel = new ClienteModel();
        $data['clientes'] = $clienteModel->orderBy('id', 'DESC')->findAll();
        return view('clientes_view', $data); // Cambia la vista a 'cliente_view'
    }

    // Muestra el formulario de crear cliente
    public function create(){
        return view('add_cliente'); // Cambia la vista a 'add_cliente'
    }
 
    // Insertar datos del cliente
    public function store() {
        $clienteModel = new ClienteModel();
        $data = [
            'nombre'    => $this->request->getVar('nombre'),
            'direccion' => $this->request->getVar('direccion'),
            'telefono'  => $this->request->getVar('telefono'),
            'email'     => $this->request->getVar('email'),
            'cui'       => $this->request->getVar('cui')
        ];
        $clienteModel->insert($data);
    
        // Establecer un mensaje en la sesión
        session()->setFlashdata('success', 'Registro guardado con éxito.');
    
        return $this->response->redirect(site_url('/clientes-list')); // Ajusta la ruta
    }

    // Muestra los datos de un solo cliente para editar
    public function singleCliente($id = null){
        $clienteModel = new ClienteModel();
        $data['cliente_obj'] = $clienteModel->where('id', $id)->first();
        return view('edit_cliente', $data); // Cambia la vista a 'edit_cliente'
    }

    // Actualiza los datos del cliente
    public function update(){
        $clienteModel = new ClienteModel();
        $id = $this->request->getVar('id');
        $data = [
            'nombre'    => $this->request->getVar('nombre'),
            'direccion' => $this->request->getVar('direccion'),
            'telefono'  => $this->request->getVar('telefono'),
            'email'     => $this->request->getVar('email'),
            'cui'       => $this->request->getVar('cui')
        ];
        $clienteModel->update($id, $data);
        return $this->response->redirect(site_url('/clientes-list')); // Ajusta la ruta
    }
 
   // Elimina el registro de un cliente
    public function delete($id = null){
        $clienteModel = new ClienteModel();
        $clienteModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/clientes-list')); // Ajusta la ruta
    }    
}
