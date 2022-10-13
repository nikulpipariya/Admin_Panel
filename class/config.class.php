<?php
class Config extends Db{

    public $siteSettings;

    public function __construct()
    {
        $settings =  Db::select('settings');
        $this->siteSettings = array();

        foreach($settings as $key=>$value){
            $name = $value['name'];
            $value = $value['value'];
            $this->siteSettings[$name] = $value;
        }
    }
    public function get_site_url(){
        return $this->siteSettings['siteurl'];
    }
    public function settings()
    {
        define('SITEURL',$this->siteSettings['siteurl']);
        define('CURRENCY',$this->siteSettings['currency']);
    }

    public function get_settings()
    {
        return $this->siteSettings;
    }

    public function set_settings($value,$name)
    {
        /*
        * Update Query
        * @param tablename (string)
        * @param data (array)
        * @param where (array)
        */

        $updateSetting = Db::update('settings',array("value"=>"$value"),array("name"=>"$name"));
        if($updateSetting){
            return true;
        }else{
            return false;
        }
    }
}