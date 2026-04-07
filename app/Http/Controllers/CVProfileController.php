<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class CVProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();

        if (!$profile) {
            $profile = Profile::create([
                'nama' => 'Tion Hermawan',
                'nim' => '43240445',
                'alamat' => 'Cirebon, West Java',
                'email' => 'tionhermawan28@gmail.com',
                'telepon' => '085860406223',
                'bio' => 'Selected as a Google Student Ambassador (GSA) to act as a primary liaison between Google and the STMIK IKMI Cirebon community. Responsible for fostering a tech-driven ecosystem and empowering students through Google’s resources and programs.',
            ]);
        }

        $foto_url = asset('myfoto.jpeg');

        $pengalaman_kerja = [
            [
                'posisi' => 'Google Student Ambassador',
                'perusahaan' => 'Google (Seasonal) | Cirebon, West Java (Hybrid)',
                'tahun' => 'Sep 2025 - Present (8 mos)',
                'tanggung_jawab' => [
                    'Community Leadership: Leading and organizing workshops, seminars, and info sessions to introduce Google’s latest technologies and developer tools to 50+ students, 2 workshops.',
                    'Strategic Promotion: Actively promoting Google programs, certifications, and internship opportunities to help fellow students bridge the gap between academia and industry.',
                    'Tech Advocacy: Advocating for the adoption of Google Cloud and AI-driven tools to enhance data literacy and problem-solving skills among Information Systems students.',
                    'Collaboration: Coordinating with university faculty and student organizations to execute large-scale tech events and initiatives.'
                ]
            ]
        ];

        $pendidikan = [
            [
                'institusi' => 'STMIK IKMI Cirebon',
                'jurusan' => 'Information System',
                'tahun' => '2024 – 2028',
                'info_tambahan' => 'Relevant Coursework: Database Systems, Algorithm & Programming, Statistics, Business Intelligence.'
            ]
        ];

        $keahlian = ['Community Outreach', 'Public Speaking', 'Leadership', 'Event Planning', 'Project Management'];

        return view('welcome', compact('profile', 'foto_url', 'pengalaman_kerja', 'pendidikan', 'keahlian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'bio' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profile = Profile::first();

        if ($request->hasFile('foto')) {
            if ($profile && $profile->foto) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('photos/' . $profile->foto);
            }
            $fotoPath = $request->file('foto')->store('photos', 'public');
            $validatedData['foto'] = basename($fotoPath);
        }
        
        Profile::updateOrCreate(
            ['id' => $profile ? $profile->id : 1],
            $validatedData
        );

        return redirect()->route('cv.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function showPortofolio($slug)
    {
        if ($slug === 'web-design') {
            $data = [
                'title' => 'Proyek Desain Web',
                'description' => 'Ini adalah proyek desain web. Di dalamnya terdapat implementasi responsif menggunakan Bootstrap 5.3 untuk memastikan tampilan sempurna dari layar seluler hingga layar desktop besar berdasar prinsip Mobile First.'
            ];
        } else {
            abort(404, 'Proyek tidak ditemukan');
        }

        return view('portofolio-detail', compact('data', 'slug'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $profile = Profile::first();
        return view('profile-edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
