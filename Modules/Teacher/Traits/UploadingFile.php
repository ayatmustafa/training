<?php

namespace Modules\Teacher\Traits;

Trait  UploadingFile
{
     function saveFiles($file,$folder)
{  
    $file_extension = $file->getClientOriginalExtension();
    $file_name=time().".".$file_extension;
    $path=$folder;
    $file->move($path.$file_name);
    
    return $file_name;
}

}