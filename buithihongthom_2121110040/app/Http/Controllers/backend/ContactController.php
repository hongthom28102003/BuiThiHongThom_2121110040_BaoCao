<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreContactRequest;
use App\Models\Link;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where('status','!=',0)->get();
        return view('backend.contact.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::all();
        $user = Contact::where('status', '2')->get();
        $html = "";
        foreach ($user as $item) {
            $html .= "<option value='$item->id'>$item->name</option>";
        }
        $replay_id = Contact::where('status', '2')->get();
        $html1 = "";
        foreach ($replay_id as $item) {
            $html1 .= "<option value='$item->id'>$item->name</option>";
        }
        return view('backend.contact.create', compact('contact', 'html', 'html1'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->user_id = $request->user_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->replay_id = $request->replay_id;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->created_by = 1;
        $contact->updated_by = 1;
        $contact->status =  $request->status;
        $contact->save();
        return redirect()->route('contact.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        return view('backend.contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        $contacts = Contact::where('status','=','2')->get();
        $html='';
        foreach($contacts as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.contact.edit',compact('html','contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Contact::find($id);
        $slider->name = $request->name;
        $slider->parent_id = $request->parent_id;
        $slider->slug = Str::slug($slider->name, '-');
        $slider->sort_order = $request->sort_order;
        $slider->metakey = $request->metakey;
        $slider->metadesc = $request->metades;
        $slider->updated_by = 1; //đăng nhập
        $slider->updated_at = date('Y-m-d H:i:s');
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $slider->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/slider '), $filename);
            $slider->image = $filename;
        }
        if ($slider->save()) {
            $link = Link::where([['type', '=', 1], ['table_id', '=', $id]])->first();
            $link->slug = $slider->slug;
            $link->save();
        }
        return redirect()->route('slider.index')->with('message', ['type' => 'succcess', 'msg' => 'Thành Công']);
        return redirect()->route('slider.index');
        return redirect()->route('slider.index')->with('message', ['type' => 'succcess', 'msg' => 'Thành Công']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if($contact == NULL)
        {
            return redirect()->route('contact.trash')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
        }
       if($contact->delete())
       {
            // có 2 điều kiện xóa: 
            $link = Link::where([['type','=',1],['table_id','=', $id]])->first();
            $link ->delete();
            print_r($link);
       }
       return redirect()->route('contact.trash')->with('message',['type' => 'danger','msg' =>'xóa khỏi CSDL thành công!']);
    }
    public function trash()
    {
        $contact = Contact::where('status',0)->get();
        return view('backend.contact.trash', compact ('contact')) ;
    }
    public function delete($id)
    {
        $contact = Contact::find($id);
        if($contact == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $contact ->updated_by = 1;//đăng nhập
       $contact ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $contact ->status =0;
       $contact->save();
       return redirect()->route('contact.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $contact = contact::find($id);
    //     $contact->status = 0;
    //     $contact->save();
    //     return redirect()->route('contact.index');    
    // }
   
    public function restore($id)
    {
        $contact = Contact::find($id);
        if($contact==null){
            return redirect()->route('contact.index')->with('message',['type' => 'success','msg' =>'Mẫu tin không tồn tại']);
        }
        $contact->status=2;
        $contact->updated_by=1;
        $contact->updated_at==date('Y-m-d H:i:s');
        $contact->save();
        return redirect()->route('contact.trash')->with('message',['type' => 'danger','msg' =>'Khôi phục thành công']);  
    }

    public function status($id)
    {
        $row = Contact::find($id);
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('contact.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }
}
