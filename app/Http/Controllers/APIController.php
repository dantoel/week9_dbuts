<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\week9_dbuts;
use App\Models\account_login;
use App\Models\lapor_kekerasan;
use App\Models\laporan_kekerasan;
use App\Models\login_mhs;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class APIController extends Controller
{
    
  /**
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = week9_dbuts::all();
        return $data;
        
        //
    }

    public function index_kekerasan()
    {
        $data = laporan_kekerasan::all();
        return $data;
        //
    }

    public function index_mhs()
    {
        $data = login_mhs::all();
        return $data;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = new week9_dbuts;
        $save->Genre = $request->Genre;
        $save->Reports = $request->Reports;
        $save->Age = $request->Age;
        $save->Gpa = $request->Gpa;
        $save->Year = $request->Year;
        $save->Count = $request->Count;
        $save->Gender = $request->Gender;
        $save->Nationality = $request->Nationality;
        $save->save();

        return "Berhasil menyimpan data";
    }

    public function login_mhs(Request $request){
        $nim = $request->nim;
        $nama_mhs = $request-> nama_mhs;
        $status_akhir = $request-> status_akhir;

    
        // Assuming account_login is the model for your accounts table
        $user = login_mhs::where('nim', $nim)->first();
    
        if (!$user) {
            return response()->json(404);
        }
    
        // Assuming you're storing hashed passwords in the database
        if ($nama_mhs === $user->nama_mhs && $user->status_akhir == 'Lulus') {
            // Password is correct, you can proceed with the login
            // You might want to generate a token or use a session to keep the user logged in
            return response()->json(200);
        } elseif ($user->status_akhir != 'Lulus') {
            // Status Akhir is not "Lulus"
            return response()->json(401);
        } else {
            // Password is incorrect
            return response()->json(401);
        }
    }

    public function login(Request $request){
        $nim = $request->nim;
        $password = $request->password;
    
        // Assuming account_login is the model for your accounts table
        $user = account_login::where('nim', $nim)->first();
    
        if (!$user) {
            return response()->json(404);
        }
    
        // Assuming you're storing hashed passwords in the database
        if ($password === $user->password) {
            // Password is correct, you can proceed with the login
            // You might want to generate a token or use a session to keep the user logged in
            return response()->json(200);
        } else {
            // Password is incorrect
            return response()->json(401);
        }
    }


    public function register(Request $request){
        $save = new account_login;
        $save->nim = $request->nim; // Assuming nim is the field in account_login table
        $save->nama = $request->nama;
        $save->nomor_telepon = $request->nomor_telepon;
        $save->email = $request->email;
        $save->password = $request->password;
        $save->save();
        return "Berhasil menyimpan data";
    }

    public function lapor(Request $request){
        $save = new laporan_kekerasan;
        $save->nim = $request->nim;
        $save->nama = $request->nama;
        $save->telepon = $request->telepon;
        $save->jenis = $request->jenis;
        $save->report = $request->report;
        $save->filepath = $request->filepath;
        $save->save();
        return "Berhasil menyimpan data";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = week9_dbuts::all()->where('id', $request->id)->first();
        return $data;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = week9_dbuts::all()->where('id', $request->id)->first();
        $data->Genre = $request->Genre;
        $data->Reports = $request->Reports;
        $data->Age = $request->Age;
        $data->Gpa = $request->Gpa;
        $data->Year = $request->Year;
        $data->Count = $request->Reports;
        $data->Gender = $request->Gender;
        $data->Nationality = $request->Nationality;
        $data->save();
        return "Berhasil mengubah data";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $del = week9_dbuts::all()->where('id', $request->id)->first();
        $del->delete();
        return "Berhasil Menghapus Data";
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function countRows(Request $request)
    {
        // Menghitung total baris pada model yang sesuai.
        $rowCount = week9_dbuts::count();
    
        return response()->json([$rowCount]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function countRespondentsByGender(Request $request){
    // Validasi request
    $this->validate($request, [
        'Gender' => 'required|in:M,F', // Sesuaikan dengan opsi gender yang ada
    ]);

    // Menghitung jumlah responden berdasarkan jenis kelamin (gender).
    $Gender = $request->input('Gender');
    $rowCount = week9_dbuts::where('Gender', $Gender)->count();

    return response()->json([$rowCount]);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function countRespondentsByCountry(Request $request)
     {
         // Validasi request
         $this->validate($request, [
             'Nationality' => 'required|in:Indonesia,Soudan,France,Mexico,South Africa,Yemen', // Sesuaikan dengan opsi nationality yang ada
         ]);
     
         // Menghitung jumlah responden berdasarkan nationality (negara asal).
         $Nationality = $request->input('Nationality');
         $rowCount = week9_dbuts::where('Nationality', $Nationality)->count();
     
         return response()->json([$rowCount]);
     }
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function countRespondentsByGenre(Request $request)
     {
         // Validasi request
         $this->validate($request, [
             'Genre' => 'required|in:Academic Support and Resources,Activities and Travelling,Athletics and sports,Career opportunities,Financial Support,Food and Cantines,Health and Well-being Support,Housing and Transportation,International student experiences,Online learning,Student Affairs', // Sesuaikan dengan opsi nationality yang ada
         ]);
     
         // Menghitung jumlah responden berdasarkan nationality (negara asal).
         $Genre = $request->input('Genre');
         $rowCount = week9_dbuts::where('Genre', $Genre)->count();
     
         return response()->json([$rowCount]);
     }

public function calculateAverageAge() {
    $averageAge = week9_dbuts::average('Age');

    return response()->json([$averageAge]);
}

    public function calculateAverageGPA(){
    $averageGPA = week9_dbuts::average('Gpa');
    return response()->json([$averageGPA]);
}

public function countMhsByStatus(Request $request)
{
    // Validasi request
    $this->validate($request, [
        'status_akhir' => 'required|in:Lulus,Keluar/Mengundurkan Diri,Mengulang Karena Tidak Lulus Tugas Akhir,Tidak Aktif Mengulang TA (Mahasiswa Tidak Jelas),MD MABA,MD TDU setelah Cuti/TRM', // Sesuaikan dengan opsi nationality yang ada
    ]);

    // Menghitung jumlah responden berdasarkan nationality (negara asal).
    $status_akhir = $request->input('status_akhir');
    $rowCount = login_mhs::where('status_akhir', $status_akhir)->count();

    return response()->json($rowCount);
}
}
