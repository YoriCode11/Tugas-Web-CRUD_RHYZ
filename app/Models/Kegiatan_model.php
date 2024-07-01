<?php

namespace App\Models;

use CodeIgniter\Model;

class Kegiatan_model extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['hari', 'kegiatan', 'tanggal', 'jam', 'lokasi', 'keterangan'];


    public function rules()
    {
        return [
            'hari' => [
                'label' => 'ahri',
                'rules' => 'trim|required'
            ],
            'kegiatan' => [
                'label' => 'kegiatan',
                'rules' => 'trim|required'
            ],
            'tanggal' => [
                'label' => 'tanggal',
                'rules' => 'trim|required'
            ],
            'jam' => [
                'label' => 'jam',
                'rules' => 'trim|required'
            ],
            'lokasi' => [
                'label' => 'lokasi',
                'rules' => 'trim|required'
            ],
            'keterangan' => [
                'label' => 'keterangan',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }
}