<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    //Inicio
    public function index()
    {
        $ads = Ad::where('user_id', Auth::id())->get();//Muestra los anuncios del usuario logueado
        return view('my-ads', ['user' => Auth::user(), 'myAds' => $ads]);//Devuelve los anuncios
    }

    //Crear anuncio
    public function create()//Muestra el formulario para crear anuncio
    {
        return view('new', ['user' => Auth::user()]);
    }

    //Mostrar Anuncios
    public function store(Request $request)
    {
        $request->validate([//Valida el anuncio creado
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'content' => 'required',
            'price' => 'required|numeric|min:0',
            //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validar imagen (máx. 2MB)
        ]);

        Ad::create([//Crea el auncio en la base de datos
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'content' => $request->content,
            'price' => $request->price,
        ]);

        return redirect()->route('my-ads')->with('success', 'Anuncio Creado!');
    }

    //Modificar Anuncio
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);//Busca el anuncio a editar
        return view('edit-ad', ['ad' => $ad]);//Devuelve el anuncio a editar
    }

    public function update(Request $request, $id)
    {
        $request->validate([//Valida los datos del auncio editado
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'content' => 'required',
            'price' => 'required|numeric|min:0',
            //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $ad = Ad::findOrFail($id);//Busca el anuncio en la base de datos para actualizar
        $ad->update($request->all());

        // Actualizar el resto de los datos del anuncio
    $ad->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'subject' => $request->subject,
        'content' => $request->content,
        'price' => $request->price,
        //'image' => $ad->image // Mantener la imagen si no se cambia
    ]);

        return redirect()->route('my-ads')->with('success', 'Anuncio Actualizado!');
    }

    //Eliminar Anuncio
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);//Busca el anuncio en la base de datos y lo elimina
        $ad->delete();

        return redirect()->route('my-ads')->with('success', 'Anuncio Borrado!');
    }
}
