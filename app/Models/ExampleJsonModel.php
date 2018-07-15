<?php

namespace App\Models;

// 모델상속 => PDO, Eloquent 둘다 연결해놓음
use App\Models\Model;

class ExampleJsonModel extends Model
{
	private $res = array( "error" => true, "message" => "", "record" => array() );

	public function getWideIPs( $params )
	{
        $page = $_GET['page'];
        $size = $_GET['size'];

		$data = [
            [id=>1, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>2, wideips =>"shared-vod-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>3, wideips =>"shared-img-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>4, wideips =>"shared-live-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>5, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>6, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>7, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>8, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>9, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>10, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>11, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>12, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>13, wideips =>"shared-live-cache-skcdn.com", "pools" => "kt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>14, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>15, wideips =>"shared-live-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>16, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>17, wideips =>"shared-live-cache-skcdn.com", "pools" => "kt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>18, wideips =>"shared-live-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>19, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>20, wideips =>"shared-live-cache-skcdn.com", "pools" => "kt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>21, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>22, wideips =>"shared-live-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>23, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>24, wideips =>"shared-live-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>25, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>26, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>27, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>28, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>29, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>30, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>31, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>32, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>33, wideips =>"shared-live-cache-skcdn.com", "pools" => "kt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>34, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>35, wideips =>"shared-live-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>36, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>37, wideips =>"shared-live-cache-skcdn.com", "pools" => "kt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>38, wideips =>"shared-live-cache-skcdn.com", "pools" => "lg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>39, wideips =>"shared-live-cache-skcdn.com", "pools" => "skt1-10G-Live\nskt2-10G-Live\nskt3-10G-Live\nkt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
            [id=>40, wideips =>"shared-live-cache-skcdn.com", "pools" => "kt1-10G-Live\nlg1-10G-Live", progress=>"12", gender=>"male", height=>1, col=>"red", dob=>"", driver=>1],
        ];
        
        // 전체페이지
        $num_records = count($data);
        $last_page = ceil($num_records/$size);

        // 
        $start = ( ($page-1) * $size );
        $num_records = array_slice($data, $start, $size);

        return ["last_page"=>$last_page, "data"=>$num_records];
	}

	public function getAddWideIPs( $params )
	{

		$data = [
            "list-1",
            "list-2",
            "list-3",
            "list-4",
        ];



		return ["wide_ip_list"=>$data];
	}

}
