<?php

namespace App\Controllers;

class Api extends BaseController
{
    public function index()
    {
        // return api response
        return $this->response->setJSON(['message' => 'Hello, World!']);
    }

    public function store()
    {
        // validate input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[5]|max_length[20]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|max_length[255]',
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return $this->response->setJSON($validation->getErrors());
        }

        // insert data
        $user = new \App\Models\User();
        $user->name = $this->request->getPost('name');
        $user->email = $this->request->getPost('email');
        $user->password = $this->request->getPost('password');
        $user->save();

        // return api response
        return $this->response->setJSON(['message' => 'User created successfully.']);
    }

    public function show($id)
    {
        // return api response
        return $this->response->setJSON(['message' => 'Hello, World!', 'id' => $id]);
    }

    public function update($id)
    {
        // validate input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[5]|max_length[20]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|max_length[255]',
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return $this->response->setJSON($validation->getErrors());
        }

        // update data
        $user = new \App\Models\User();
        $user->where('id', $id)->set([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ])->update();

        // return api response
        return $this->response->setJSON(['message' => 'User updated successfully.']);
    }

    public function destroy($id)
    {
        // delete data
        $user = new \App\Models\User();
        $user->where('id', $id)->delete();

        // return api response
        return $this->response->setJSON(['message' => 'User deleted successfully.']);
    }
}
