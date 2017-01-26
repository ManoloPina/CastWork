<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use App\User;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = User::all();

		return view('users.index', ['usuarios' => $usuarios]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {

		$validator = Validator::make($request->all(), [
			'nome' => 'required',
			'login' => 'required|unique:usuarios,login',
			'email' => 'required|unique:usuarios,email',
			'senha' => 'required|min:4'
		]);

		if($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}

		try {
			$user = User::create([
				'nome' => $request->nome,
				'email' => $request->email,
				'login' => $request->login,
				'senha' => bcrypt($request->senha)
			]);
		}catch(\Exception $e) {
			Session::flash('sql-error', $e->getMessage());
			return redirect()->back();
		}

		if($user) {
			Session::flash('success', 'Usuário cadastrado');
			return redirect()->back();
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$usuario = User::find($id);

		return view('users.edit', ['usuario' => $usuario]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'nome' => 'required',
			'login' => 'required|unique:usuarios,login',
			'email' => 'required|unique:usuarios,email'
		]);

		if($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}

		try {
			User::where('usuarios.id', $request->id)->update([
				'nome' => $request->nome,
				'login' => $request->login,
				'email' => $request->email
			]);
			Session::flash('success', 'Usuário atualizado com sucesso');
			return redirect()->back();
		}catch(\Exception $e) {
			Session::flash('sql-error', $e->getMessage());
			return redirect()->back();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try {
			$usuario = User::find($id);
			if($usuario) $usuario->delete();
			Session::flash('success', 'Usuário removido com sucesso');
			return redirect()->back();
		}catch(\Exception $e) {
			Session::flash('sql-error', $e->getMessage());
			return redirect()->back();
		}
	}

}
