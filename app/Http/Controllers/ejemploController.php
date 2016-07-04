<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Usuario;
use App\Proyecto;
use DB;
use App\usuarios_proyectos;

class ejemploController extends Controller
{
    public function index($nombre,$edad){
    	return view ('home', compact('nombre','edad'));

    }

    public function mostrarUsuarios(){

    	$usuario=Usuario::all();
  
    	return view ('consultarUsuarios', compact('usuario'));
    }

    public function eliminarUsuarios($id){
    	Usuario::find($id)->delete();
    	return Redirect('/usuarios');

    }

    public function registrarUsuarios(){
        return view("registrarUsuario");

    }

    public function guardarUsuario(Request $request){
        $usuario = new Usuario();
    $usuario->nombre=$request->input('nombre');
       $usuario->edad=$request->input('edad');
       $usuario->correo=$request->input('correo');
       $usuario->save();
       return Redirect('/usuarios');


    }

    public function modificarUsuario($id){
        $usuario=Usuario::find($id);
        return view('modificarUsuario', compact ('usuario'));

    }

    public function actualizarUsuario(Request $request, $id){
        $usuario=Usuario::find($id);
        $usuario->nombre=$request->input('nombre');
        $usuario->edad=$request->input('edad');
        $usuario->correo=$request->input('correo');
        $usuario->save();
       return Redirect('/usuarios');


    }
    
    public function asignarUsuarios(){
        $proyectos=Proyecto::all();
        return view('asignarUsuarios', compact('proyectos'));
      

    }

 public function seleccionarUsuarios(Request $request){
        $proyectos=Proyecto::all();
        $id=$request->input('proyectos');
        $lista=DB::table('usuarios_proyectos')->where('id_proyecto','=',$id)->lists('id_usuario');
        $usuario=DB::table('usuario')->whereNotIn('id', $lista)->orderBy('id', 'asc')->get();
        return view('seleccionarUsuarios', compact('proyectos','usuario','id'));
      

    }

    public function actualizarUsuariosProyectos(Request $request, $id){

        $usuarios=$request->input('seleccionados');
        foreach ($usuarios as $u) {
            $registro=new usuarios_proyectos();
            $registro->id_usuario=$u;
            $registro->id_proyecto=$id;
            $registro->save();
            }
             return Redirect('/asignarUsuarios');

    }

     public function pdfProyectos($id){
        $lista=DB::table('usuarios_proyectos')->where('id_proyecto','=',$id)->lists('id_usuario');
        $usuario=DB::table('usuario')->whereIn('id', $lista)->orderBy('id', 'asc')->get();
        $proyecto=Proyecto::find($id);
        $vista=view('pdfProyectos', compact('usuario','proyecto'));
        $dompdf= \App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();



    }




}






















