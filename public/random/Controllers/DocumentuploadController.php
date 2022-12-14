<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


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
        //Save Document Files Function
        $birthcertificate_file = $request->file('birthcertificate_file'); //File that will request
        $nbi_file = $request->file('nbi_file');
        $barangay_clearance_file = $request->file('barangay_clearance_file');
        $police_clearance_file = $request->file('police_clearance_file');
        $sss_file = $request->file('sss_file');
        $philhealth_file = $request->file('philhealth_file');
        $pag_ibig_file = $request->file('pag_ibig_file');

        $birthcertificate = time(). '_' . 'Birth_Certificate'. '.' .$birthcertificate_file->getClientOriginalExtension();//File name to store
        $path = $birthcertificate_file->storeAs('public/documents', $birthcertificate);//Storage of the file uploaded

        $nbi = time(). '_' . 'NBI_Clearance'. '.' .$nbi_file->getClientOriginalExtension();
        $path = $nbi_file->storeAs('public/documents', $nbi);

        $barangay_clearance = time(). '_' . 'Barangay_Clearance'. '.' .$barangay_clearance_file->getClientOriginalExtension();
        $path = $barangay_clearance_file->storeAs('public/documents', $barangay_clearance);

        $police_clearance = time(). '_' . 'Police_Clearance'. '.' .$police_clearance_file->getClientOriginalExtension();
        $path = $police_clearance_file->storeAs('public/documents', $police_clearance);

        $sss = time(). '_' . 'SSS_Form'. '.' .$sss_file->getClientOriginalExtension();
        $path = $sss_file->storeAs('public/documents', $sss);

        $philhealth = time(). '_' . 'Philhealth_Form'. '.' .$philhealth_file->getClientOriginalExtension();
        $path = $philhealth_file->storeAs('public/documents', $philhealth);

        $pag_ibig = time(). '_' . 'Pag_ibig_Form'. '.' .$pag_ibig_file->getClientOriginalExtension();
        $path = $pag_ibig_file->storeAs('public/documents', $pag_ibig);
        
        Document::create([
            'birthcertificate' => $birthcertificate, //Store in database (documents) //column name and file name to store
            'nbi_clearance' => $nbi,
            'barangay_clearance' => $barangay_clearance,
            'police_clearance' => $police_clearance,
            'sss_form' => $sss,
            'philhealth_form' => $philhealth,
            'pag_ibig_form' => $pag_ibig,
        ]);
        // return back();
        // return Redirect::to(url()->previous());//Return previous page
        echo "<script>setTimeout(function(){ window.location.reload(); }, 3000);</script>";
        return Redirect::to(url()->previous());//Return previous page
    }
}