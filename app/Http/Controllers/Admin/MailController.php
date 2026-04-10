<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailTemplate;
use App\Models\EmailTemplateDetail;
use App\Helpers\LangHelper;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $this->html['q'] = $q = $request->q;

        $query = EmailTemplate::select('id', 'title', 'status')
                        ->whereHas('details', function($query) use ($q) {
                            $query->where('subject', 'LIKE', "%$q%")
                                ->orWhere('body', 'LIKE', "%$q%");
                        });

        $this->html['data'] = $query->orderByDesc('id')->paginate();

        return view('admin.mail.index', $this->html);
    }

    public function create(Request $request)
    {
        $this->html = [];

        if(!empty($request->id))
            $this->html['data'] = EmailTemplate::findOrFail($request->id);

        return view('admin.mail.create', $this->html);
    }

    public function store(Request $request, EmailTemplate $mail)
    {
        if(!empty($request->id))
            $mail = EmailTemplate::findOrFail($request->id);

        $mail->title  = $request->title;
        $mail->key    = $request->key;
        $mail->status = $request->boolean('status');

        \DB::beginTransaction();
        try {

            if($mail->save()) {

                if(empty($request->id)) {
                    
                    $data_insert = [];
                    
                    foreach(LangHelper::getLang() as $lang) {

                        $data_insert[] = [
                            'mail_id'    => $mail->id,
                            'lang_id'    => $lang->id,
                            'subject'    => $request->input('subject_'. $lang->id),
                            'body'       => $request->input('body_'. $lang->id),
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                        
                    }

                    if(EmailTemplateDetail::insert($data_insert)) {
                        \DB::commit();
                        return redirect()->route("mail.index")->with('success', "Thêm mới thành công");
                    }

                } else {

                    foreach(LangHelper::getLang() as $lang) {

                        $data_update = [
                            'subject'    => $request->input('subject_'. $lang->id),
                            'body'       => $request->input('body_'. $lang->id),
                            'updated_at' => now()
                        ];
                        
                        EmailTemplateDetail::where([
                            'mail_id' => $request->id,
                            'lang_id' => $lang->id
                        ])->update($data_update);

                    }

                    \DB::commit();
                    return back()->with("success", "Cập nhật thành công");

                }
                
            }

        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
            \DB::rollback();
            return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');

        }

        return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
    }

    public function preview(Request $request)
    {
        $this->html['mail'] = EmailTemplate::find($request->id);
        return view('admin.mail.preview', $this->html);
    }

    public function send(Request $request)
    {
        if($request->isMethod('post')) {
            $emails = $request->emails ?? [];
            $subject = $request->subject ?? null;
            $content = $request->content ?? null;

            if(count($emails) > 0 && !empty($subject) && !empty($content)) {
                foreach($emails as $email) {
                    \Mail::to($email)->cc(mail_cc())->queue(new \App\Mail\Send($subject, $content));
                }

                return sendResponse($subject, 'Đã kích hoạt quy trình gửi mail');
            }

            return sendError('Trường thông tin bị thiếu');
        }
        
        $this->html['users'] = User::status()->get();
        return view('admin.mail.send', $this->html);
    }

    public function activity(Request $request)
    {
        $log_mail = $this->log_mail->getLogs([
            'from' => convertToUtc('2026-03-27 00:00:00'),
            'to' => convertToUtc('2026-04-03 23:59:59'),
            'limit' => 100,
            'statuses' => 0
        ]);

        $this->html = [];

        if(!empty($log_mail['success']) && $log_mail['success']) {
            $this->html['data'] = $log_mail['data']['recipients'] ?? null;
        }

        return view('admin.mail.activity', $this->html);
    }

    public function detail(Request $request)
    {
        $log_mail = $this->log_mail->getDetailLogs([
            'messageID' => $request->id,
            'enableTracking' => true
        ]);

        $this->html = [];

        if(!empty($log_mail['success']) && $log_mail['success']) {
            $this->html['data'] = $log_mail['data'] ?? null;
        }

        return view('admin.mail.detail', $this->html);
    }
}
