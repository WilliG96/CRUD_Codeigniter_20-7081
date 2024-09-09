<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('clientes-list', 'ClienteCrud::index');        // Mostrar la lista de clientes
$routes->get('cliente-form', 'ClienteCrud::create');        // Formulario para agregar un cliente
$routes->post('store-cliente', 'ClienteCrud::store');       // Almacenar nuevo cliente
$routes->get('edit-cliente/(:num)', 'ClienteCrud::singleCliente/$1'); // Editar cliente
$routes->post('update-cliente', 'ClienteCrud::update');     // Actualizar cliente
$routes->get('delete-cliente/(:num)', 'ClienteCrud::delete/$1');  // Eliminar cliente

