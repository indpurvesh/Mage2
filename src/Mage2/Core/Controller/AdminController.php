<?php

namespace Mage2\Core\Controller;

use App\Http\Controllers\Controller;
use Mage2\Core\Model\Extension;

class AdminController extends Controller
{
        public function getSystemConfigs() {
            $settings = [];
            $extensions = Extension::all();
            foreach($extensions as $extension) {
                $settings = array_replace_recursive(include base_path($extension->path . "/config/system.php"),$settings);

            }
            return $settings;

        }




}
