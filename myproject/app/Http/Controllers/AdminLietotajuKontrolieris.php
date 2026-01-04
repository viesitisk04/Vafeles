<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminLietotajuKontrolieris extends Controller
{
    public function index()
    {
        // Pārlādējam datus no datu bāzes, lai nodrošinātu aktuālus datus
        $lietotaji = User::orderBy('id')->get();

        return view('admin.lietotaji', compact('lietotaji'));
    }

    public function dzest($id)
    {
        // Neļaujam adminam izdzēst pašam sevi
        if (Auth::id() == $id) {
            return back()->with('error', 'Tu nevari dzēst pats sevi.');
        }

        User::findOrFail($id)->delete();

        return back()->with('success', 'Lietotājs dzēsts.');
    }

    public function padaritAdmin($id)
    {
        $user = User::findOrFail($id);

        // Neļaujam mainīt savu paša statusu
        if (Auth::id() == $id) {
            return back()->with('error', 'Tu nevari mainīt savu administratora statusu.');
        }

        // Saglabājam veco statusu
        $vecaisStatuss = $user->is_admin;

        // Pārslēdzam admin statusu
        $jaunsStatuss = !$user->is_admin;
        $user->is_admin = $jaunsStatuss;
        $user->save();

        // Pārbaudām vai update izdevās
        $user->refresh(); // Pārlādējam modeli no datu bāzes

        if ($user->is_admin == $jaunsStatuss) {
            $zinojums = $jaunsStatuss ? 'Administratora tiesības piešķirtas.' : 'Administratora tiesības noņemtas.';
            return back()->with('success', $zinojums);
        } else {
            return back()->with('error', 'Neizdevās atjaunot lietotāja statusu. Vērtība palika: ' . ($user->is_admin ? 'true' : 'false'));
        }
    }
}
