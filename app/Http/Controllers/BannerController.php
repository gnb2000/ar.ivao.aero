<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\StaffMember, App\Models\User, App\Models\EventBanner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function addBanner(Request $request)
    {
        if(! empty($request->all()))
        {
            $target_dir = "/var/www/vhosts/ar.ivao.aero/files.ar.ivao.aero/Eventos/Images/";
            $target_dir2 = "/var/www/vhosts/ar.ivao.aero/files.ar.ivao.aero/Eventos/Images/Thumb/";

            $anyoCarpeta = date('m') == 12 ? date('Y') + 1 : date('Y');

            $name = $request->Codigo;
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $newName = $name.'.'.$extension;
            
            $target_file = $target_dir . $newName;
            
            if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png')
            {
                $imagen = $request->imagen == '' ? $request->file('imagen')->getClientOriginalName()
                                                 : $request->imagen;
            
                if($request->file('imagen')->isValid())
                {
                    if($request->tipo == 1)
                    {
                        if($request->imagen->storeAs('Eventos/Images', $newName, 'files'))
                        {
                            $errExitoImage = "Image URL: https://files.ar.ivao.aero/Eventos/Images/"
                                             .$request->imagen->getClientOriginalName();

                            $img = Image::make($request->file('imagen')->getRealPath())->encode('jpeg');
                            $width = $img->width();
                            $height = $img->height();

                            $width *= 0.5; $height *= 0.5;
                            $img->resize($width, $height)->save($target_dir2.$newName);                        
                            $evento = $request->Nombre;

                            $banner = new EventBanner();
                            $banner->Code = $request->Codigo;
                            $banner->Event = $evento;
                            $banner->File =  $newName;
                            $banner->Type = $request->tipo;

                            if($banner->save()) flash()->success('Banner subido.<br>'.$errExitoImage)->important();
                            else flash()->error($banner->errors()->first())->important();
                        }
                    }
                    else if($request->imagen->storeAs('Tours/'.$anyoCarpeta, $newName, 'files'))
                    {
                        $target_dir = "/var/www/vhosts/ar.ivao.aero/files.ar.ivao.aero/Tours/$anyoCarpeta/";
                        $target_dir2 = "/var/www/vhosts/ar.ivao.aero/files.ar.ivao.aero/Tours/$anyoCarpeta/Thumb/";

                        $errExitoImage = 'Image URL: https://files.ar.ivao.aero/Tours/'.$anyoCarpeta.'/'
                                         .$request->imagen->getClientOriginalName();

                        $img = Image::make($request->file('imagen')->getRealPath())->encode('jpeg');
                        $width = $img->width();
                        $height = $img->height();

                        $width *= 0.5; $height *= 0.5;
                        $img->resize($width, $height)->save($target_dir2.$newName);                        
                        $evento = $request->Nombre;

                        $banner = new EventBanner();
                        $banner->Code = $request->Codigo;
                        $banner->Event = $evento;
                        $banner->File =  $newName;
                        $banner->Type = $request->tipo;

                        if($banner->save()) flash()->success('Banner subido.<br>'.$errExitoImage)->important();
                        else flash()->error($banner->errors()->first())->important();
                    }
                }
            } 
            else 
            {
                flash('error', 'No es un archivo admitido (jpg, jpeg o png).');
            }

            return redirect()->action('EventController@add', NULL);
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.Eventos.banner', compact('user', 'staffMembers', 'isADM'));
        }
    }
}