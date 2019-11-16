<?php

namespace Omatech\VendorVersion;

class VendorVersion
{
    public $installed;
    public $versions;
    public $errorMessage='';

    public function init ($root_folder)
    {
        $file=$root_folder.'/vendor/composer/installed.json';
        if (file_exists($file))
        {
            $json=file_get_contents($file);
            if ($json)
            {
                $this->installed=json_decode($json, true);
                //print_r($this->installed);die;
                if ($this->installed)
                {
                    foreach ($this->installed as $installed)
                    {
                        $this->versions[$installed['name']]=$installed['version'];
                    }
                }
        
            }
            else
            {
                $this->errorMessage="Problem getting installed.json from $file\n";
                return false;
            }
        }
        else
        {
            $this->errorMessage="File $file not found\n";
            return false;
        }    
    }

    public function isInstalled ($name)
    {
        return (array_key_exists($name, $this->versions));
    }

    public function checkMinVersion ($name, $min_version)
    {
        if (isset($this->versions[$name]))
        {
            $res=version_compare($this->versions[$name], $min_version);
            if ($res>=0) return true;
        }
        return false;
    }

    public function getVersion ($name)
    {
        if (isset($this->versions[$name]))
        {
            return $this->versions[$name];
        }
        return false;
    }


}
