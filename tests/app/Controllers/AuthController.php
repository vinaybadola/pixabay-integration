<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|max_length[20]',
            'picture' => 'uploaded[picture]|max_size[picture,1024]|is_image[picture]'
        ]);

        // Check if the input data passes the validation rules
        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'picture' => $this->uploadPicture()
        ];
        
        try {
            $userModel->insert($data);
            return redirect()->to('/login');
        } catch (\mysqli_sql_exception $e) {
            // Log the error message
            log_message('error', $e->getMessage());
        
            // Display a user-friendly message
            return redirect()->back()->with('error', 'An error occurred while creating the user. Please try again.');
        }
    }

    public function login()
    {
        if(session()->get('user')) {
            return redirect()->to('/dashboard');
        }
        return view('login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user', $user);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    private function uploadPicture()
    {
        $file = $this->request->getFile('picture');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $fileName);
            return 'uploads/' . $fileName;
        }
        return null;
    }
}