<?php

namespace App\Controllers;

use App\Models\Ticket;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Area;
use App\Models\Status;
use App\Models\Prioridad;
use App\Models\Categoria;

class TicketController extends ResourceController
{

    private $ticket;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $db = db_connect();
        $this->db = db_connect();
        $pager = \Config\Services::pager();
        $this->ticket = new Ticket;
        $this->session = \Config\Services::session();
    }


    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $db = \Config\Database::connect();
        $total = $db->table('tickets')->countAll();
        $tickets = model('Ticket');

        $builder = $db->table('status');
        $builder->join('tickets', 'tickets.status=status.id');
        $status = $builder->get();
        // $status = $builder->where('status.id', 'ASC')->get();

        $data = [
            'title' => 'Tickets de soporte',
            'total' => $total,
            'status' => $status,
            // // 'tickets'   => $tickets->findAll(),
            // 'tickets'   => $tickets->orderBy('status', 'ASC')->findAll()
            'tickets' => $tickets->orderBy('id', 'desc')->findAll()
        ];

        return view('tickets/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $ticket = $this->ticket->find($id);
        if ($ticket) {

            $builder = $this->db->table("status as s");
            $builder->select('s.name');
            $builder->join('tickets as t', 's.id = t.status');
            $st = $builder->get()->getResult();

            $data = [
                // 'ticket'  => $ticket->where('id', $id)->first(),
                'ticket' => $ticket,
                'status' => $st,
                'title' => "Información del ticket de soporte seleccionado"
            ];

            return view('tickets/show', $data);
        } else {
            return redirect()->to('/tickets');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $categories = model('Categoria');
        $priorities = model('Prioridad');
        $status = model('Status');
        $areas = model('Area');

        $data = [
            'title'         => 'Nuevo ticket de soporte',
            'status'        => $status->findAll(),
            'priorities'    => $priorities->findAll(),
            'categories'    => $categories->findAll(),
            'areas'         => $areas->findAll()
        ];
        return view('tickets/create', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'area' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'title' => 'required|min_length[5]|max_length[150]',
            'description' => 'required|min_length[5]',
            'status'    => 'required',
            'phone'     => 'required',
            'email'     => 'required'
        ]);

        if (!$inputs) {
            return view('tickets/create', ['validation' => $this->validator]);
        }

        $this->ticket->save([
            'area'          => $this->request->getPost('area'),
            'category'      => $this->request->getPost('category'),
            'priority'      => $this->request->getPost('priority'),
            'title'         => $this->request->getPost('title'),
            'slug'          => url_title($this->request->getPost('title'), '-', true),
            'description'   => $this->request->getPost('description'),
            'evidence'      => $this->request->getPost('evidence'),
            'url'           => $this->request->getPost('url'),
            'status'        => $this->request->getPost('status'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email')
        ]);

        session()->setFlashdata('success', 'Publicación guardada con éxito');

        return redirect()->to(site_url('/tickets'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $ticket = $this->ticket->find($id);
        if ($ticket) {


            $categories = model('Categoria');
            $priorities = model('Prioridad');
            $status = model('Status');
            $areas = model('Area');

            $data = [
                'title'         => 'Nuevo ticket de soporte',
                'status'        => $status->findAll(),
                'priorities'    => $priorities->findAll(),
                'categories'    => $categories->findAll(),
                'areas'         => $areas->findAll(),
                'ticket'        => $ticket
            ];

            return view('tickets/edit', $data);
        } else {
            session()->setFlashdata('failed', 'Registro no encontrado');
            return redirect()->to('/tickets');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $inputs = $this->validate([
            'area'          => 'required',
            'category'      => 'required',
            'priority'      => 'required',
            'title'         => 'required|min_length[5]|max_length[150]',
            'description'   => 'required|min_length[5]',
            'status'        => 'required',
            'phone'         => 'required',
            'email'         => 'required'
        ]);

        if (!$inputs) {
            return view('tickets/edit', [
                'validation' => $this->validator
            ]);
        }

        $this->ticket->save([
            'area'          => $this->request->getVar('area'),
            'category'      => $this->request->getVar('category'),
            'priority'      => $this->request->getVar('priority'),
            'title'         => $this->request->getVar('title'),
            'slug'          => url_title($this->request->getVar('title'), '-', true),
            'description'   => $this->request->getVar('description'),
            'evidence'      => $this->request->getVar('evidence'),
            'url'           => $this->request->getVar('url'),
            'status'        => $this->request->getVar('status'),
            'phone'         => $this->request->getVar('phone'),
            'email'         => $this->request->getVar('email')
        ]);
        session()->setFlashdata('success', 'Registro actualizado');
        return redirect()->to(base_url('/tickets'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->ticket->delete($id);
        session()->setFlashdata('success', 'Registro eliminado con éxito');
        return redirect()->to(base_url('/tickets'));
    }



    public function exportarXLSX()
    {
        echo 'Este script exporta datos de la base de datos a un archivo .xlsx';
    }


}
