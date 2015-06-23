<?php
use Illuminate\Support\Facades\Auth;
use App\Components\Dashboard\Models\Config;

/**
 * Get the information whether the current section is backend, admin or public
 * @return array
 */
if (!function_exists('current_section')) {
    function current_section()
    {
        if (Request::is('backend*') || Request::is('admin*')) {
            $link_type = 'backend';
            $theme = !is_null(env('THEME_BACKEND')) ? env('THEME_BACKEND') : 'default';
        } else {
            $link_type = 'frontend';
            $theme = !is_null(env('THEME_FRONTEND')) ? env('THEME_FRONTEND') : 'default';
        }
        return array($link_type, $theme);
    }
}
/**
 * Current User
 * @return object
 */
if (!function_exists('current_user')) {
    function current_user()
    {
        if (Auth::check()) {
            return Auth::user();
        }
        return NULL;
    }
}

/**
 * Check Backend Permission
 * @return boolean
 */
if (!function_exists('is_admin')) {
    function is_admin()
    {
        if (Auth::check() and Auth::user()->role_id == 1) {
            return true;
        }
        return false;
    }
}

/**
 * Check User Permission
 * @return boolean
 */
if (!function_exists('is_user')) {
    function is_user()
    {
        if (Auth::check() and Auth::user()->role_id == 2) {
            return true;
        }
        return false;
    }
}

/**
 * Convert state
 * @param int
 * @return string
 */
if( !function_exists('sate_convert')) {
    function sate_convert($state) {
        switch($state) {
            case 1:
                return "Publish"; break;
            default :
                return "UnPublish"; break;
        }
    }
}
/**
 * Convert state for insight
 * @param int
 * @return string
 */
if( !function_exists('sate_insight_convert')) {
    function sate_insight_convert($state) {
        switch($state) {
            case -1:
                return "Dennied"; break;
            case 1:
                return "Accepted"; break;
            default :
                return "Publish"; break;
        }
    }
}
/**
 * Get current template path
 * @return string
 */
if (!function_exists('get_template_directory')) {
    function get_template_directory() {
        list($type, $theme) = current_section();
        return asset('templates/'.$type.'/'.$theme);
    }
}

if( !function_exists('format_time')) {
    /**
     * Convert int to time
     * @param $t
     * @param string $f
     * @return string
     */
    function format_time($t) // t = seconds, f = separator
    {
        $time_string = "";
        if(floor($t/3600) > 0) {
            $time_string .= floor($t/3600) . ' hours ';
        }
        if(($t/60)%60 > 0){
            $time_string .= ($t/60)%60 . ' minutes ';
        }
        if( $t%60 >= 0) {
            $time_string .= $t%60 . 's';
        }
        return $time_string;
    }
}

/**
 * Address Helper
 *
 */
