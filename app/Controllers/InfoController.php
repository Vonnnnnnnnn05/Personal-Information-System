<?php

namespace App\Controllers;

use App\Models\InfoModel;

class InfoController extends BaseController
{
    public function index()
    {
        $model = new InfoModel();

        // Get the current page from the URL (default to 1 if not specified)
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 5; // 5 items per page

        // Calculate offset
        $offset = ($page - 1) * $perPage;

        // Get infos with pagination
        $data['infos'] = $model->findAll($perPage, $offset);

        // Get total count for pagination calculation
        $data['totalInfos']  = $model->countAll();
        $data['currentPage'] = $page;
        $data['perPage']     = $perPage;
        $data['totalPages']  = ceil($data['totalInfos'] / $perPage);

        return view('info_view', $data);
    }

    public function cards()
    {
        $model = new InfoModel();

        // show all infos
        $data['infos'] = $model->findAll();
        $data['totalInfos'] = $model->countAll();

        return view('info_card', $data);
    }

    public function add()
    {
        return view('add_info');
    }

    public function editForm($id)
    {
        $model = new InfoModel();
        $data['info'] = $model->find($id);
        return view('edit_info', $data);
    }

    public function create()
    {
        $model = new InfoModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'gender'    => $this->request->getPost('gender'),
            'address'   => $this->request->getPost('address'),
            'phone'     => $this->request->getPost('phone'),
            'email'     => $this->request->getPost('email'),
        ];

        $model->insert($data);
        session()->setFlashdata('message', 'Info created successfully! Add another one.');
        return redirect()->to('/dashboard');
    }

    public function edit($id)
    {
        $model = new InfoModel();
        $data['info'] = $model->find($id);
        return view('edit_info', $data);
    }

    public function update($id)
    {
        $model = new InfoModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'gender'    => $this->request->getPost('gender'),
            'address'   => $this->request->getPost('address'),
            'phone'     => $this->request->getPost('phone'),
            'email'     => $this->request->getPost('email'),
        ];

        $model->update($id, $data);
        session()->setFlashdata('message', 'Info updated successfully!');
        return redirect()->to('/dashboard');
    }

    public function delete($id)
    {
        $model = new InfoModel();
        $model->delete($id);
        session()->setFlashdata('message', 'Info deleted successfully!');
        return redirect()->to('/dashboard');
    }
    public function analytics()
    {
        $model = new InfoModel();

        // Get all infos for analytics
        $data['infos'] = $model->findAll();
        $data['totalInfos'] = $model->countAll();

        // Count by gender
        $data['maleCount'] = 0;
        $data['femaleCount'] = 0;
        $data['otherCount'] = 0;

        foreach ($data['infos'] as $info) {
            if ($info['gender'] == 'Male') $data['maleCount']++;
            elseif ($info['gender'] == 'Female') $data['femaleCount']++;
            else $data['otherCount']++;
        }

        return view('info_analytics', $data);
    }
    public function qr()
    {
        $model = new InfoModel();

        // Get all infos
        $data['infos'] = $model->findAll();
        $data['totalInfos'] = $model->countAll();

        return view('info_qr', $data);
    }

    public function viewQr($id)
    {
        $model = new InfoModel();
        $data['info'] = $model->find($id);
        
        if (!$data['info']) {
            return redirect()->to('/info/qr');
        }
        
        return view('view_qr', $data);
    }

}
