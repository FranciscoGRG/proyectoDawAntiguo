<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Route;
use App\Models\User;

class CommentController extends Controller
{

    /* Esta funcion se encarga de añadir los comentarios a la base de datos */
    public function store(Request $request, Route $route)
    {

        Comment::create([
            'message' => $request->message,
            'route_id' => $request->route_id,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('route.show', compact('route'));
    }

    /* Esta funcion se encarga de abrir la vista en la que se va a editar un comentario */
    public function edit(Route $route, Comment $comment)
    {
        $autor = User::find($route->user_id);

        return view('routes.commentEdit', compact('route', 'autor', 'comment'));
    }

    /* Esta funcion se encarga de actualizar los comentarios */
    public function update(Request $request, Comment $comment, Route $route)
    {
        $comment->update(['message' => $request->message,
        'route_id' => $request->route_id,
        'user_id' => $request->user_id]);

        return redirect()->route('route.show', compact('route'));
    }

    /* Esta funcion se encarga de eliminar los comentarios */
    public function destroy(Comment $comment, Route $route)
    {
        $comment->delete();

        return redirect()->route('route.show', compact('route'));
    }
}
