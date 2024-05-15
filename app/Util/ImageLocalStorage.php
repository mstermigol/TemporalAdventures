<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Util;

use Illuminate\Http\Request;

class ImageLocalStorage
{
    public function storeAndGetPath(Request $request, string $folder): ?string
    {

        if ($request->hasFile('image')) {
            $filename = uniqid().'.'.$request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('public/'.$folder, $filename);
            $imagePath = '/storage/'.$folder.'/'.$filename;

            return $imagePath;
        }

        return null;

    }
}
