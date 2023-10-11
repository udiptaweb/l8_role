<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUserForm extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $user = User::findOrFail($this->user_id);
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function store()
    {
        $user = User::find($this->user_id);
        if($user->email != $this->email){
            $this->validate([
            'email' => 'nullable|max:255|unique:users'
            ]);
        }
        $this->validate([
            'name' => 'required|max:255|string',
        ]);
        try {
            $data = [
                'name' => $this->name,
                'email' => $this->email
            ];
            if ($this->password) {
                $this->validate([
                    'password' => 'required|confirmed|string|min:6'
                ]);
                $data['password'] = Hash::make($this->password);
            }
            $user = User::whereId($this->user_id)->update($data);
            $this->reset();
            $this->emit('success', 'User updated successfully.');
        } catch (\Throwable $th) {
            $this->emit('danger', 'Something went wrong. Please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.admin.users.edit-user-form');
    }
}
