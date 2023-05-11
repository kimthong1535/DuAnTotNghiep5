<?php

namespace App\Http\Controllers\Client;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Commemt;
class CommemtController extends Controller
{
    public function index(Request $request){
        $post_id = $request->post_id;
        $commemt = Commemt::join('users','tbl_comment.user_id','=','users.id')->where('commemt_post_id',$post_id)
        ->where('status','1')->get();
        
        $output = '';
        foreach($commemt as $key => $value){
          $output .= '
            <div class="media">
            <img src="/frontend/images/avt.jpg" class="align-self-start mr-3"
            style="width:60px;border-radius: 5px;">
            <div class="media-body">
              <h4>'.$value->name .'</h4>
              <p>'.$value->commemt.'</p>
            </div> 
          </div> ';
        }
        echo $output;
    }
    public function send_commemt(Request $request){
      $post_id = $request->post_id;
      $user_id = $request->user_id;
      $content = $request->commemt;
      $commemt = new Commemt();
      $commemt->commemt_post_id = $post_id;
      $commemt->user_id =  $user_id;
      $commemt->status = '1';
       $commemt->commemt_parent_commemt = '0';
      $commemt->commemt =  $content;
      // $commemt->created_at = Carbon::now('Asia/Ho_Chi_Minh');
      $commemt->save();
    }
    public function show_commemt(){
      $commemt = Commemt::join('users','tbl_comment.user_id','=','users.id')->join('tbl_post','tbl_comment.commemt_post_id','=','tbl_post.post_id')->get();
      return view('backend.commemt.list_commemt',compact('commemt'));
    }
    public function allow_commemt(Request $request){
        $data = $request->all();
        // $commemtId = Commemt::where('commemt_id',$data['commemt_id']) ;
        $commemt = Commemt::where('commemt_id',$data['commemt_id'])->update([
          'status' => $data['status']
        ]);
    }
    public function reply_commemt(Request $request){
      $data = $request->all();
      $commemt = Commemt::where('commemt_id',$data['commemt_id']);
      $commemt = new Commemt();
      $commemt->commemt = $data['commemt'];
      $commemt->commemt_post_id = $data['post_id'];
      $commemt->status = '1';
      $commemt->user_id = $request->user_id;
      $commemt->commemt_parent_commemt	 = $data['commemt_id'];
      $commemt->save();


    }
}
