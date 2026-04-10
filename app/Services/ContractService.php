<?php 

namespace App\Services;

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class ContractService {

    public static function generate($info)
    {
        $contract_file = $info->exhibition->contract;
        $exhibitor = $info->exhibitor;

        // 1. Template path
        $templatePath = public_path("assets/hop-dong/{$contract_file}");
        $tpl = new TemplateProcessor($templatePath);

        // 2. Fill data
        $tpl->setValue('company', $exhibitor->company ?? '');
        $tpl->setValue('address', $exhibitor->address ?? '');
        $tpl->setValue('fullname', $exhibitor->fullname ?? '');
        $tpl->setValue('phone', $exhibitor->phone ?? '');
        $tpl->setValue('booth', $info->booth ?? '');

        // 3. Tạo thư mục
        $dir = 'contracts/' . date('Y/m/d');
        if (!Storage::disk('public')->exists($dir)) {
            Storage::disk('public')->makeDirectory($dir);
        }

        $baseName = time() . "-" . str_slug($exhibitor->company);

        // 4. Tạo file DOCX tạm
        $tempDocx = sys_get_temp_dir() . "/{$baseName}.docx";
        $tpl->saveAs($tempDocx);

        // 5. Convert DOCX → PDF
        $tempPdfDir = sys_get_temp_dir();
        $command = "libreoffice --headless --convert-to pdf --outdir {$tempPdfDir} {$tempDocx}";
        exec($command, $output, $resultCode);

        if ($resultCode !== 0) {
            unlink($tempDocx);
            throw new \Exception("Convert DOCX to PDF failed");
        }

        $tempPdf = $tempPdfDir . "/{$baseName}.pdf";

        // 6. Lưu PDF vào storage
        $pdfPath = "{$dir}/{$baseName}.pdf";

        Storage::disk('public')->put(
            $pdfPath,
            file_get_contents($tempPdf)
        );

        // 7. Cleanup
        unlink($tempDocx);
        unlink($tempPdf);

        return [
            "file" => $baseName . '.pdf',
            "path" => $dir,
            "full_path" => $pdfPath
        ];
    }
}