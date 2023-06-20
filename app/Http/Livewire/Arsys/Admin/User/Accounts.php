<?php

namespace App\Http\Livewire\Arsys\Admin\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Role;
class Accounts extends Component
{
    public $enabledExpandView = [];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $viewIndex = null;
    public $tempIndex = null;
    public $viewEnable = null;
    public $menu;
    public $pageNumber = null;
    public $addAccountEnable = false;
    public $viewAccountEnable = null;
    protected $listeners = ['addAccountEnable_AdminUserAccount', 'startUserAccount_AdminUserAccount'];
    public function render()
    {
        if($this->tempIndex != $this->viewIndex){
            $this->enabledExpandView[$this->viewIndex] = 1;
            $this->enabledExpandView[$this->tempIndex] = null;
            $this->tempIndex = $this->viewIndex;
        }     
        //$users = User::paginate(10);
        $users = User::orderBy('name', 'ASC')->paginate(10);
        if($this->pageNumber != $users->currentPage()){
            foreach($users as $index => $user){
                $this->enabledExpandView[$index] = null;
            }
            $this->pageNumber = $users->currentPage();
            $this->tempIndex = $users->count()+1;
            $this->viewIndex = $users->count()+1;
        }
        return view('livewire.arsys.admin.user.accounts', ['users' => $users]);
    }

    public function mount(){
        $this->addAccountEnable = false;
        $this->viewEnable = false;
    }
    public function expandView($viewIndex, $accountId){
        $this->viewIndex = $viewIndex;
        $this->enabledExpandView[$this->viewIndex] = 1;
        $this->enabledExpandView[$this->tempIndex] = 0;
        $this->addAccountEnable = false;
        $this->emit('accountView_AdminUserAccount', ['accountId' => $accountId]);
    }

    public function addAccountEnable_AdminUserAccount(){
        if($this->addAccountEnable == false){
            $this->addAccountEnable = true;
            $this->enabledExpandView[$this->tempIndex] = 0;
        }else{
            $this->addAccountEnable = false;
        }
    }

    public function startUserAccount_AdminUserAccount(){
        $this->enabledExpandView[$this->tempIndex] = 0;
    }

    public function removeRole($roleId, $userId){
        $role = Role::where('id', $roleId)->first();
        $user = User::find($userId);
        $user->detachRole($role->name);
    }

    public function addRole($userId){
        dd('add role');
    }

    public function loginAs($userId){
        dd('login as');
    }
}
