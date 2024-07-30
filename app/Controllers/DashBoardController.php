<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashBoardController extends BaseController
{
    public function index()
    {
        $user = session()->get('user');
        $userId = session()->get('user')['id'];
        return view('dashboard', ['user' => $user, 'userId' => $userId]);
    }

    public function profile()
    {

        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }
        return view('profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        $userModel = new UserModel();
        $user = session()->get('user');
        
        
    
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];
    
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }
    
        if ($this->request->getFile('picture')->isValid()) {
            $data['picture'] = $this->uploadPicture();
        }
    
        if ($userModel->update($user['id'], $data)) {
            session()->set('user', $userModel->find($user['id']));
            session()->setFlashdata('success', 'Profile updated successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to update profile.');
        }
    
        return redirect()->to('/profile');
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
