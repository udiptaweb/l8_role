<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ViewUserTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $listeners = ['deleteItem'];

    public function deleteItem($id)
    {
        try {
            User::whereId($id)->delete();
            $this->emit('success', 'User deleted successfully.');
        } catch (\Throwable $th) {
            $this->emit('danger', 'Something went wrong. Please try again later.');
        }
    }

    public function render()
    {
        $query = User::query();
        return view('livewire.admin.users.view-user-table', [
            'users' => $query->orderby('name', 'asc')->paginate(12)
        ]);
    }
}
