<?php

namespace App\Http\Controllers\Api\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Area;
use App\Models\Branch;
use App\Models\NextOfKin;
use App\Models\State;
use App\Models\User;

class BioController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'street' => 'sometimes',
            'street2' => 'sometimes',
            'city' => 'required',
            'state_id' => 'numeric',
            'area_id' => 'numeric',
            'phone' => 'numeric',
            'alt_phone' => 'nullable|numeric',
            'branch_id' => 'required|numeric',
            'sex' => 'required|string',
            'dob' => 'required|date',
        ]);

        $image_url = $currentPhoto = auth('api')->user()->image;
        //echo $currentPhoto;
         
        if (($request['image'] != $currentPhoto) && ($request['image'] != '')){
            $image = $request['id']."-".time().".".explode('/',explode(':', substr( $request['image'], 0, strpos($request['image'], ';')))[1])[1];

            \Image::make($request['image'])->save(public_path('img/profile/').$image);

            $image_url = $image;

            $old_image = public_path('img/profile/').$currentPhoto;

            if (file_exists($old_image)){ @unlink($old_image); }
        }


        $user = User::updateOrCreate(['email' => $request['email']],
            ['first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'street' => $request['street'],
            'street2' => $request['street2'],
            'city' => $request['city'],
            'state_id' => $request['state_id'],
            'area_id' => $request['area_id'],
            'personal_email' => $request['personal_email'],
            'phone' => $request['phone'],
            'alt_phone' => $request['alt_phone'],
            'branch_id' => $request['branch_id'],
            'department_id' => $request['department_id'],
            'sex' => $request['sex'],
            'dob' => $request['dob'],
            'image' => $image_url,
            'updated_at' => date('Y-m-d H:i:s'),
            //'error' => 'Test',
            ]
        );
        
        $user->dob = $request->input('dob');
        $user->save();
        
        $nok = NextOfKin::where('user_id', '=', $user->id)->count();
        if ($nok == 0){
            echo "No Next of Kin";
        }
        
        
        return response()->json([
            'added' => $user,
            'user' => User::where('id', auth('api')->id())->with('area')->with('branch')->with('state')->get(),
            'areas' => Area::select('name', 'id')->where('state_id', 25)->get(),
            'branches' => Branch::all(),
            'states' => State::where('country_id', 1)->get(),
            'nok' => NextOfKin::where('user_id', auth('api')->id())->get(),
            ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
