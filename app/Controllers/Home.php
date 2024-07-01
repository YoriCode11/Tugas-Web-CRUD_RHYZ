<?php

namespace App\Controllers;
use App\Models\Kegiatan_model;

class Home extends BaseController
{
     protected $db;

    public function __construct()
    {
        $this->db = new Kegiatan_model();
        helper(['form']);
    }

    public function index()
    {
        $data['title'] = "Lihat Data Jadwal";
        $data['data_jadwal'] = $this->db->getAll();
        echo view('template/header', $data);
        echo view('template/menu');
        echo view('jadwal/index', $data);
        echo view('template/footer');
    }

    public function add()
    {

        session();

        $data = [
            "title" => "Tambah Data Jadwal",
        ];

        echo view('template/header', $data);
        echo view('template/menu');
        echo view('jadwal/add', $data);
        echo view('template/footer');
    }

    public function save()
    {

        if (!$this->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'kegiatan' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ])) {
            return redirect()->to(base_url('/add'))->withInput();
        }
        $this->db->save([
            "hari" => $this->request->getVar('hari'),
            "tanggal" => $this->request->getVar('tanggal'),
            "kegiatan" => $this->request->getVar('kegiatan'),
            "jam" => $this->request->getVar('jam'),
            "lokasi" => $this->request->getVar('lokasi'),
            "keterangan" => $this->request->getVar('keterangan')
        ]);

        session()->setFlashdata('message', 'Data Berhasil ditambahkan.');
        return redirect()->to(base_url('/'));
    }

    public function delete($id)
    {
        $this->db->delete($id);
        session()->setFlashdata('message', 'Data Berhasil dihapus.');
        dd(session());
        return redirect()->to(base_url('/'));
    }

    public function edit($id)
    {
        session();

        $data = [
            "title" => "Tambah Edit Jadwal",
            "data_jadwal" => $this->db->getById($id)
        ];

        echo view('template/header', $data);
        echo view('template/menu');
        echo view('jadwal/edit', $data);
        echo view('template/footer');
    }

    public function update()
    {
        if (!$this->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'kegiatan' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ])) {
            return redirect()->to(base_url('/add'))->withInput();
        }
        $this->db->save([
            "id"=>$this->request->getVar("id"),
            "hari" => $this->request->getVar('hari'),
            "tanggal" => $this->request->getVar('tanggal'),
            "kegiatan" => $this->request->getVar('kegiatan'),
            "jam" => $this->request->getVar('jam'),
            "lokasi" => $this->request->getVar('lokasi'),
            "keterangan" => $this->request->getVar('keterangan')
        ]);

        session()->setFlashdata('message', 'Data Berhasil diubah.');
        return redirect()->to(base_url('/'));
    }
}
