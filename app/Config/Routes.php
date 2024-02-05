<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// login
$routes->get('/login', 'ValidateController::index');
// proses login
$routes->post('/proseslogin', 'ValidateController::proseslogin');
// logout
$routes->post('/logout', 'ValidateController::logout');
// siswa
$routes->get('/siswa', 'SiswaController::index');
// log
$routes->get('/logperilaku', 'LogController::index');
// pelanggaran
$routes->get('/pelanggaran', 'LogController::pelanggaran');
// tambah pelanggaran
$routes->post('/tambahpelanggaran', 'LogController::tambahpelanggaran');
// kebaikan
$routes->get('/kebaikan', 'LogController::kebaikan');
// tambah kebaikan
$routes->post('/tambahkebaikan', 'LogController::tambahkebaikan');
// users
$routes->get('/users', 'UsersController::index');

// view log management
$routes->get('/tambahlog', 'LogController::tambahlog');
// tambah log siswa
$routes->post('/tambahlogsiswa', 'LogController::tambahlogsiswa');