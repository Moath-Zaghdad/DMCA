<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{PrepareNoticeRequest};
use App\{Provider, Notice};
use Auth;
use Mail;

class NoticesController extends Controller
{
    /**
     * Create a new notices controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->notices;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::pluck('name', 'id');

        return view('notices.create', compact('providers'));
    }

    /**
     * Validate the request before submitting
     * 
     * @param  \App\Http\Requests\PrepareNoticeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(PrepareNoticeRequest $request)
    {
        $data = $request->all() + [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];
        $template = view()->file(app_path('Http/Templates/dmca.blade.php'), $data);
        session()->flash('dmca', $data);

        return view('notices.confirm',compact('template'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	$notice = $this->createNotice($request);

	Mail::send('emails.dmca', compact('notice'), function($message)use ($notice) {
		$message->to($notice->getRecipientEmail())
			->from($notice->getOwnerEmail())
			->subject('DMCA Notice');

	});
	
	return redirect('notices');
    }


    /**
     * Create and persist a new DMCA notice.
     * @param Request
     */
    public function createNotice(Request $request)
    {
        $data = session()->get('dmca');

	$notice = Notice::open($data)->useTemplate($request->template);

	$notice = Auth::user()->notices()->save($notice);

	return $notice;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
