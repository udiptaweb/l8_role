<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CreateUserForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    public function submit()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);
        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            $role = Role::find($this->role);
            $user->assignRole($role);
            $this->reset();

            $this->emit('success', 'User Created Successfully.');
        } catch (\Throwable $th) {
            $this->emit('danger', 'Something went Wrong.');
        }
    }

    public function render()
    {
        return view('livewire.admin.users.create-user-form', [
            'roles' => Role::orderBy('name', 'ASC')->get()
        ]);
    }
}
