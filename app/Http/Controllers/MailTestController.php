<?php

namespace App\Http\Controllers;

use App\Mail\MailWithAttachmentTest;
use App\Models\Addonservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use PDF;
use Illuminate\Support\Str;

class MailTestController extends Controller
{
    public function TestMail()
    {
        $filename = 'Invoice'.uniqid().Str::random(10).'.pdf';

        $name = "Myname";
        $pdf = $this->generatePdf();
        $filePath = storage_path('app/public/attachments/'.$filename);
        file_put_contents($filePath, $pdf );
        $content = ['name'=>$name,'pdf'=>$filePath];
        try {
           $status =  Mail::to('debasish.ghosh@technoexponent.co.in')->send(new MailWithAttachmentTest ($content));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function generatePdf()
    {
        $data = [
            'content1' => 'Sample PDF',
            'content2' => 'This is a sample PDF generated using Dompdf in Laravel.'
        ];

        // $pdf = new Dompdf();
        // $pdf->loadHtml(View::make('pdf.sample', $data));
        // $pdf->setPaper('A4');
        $pdf = PDF::loadView('PDF.TestAttachment',$data);
        $pdf->render();
        return $pdf->output();
        // return $pdf->download('_efilling.pdf');
    }
    public function generateSlug()
    {
        $package_name = Addonservice::where('id','>','100')->get();
                foreach ($package_name as $key => $value) {
                    $name = explode(' ', $value->service_name);
                    $name = implode('-', $name);
                    $name = strtolower($name);
                    Addonservice::where('id',$value->id)->update([
                        'slug'=>$name
                    ]);
                }
            }
}