if( !function_exists('list_country_cities')) {
    function list_country_cities($key = 0) {
        $xml = new SimpleXMLElement(file_get_contents('../app/Libraries/regions.xml'));
        $countries = [];
        $i=1;
        foreach ( $xml->Children as $region ) {
            foreach ( $region as $continent ) {
                foreach ( $continent->Children as $countryList ) {
                    foreach ( $countryList as $country ) {
                        $countries[$i]['id'] = $i;
                        $countries[$i]['name'] = $country->Name;
                        $cities = [];
                        //$cities[''] = 'City';
                        $j=1;
                        foreach ( $country->Children as $cityList ) {
                            foreach ( $cityList as $city ) {

                                $cities[$j] = $city->Name;
                                $j++;
                            }
                        }
                        $countries[$i]['city'] = $cities;
                        $i++;
                    }
                }
            }
        }


        usort($countries, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        // usort messes up the array indexes, so we'll fix it manually
        $result = [];
        foreach ($countries as $country) {
            $result[$country['id']] = $country;
        }

        return $result;
    }
}
if( !function_exists('list_countries')) {
    function list_countries($country_id = 0) {
        $listCountries = [];
        $listCountries[0]='Country';
        $listCountryCities= list_country_cities();
        foreach($listCountryCities as $concity){
            $listCountries[$concity['id']] = $concity['name'];
        }
        if($country_id > 0) {
            return $listCountries[$country_id];
        }
        return $listCountries;
    }
}
if( !function_exists('list_cities')) {
    function list_cities($country_id = 0, $city_id = 0) {
        $uk_city=array('Bath','Birmingham','Bradford','Brighton and Hove','Bristol','Cambridge',
                    'Canterbury','Carlisle','Chester','Chichester','Coventry','Derby','Durham','Ely','Exeter',
                    'Gloucester','Hereford','Kingston upon Hull','Lancaster','Leeds','Leicester',
                    'Lichfield','Lincoln','Liverpool','City of London','Manchester','Newcastle upon Tyne',
                    'Norwich','Nottingham','Oxford','Peterborough','Plymouth','Portsmouth',
                    'Preston','Ripon','Salford','Salisbury','Sheffield','Southampton',
                    'St Albans','Stoke-on-Trent','Sunderland','Truro','Wakefield','Wells','Westminster',
                    'Winchester','Wolverhampton','Worcester','York','Bangor','Cardiff','Newport','St Davids',
                    'Swansea','Aberdeen','Dundee','Edinburgh','Glasgow','Inverness','Stirling',
                    'Armagh','Belfast','Londonderry','Lisburn','Newry');
       $listCountryCities= list_country_cities();
        $listCities=[];
        $listCities[0] = 'City';
        if($country_id > 0) {
            foreach($listCountryCities[$country_id]['city'] as $key => $city){
               
                if($country_id==163){
                   for($i=1;$i<=count($uk_city); $i++){
                    $listCities[$i] = $uk_city[$i-1];
                   }  
                }else{
                    $listCities[$key] = $city;
                }
                
            }
        }
        if($country_id > 0 && $city_id > 0) {
            return $listCities[$city_id];
        }
        
        return $listCities;
    }
}
if( !function_exists('list_ajax_cities')) {
    function list_ajax_cities($country_id = 0) {
        $uk_city=['Bath','Birmingham','Bradford','Brighton and Hove','Bristol','Cambridge',
                    'Canterbury','Carlisle','Chester','Chichester','Coventry','Derby','Durham','Ely','Exeter',
                    'Gloucester','Hereford','Kingston upon Hull','Lancaster','Leeds','Leicester',
                    'Lichfield','Lincoln','Liverpool','City of London','Manchester','Newcastle upon Tyne',
                    'Norwich','Nottingham','Oxford','Peterborough','Plymouth','Portsmouth',
                    'Preston','Ripon','Salford','Salisbury','Sheffield','Southampton',
                    'St Albans','Stoke-on-Trent','Sunderland','Truro','Wakefield','Wells','Westminster',
                    'Winchester','Wolverhampton','Worcester','York','Bangor','Cardiff','Newport','St Davids',
                    'Swansea','Aberdeen','Dundee','Edinburgh','Glasgow','Inverness','Stirling',
                    'Armagh','Belfast','Londonderry','Lisburn','Newry'];
        $listCountryCities= list_country_cities();
        $listCities=[];
        $listCities[0]['id'] = 0;
        $listCities[0]['name'] = array(0=>'City');
        if($country_id > 0){
            foreach($listCountryCities[$country_id]['city'] as $key => $city){
                if($country_id==163){
                   for($i=1;$i<=count($uk_city);$i++){
                    $listCities[$i]['id'] = $i; 
                    $listCities[$i]['name'] = array($uk_city[$i-1]);
                   }
                }else{
                    $listCities[$key]['id'] = $key; ;
                    $listCities[$key]['name'] = $city;
                }
                
            }
        }
        return $listCities;
    }
}
/*if( !function_exists('list_countries')) {
    function list_countries($key = 0) {
        $xml = new SimpleXMLElement(file_get_contents('../app/Libraries/regions.xml'));
        $countries = [];
        $countries[''] = 'Country';
        $i=1;
        foreach ( $xml->Children as $region ) { // iterate through all the regions
            foreach ( $region as $continent ) {
                foreach ( $continent->Children as $countryList ) {
                    foreach ( $countryList as $country ) {
                        $countries[$i] = $country->Name;
                        $i++;
                    }
                }
            }
        }
        return $countries;
    }
}*/

if( !function_exists('rate_convert')) {
    /**
     * Convert rate number to star symbol
     * @param int $num
     * @param int $rate
     * @return string
     */
    function rate_convert($num = 0, $rate = 5) {
        $str = "";
        for($i = 0; $i < (int)$num; $i++) {
            $str .= '<i class="icon-star"></i>';
        }
        for($j = (int)$num; $j < $rate; $j++) {
            $str .= '<i class="icon-star-empty"></i>';
        }
        return $str;
    }
}
/**
 * List day, month, year, day of week, list hour, list minute Helper
 *
 */
if( !function_exists('list_days')) {
    function list_days($key = 0) {
        $lists =  ['' => 'Day', '01' => '01', '02' => '02','03' => '03', '04' => '04','05' => '05', '06' => '06','07' => '07', '08' => '08','09' => '09', '10' => '10','11' => '11', '12' => '12','13' => '13', '14' => '14','15' => '15', '16' => '16','17' => '17', '18' => '18','19' => '19', '20' => '20','21' => '21', '22' => '22','23' => '23','24' => '24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31'];
        if($key > 0) {
            return $lists[$key];
        }
        return $lists;
    }
}
if( !function_exists('list_months')) {
    function list_months($key = 0) {
        $lists =  ['' => 'Month', '01' => 'January', '02' => 'February','03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June','07' => 'July', '08' => 'August','09' => 'September', '10' => 'October','11' => 'November', '12' => 'December'];
        if($key > 0) {
            return $lists[$key];
        }
        return $lists;
    }
}
if( !function_exists('list_years')) {
    function list_years($key = 0) {
        $years = range(1901,date("Y"));
        $lists = array() ;
        if($key == 0) {
            $lists['']='Year';
        }
        foreach($years as $year){
           $lists[$year]=$year ;
        }

        return $lists;

    }
}

if( !function_exists('list_dayofweeks')) {
    function list_dayofweeks() {
        $lists = ['monday'=>'Monday','tuesday'=>'Tuesday','wednesday'=>'Wednesday','thursday'=>'Thursday','friday'=>'Friday','saturday'=>'Saturday','sunday'=>'Sunday'];
        return $lists;
    }
}
if( !function_exists('list_hours')) {
    function list_hours() {
        $lists =  ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23'];
        return $lists;
    }
}
if( !function_exists('list_minutes')) {
    function list_minutes() {
        $lists =  ['00'=>'00','15'=>'15','30'=>'30','45'=>'45'];
        return $lists;
    }
}
/**
 * List timezone Helper
 *
 */
 if( !function_exists('list_timezone')) {
    function list_timezone() {
        $tzlist = array(
            '(UTC-11:00) Midway Island' => 'Pacific/Midway',
            '(UTC-11:00) Samoa' => 'Pacific/Samoa',
            '(UTC-10:00) Hawaii' => 'Pacific/Honolulu',
            '(UTC-09:00) Alaska' => 'US/Alaska',
            '(UTC-08:00) Pacific Time (US &amp; Canada)' => 'America/Los_Angeles',
            '(UTC-08:00) Tijuana' => 'America/Tijuana',
            '(UTC-07:00) Arizona' => 'US/Arizona',
            '(UTC-07:00) Chihuahua' => 'America/Chihuahua',
            '(UTC-07:00) La Paz' => 'America/Chihuahua',
            '(UTC-07:00) Mazatlan' => 'America/Mazatlan',
            '(UTC-07:00) Mountain Time (US &amp; Canada)' => 'US/Mountain',
            '(UTC-06:00) Central America' => 'America/Managua',
            '(UTC-06:00) Central Time (US &amp; Canada)' => 'US/Central',
            '(UTC-06:00) Guadalajara' => 'America/Mexico_City',
            '(UTC-06:00) Mexico City' => 'America/Mexico_City',
            '(UTC-06:00) Monterrey' => 'America/Monterrey',
            '(UTC-06:00) Saskatchewan' => 'Canada/Saskatchewan',
            '(UTC-05:00) Bogota' => 'America/Bogota',
            '(UTC-05:00) Eastern Time (US &amp; Canada)' => 'US/Eastern',
            '(UTC-05:00) Indiana (East)' => 'US/East-Indiana',
            '(UTC-05:00) Lima' => 'America/Lima',
            '(UTC-05:00) Quito' => 'America/Bogota',
            '(UTC-04:00) Atlantic Time (Canada)' => 'Canada/Atlantic',
            '(UTC-04:30) Caracas' => 'America/Caracas',
            '(UTC-04:00) La Paz' => 'America/La_Paz',
            '(UTC-04:00) Santiago' => 'America/Santiago',
            '(UTC-03:30) Newfoundland' => 'Canada/Newfoundland',
            '(UTC-03:00) Brasilia' => 'America/Sao_Paulo',
            '(UTC-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
            '(UTC-03:00) Georgetown' => 'America/Argentina/Buenos_Aires',
            '(UTC-03:00) Greenland' => 'America/Godthab',
            '(UTC-02:00) Mid-Atlantic' => 'America/Noronha',
            '(UTC-01:00) Azores' => 'Atlantic/Azores',
            '(UTC-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
            '(UTC+00:00) Casablanca' => 'Africa/Casablanca',
            '(UTC+00:00) Edinburgh' => 'Europe/London',
            '(UTC+00:00) Greenwich Mean Time : Dublin' => 'Etc/Greenwich',
            '(UTC+00:00) Lisbon' => 'Europe/Lisbon',
            '(UTC+00:00) London' => 'Europe/London',
            '(UTC+00:00) Monrovia' => 'Africa/Monrovia',
            '(UTC+00:00) UTC' => 'UTC',
            '(UTC+01:00) Amsterdam' => 'Europe/Amsterdam',
            '(UTC+01:00) Belgrade' => 'Europe/Belgrade',
            '(UTC+01:00) Berlin' => 'Europe/Berlin',
            '(UTC+01:00) Bern' => 'Europe/Berlin',
            '(UTC+01:00) Bratislava' => 'Europe/Bratislava',
            '(UTC+01:00) Brussels' => 'Europe/Brussels',
            '(UTC+01:00) Budapest' => 'Europe/Budapest',
            '(UTC+01:00) Copenhagen' => 'Europe/Copenhagen',
            '(UTC+01:00) Ljubljana' => 'Europe/Ljubljana',
            '(UTC+01:00) Madrid' => 'Europe/Madrid',
            '(UTC+01:00) Paris' => 'Europe/Paris',
            '(UTC+01:00) Prague' => 'Europe/Prague',
            '(UTC+01:00) Rome' => 'Europe/Rome',
            '(UTC+01:00) Sarajevo' => 'Europe/Sarajevo',
            '(UTC+01:00) Skopje' => 'Europe/Skopje',
            '(UTC+01:00) Stockholm' => 'Europe/Stockholm',
            '(UTC+01:00) Vienna' => 'Europe/Vienna',
            '(UTC+01:00) Warsaw' => 'Europe/Warsaw',
            '(UTC+01:00) West Central Africa' => 'Africa/Lagos',
            '(UTC+01:00) Zagreb' => 'Europe/Zagreb',
            '(UTC+02:00) Athens' => 'Europe/Athens',
            '(UTC+02:00) Bucharest' => 'Europe/Bucharest',
            '(UTC+02:00) Cairo' => 'Africa/Cairo',
            '(UTC+02:00) Harare' => 'Africa/Harare',
            '(UTC+02:00) Helsinki' => 'Europe/Helsinki',
            '(UTC+02:00) Istanbul' => 'Europe/Istanbul',
            '(UTC+02:00) Jerusalem' => 'Asia/Jerusalem',
            '(UTC+02:00) Kyiv' => 'Europe/Helsinki',
            '(UTC+02:00) Pretoria' => 'Africa/Johannesburg',
            '(UTC+02:00) Riga' => 'Europe/Riga',
            '(UTC+02:00) Sofia' => 'Europe/Sofia',
            '(UTC+02:00) Tallinn' => 'Europe/Tallinn',
            '(UTC+02:00) Vilnius' => 'Europe/Vilnius',
            '(UTC+03:00) Baghdad' => 'Asia/Baghdad',
            '(UTC+03:00) Kuwait' => 'Asia/Kuwait',
            '(UTC+03:00) Minsk' => 'Europe/Minsk',
            '(UTC+03:00) Nairobi' => 'Africa/Nairobi',
            '(UTC+03:00) Riyadh' => 'Asia/Riyadh',
            '(UTC+03:00) Volgograd' => 'Europe/Volgograd',
            '(UTC+03:30) Tehran' => 'Asia/Tehran',
            '(UTC+04:00) Abu Dhabi' => 'Asia/Muscat',
            '(UTC+04:00) Baku' => 'Asia/Baku',
            '(UTC+04:00) Moscow' => 'Europe/Moscow',
            '(UTC+04:00) Muscat' => 'Asia/Muscat',
            '(UTC+04:00) St. Petersburg' => 'Europe/Moscow',
            '(UTC+04:00) Tbilisi' => 'Asia/Tbilisi',
            '(UTC+04:00) Yerevan' => 'Asia/Yerevan',
            '(UTC+04:30) Kabul' => 'Asia/Kabul',
            '(UTC+05:00) Islamabad' => 'Asia/Karachi',
            '(UTC+05:00) Karachi' => 'Asia/Karachi',
            '(UTC+05:00) Tashkent' => 'Asia/Tashkent',
            '(UTC+05:30) Chennai' => 'Asia/Calcutta',
            '(UTC+05:30) Kolkata' => 'Asia/Kolkata',
            '(UTC+05:30) Mumbai' => 'Asia/Calcutta',
            '(UTC+05:30) New Delhi' => 'Asia/Calcutta',
            '(UTC+05:30) Sri Jayawardenepura' => 'Asia/Calcutta',
            '(UTC+05:45) Kathmandu' => 'Asia/Katmandu',
            '(UTC+06:00) Almaty' => 'Asia/Almaty',
            '(UTC+06:00) Astana' => 'Asia/Dhaka',
            '(UTC+06:00) Dhaka' => 'Asia/Dhaka',
            '(UTC+06:00) Ekaterinburg' => 'Asia/Yekaterinburg',
            '(UTC+06:30) Rangoon' => 'Asia/Rangoon',
            '(UTC+07:00) Bangkok' => 'Asia/Bangkok',
            '(UTC+07:00) Hanoi' => 'Asia/Bangkok',
            '(UTC+07:00) Jakarta' => 'Asia/Jakarta',
            '(UTC+07:00) Novosibirsk' => 'Asia/Novosibirsk',
            '(UTC+08:00) Beijing' => 'Asia/Hong_Kong',
            '(UTC+08:00) Chongqing' => 'Asia/Chongqing',
            '(UTC+08:00) Hong Kong' => 'Asia/Hong_Kong',
            '(UTC+08:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
            '(UTC+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
            '(UTC+08:00) Perth' => 'Australia/Perth',
            '(UTC+08:00) Singapore' => 'Asia/Singapore',
            '(UTC+08:00) Taipei' => 'Asia/Taipei',
            '(UTC+08:00) Ulaan Bataar' => 'Asia/Ulan_Bator',
            '(UTC+08:00) Urumqi' => 'Asia/Urumqi',
            '(UTC+09:00) Irkutsk' => 'Asia/Irkutsk',
            '(UTC+09:00) Osaka' => 'Asia/Tokyo',
            '(UTC+09:00) Sapporo' => 'Asia/Tokyo',
            '(UTC+09:00) Seoul' => 'Asia/Seoul',
            '(UTC+09:00) Tokyo' => 'Asia/Tokyo',
            '(UTC+09:30) Adelaide' => 'Australia/Adelaide',
            '(UTC+09:30) Darwin' => 'Australia/Darwin',
            '(UTC+10:00) Brisbane' => 'Australia/Brisbane',
            '(UTC+10:00) Canberra' => 'Australia/Canberra',
            '(UTC+10:00) Guam' => 'Pacific/Guam',
            '(UTC+10:00) Hobart' => 'Australia/Hobart',
            '(UTC+10:00) Melbourne' => 'Australia/Melbourne',
            '(UTC+10:00) Port Moresby' => 'Pacific/Port_Moresby',
            '(UTC+10:00) Sydney' => 'Australia/Sydney',
            '(UTC+10:00) Yakutsk' => 'Asia/Yakutsk',
            '(UTC+11:00) Vladivostok' => 'Asia/Vladivostok',
            '(UTC+12:00) Auckland' => 'Pacific/Auckland',
            '(UTC+12:00) Fiji' => 'Pacific/Fiji',
            '(UTC+12:00) International Date Line West' => 'Pacific/Kwajalein',
            '(UTC+12:00) Kamchatka' => 'Asia/Kamchatka',
            '(UTC+12:00) Magadan' => 'Asia/Magadan',
            '(UTC+12:00) Marshall Is.' => 'Pacific/Fiji',
            '(UTC+12:00) New Caledonia' => 'Asia/Magadan',
            '(UTC+12:00) Solomon Is.' => 'Asia/Magadan',
            '(UTC+12:00) Wellington' => 'Pacific/Auckland',
            '(UTC+13:00) Nuku\'alofa' => 'Pacific/Tongatapu'
        );
        $lists = array();
        foreach ($tzlist as $key => $value) {
            //$offset = timezone_offset_get(new DateTimeZone($tzl), new \DateTime('2015-01-01', new \DateTimeZone('UTC'))) / 3600;
            //$offset = $offset >= 0 ? '+' . $offset : $offset;
            $lists[$value] = $key;
        }

        //asort($lists);

        return $lists;
    }
}

/**
 * List Experience
 */
if( !function_exists('list_experiences')) {
    function list_experiences() {
        return [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5+' => '5+',
            '10+' => '10+',
            '15+' => '15+'
        ];
    }
}

/**
 * Get config value
 */

if( !function_exists('get_config')) {

    function get_config($key, $default = '') {
        $rs = Config::select('value')->where('key', $key)->first();
        return is_null($rs) ? $default : $rs->value;
    }

}



if( !function_exists('select_durations')) {

    function select_durations($min, $max, $distance = 15) {
        $lists = [];

        /* This saved me from an infinite loop when there was a 0 in database - Roman */
        if (!$distance <= 0) $distance = 15;

        while($min <= $max ) {
            $lists[$min] = $min.' minutes';
            $min += $distance;
        }
        return $lists;
    }

}
