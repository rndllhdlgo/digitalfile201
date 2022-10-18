<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentuploadController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $birthcertificate_file = $request->file('birthcertificate_file');
        $nbi_file = $request->file('nbi_file');
        $barangay_clearance_file = $request->file('barangay_clearance_file');
        $police_clearance_file = $request->file('police_clearance_file');
        $sss_file = $request->file('sss_file');
        $philhealth_file = $request->file('philhealth_file');
        $pag_ibig_file = $request->file('pag_ibig_file');

        $birthcertificate = time(). '.' . 'Birth_Certificate'. '.' .$birthcertificate_file->getClientOriginalExtension();
        $path = $birthcertificate_file->storeAs('public', $birthcertificate);

        $nbi = time(). '.' . 'NBI_Clearance'. '.' .$nbi_file->getClientOriginalExtension();
        $path = $nbi_file->storeAs('public', $nbi);

        $barangay_clearance = time(). '.' . 'Barangay_Clearance'. '.' .$barangay_clearance_file->getClientOriginalExtension();
        $path = $barangay_clearance_file->storeAs('public', $barangay_clearance);

        $police_clearance = time(). '.' . 'Police_Clearance'. '.' .$police_clearance_file->getClientOriginalExtension();
        $path = $police_clearance_file->storeAs('public', $police_clearance);

        $sss = time(). '.' . 'SSS_Form'. '.' .$sss_file->getClientOriginalExtension();
        $path = $sss_file->storeAs('public', $sss);

        $philhealth = time(). '.' . 'Philhealth_Form'. '.' .$philhealth_file->getClientOriginalExtension();
        $path = $philhealth_file->storeAs('public', $philhealth);

        $pag_ibig = time(). '.' . 'Pag_ibig_Form'. '.' .$pag_ibig_file->getClientOriginalExtension();
        $path = $pag_ibig_file->storeAs('public', $pag_ibig);
        
        Document::create([
            'birthcertificate' => $birthcertificate,
            'nbi_clearance' => $nbi,
            'barangay_clearance' => $barangay_clearance,
            'police_clearance' => $police_clearance,
            'sss_form' => $sss,
            'philhealth_form' => $philhealth,
            'pag_ibig_form' => $pag_ibig,
        ]);
        return back();
    }
}