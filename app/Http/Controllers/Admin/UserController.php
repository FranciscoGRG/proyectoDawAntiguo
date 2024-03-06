<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /* Este metodo se encarga de mostrar la vista que va a mostrar a todos los usuarios */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /* Este metodo se encarga de abrir la vista en la que se va a editar los datos de un usuario */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /* Este metodo se encarga de eliminar a un usuario de la base de datos */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
