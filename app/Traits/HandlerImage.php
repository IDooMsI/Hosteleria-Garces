<?php 
namespace App\Traits;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait HandlerImage{

        public static function createImage(Request $request, $work = null, $publication = null)
        {
            Validator::make($request->all(), [
                'img' => 'max:3000|mimes:jpeg,bmp,png,jpg',
            ]);
            
            if ($work != null) {
                $modelo = $work; 
            }else{
                $modelo = $publication;
            }

            $position = 0;
            foreach ($request['img'] as $key) {
                $file = $key;
                $name = $modelo->id."-"."-" . $position++ . "." . $file->extension();
                $path = $file->storeAs('images', $name, 'public');
                // $path = 'images/' . $name;
                // move_uploaded_file($file, "../public_html/storage/$path");
                if(isset($work)){
                    $image = Image::create([
                        'name' => $path,
                        'work_id' => $modelo->id,
                        ]);
                }else{
                    $image = Image::create([
                        'name' => $path,
                        'publication_id' => $modelo->id,
                    ]);
                }
            }
            return $image;
        }

    }

?>