<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Http\Controllers\Controller;
use Mail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.contact');
    }
     
    public function senmai(MailRequest $request)
    {
        //
        ini_set('max_execution_time', 300);
       $data = [
         'name'   => $request->name,
         'email'  => $request->email,
         'content'=> $request->content,
       ];
       
       Mail::send('email.sendToUser',$data,function($msg) use ($data){
         $msg->from('quanqb.it@gmail.com',"QV_Watch");
         $msg->to($data['email'])->subject('Cảm ơn bạn đã liên hệ với shop! tin nhắn sẽ được hồi âm trong vòng 24h');
       });
       
       Mail::send('email.sendToAdmin',$data,function($msg){
         $msg->from('quanqb.it@gmail.com',"QV_Watch");
         $msg->to('quanqb.it@gmail.com')->subject('khách hàng');
       });
       return redirect()->route('contact')->with(['flash_level'=>'result_msg','flash_massage'=>'Cảm ơn bạn đã liên hệ với chúng tôi!']);

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
