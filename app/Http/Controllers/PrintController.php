<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;

class PrintController extends Controller
{
    public function getStudentresult($id)
    {
        
    }

    public function getPrint()
    {
        try {
            $p = new \PDFlib();
            /* open new pdf file; insert  a file name to create the pdf on
                on disk */
            if($p->begin_document("", "") == 0)
            {
                die("Error: " . $p->get_errmsg());
            }

            $p->set_info("Creator", "hello.php");
            $p->set_info("Äuthor", "Ossaija ThankGod");
            $p->set_info("Title", "Hello World (php)!");

            $p->begin_page_ext(595, 842, "");
            $font = $p->load_font("Helvetica-Bold", "winansi", "");
            $p->setfont($font, 24.0);
            $p->set_text_pos(50, 700);
            $p->show("Hello World");
            $p->continue_text("(Says PHP)");
            $p->end_page_ext("");

            $p->end_document("");

            $buf = $p->get_buffer();
            $len = strlen($buf);

            header("Content-type: application/pdf");
            header("Content-length: $len");
            header("Content-Disposition: inline; filename=hello.pdf");
            print $buf;
        }
        catch (PDFlibException $e)
        {
            die("PDFlib exception occurred in hello sample:\n" .
                "[" . $e->get_errnum() . "]" . $e->get_apiname(). ":" .
                $e->get_errmsg() . "\n");
        }

        catch (Exception $e) 
        {
            die($e);
        }
        $p = 0;
    }
}
