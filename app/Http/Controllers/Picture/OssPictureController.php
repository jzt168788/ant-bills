<?php
/**
 * Created by PhpStorm.
 * User: jinzhuotao
 * Date: 2016/12/25
 * Time: 上午10:50
 */

namespace App\Http\Controllers\Picture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \OSS;

require_once __DIR__.'/../../../../vendor/aliyuncs/oss-sdk-php/autoload.php';

class OssPictureController extends Controller
{

    private $ossClient = NULL;

    private $bucket    = NULL;

    /**
     * OssPictureController constructor.
     */
    public function __construct()
    {
        $env = \App::environment() === 'production' ? 'production' : 'dev';

        $config = config('accounts.'.$env.'.oss');
        $accessKeyId        = $config['accessKeyId'];
        $accessKeySecret    = $config['accessKeySecret'];
        $endpoint           = $config['endpoint'];

        $this->bucket       = 'ant-bills';  //私有读写

        $this->ossClient = new OSS\OssClient($accessKeyId, $accessKeySecret, $endpoint, $isCName = false, $securityToken = NULL);
    }

    /**
     * @param         $name
     * @param         $fileName
     * @param Request $request
     * @desc
     *
     * @author     Jinzhuotao
     */
    public function showPicture($name,$fileName,Request $request){
        $path = $name.'/'.$fileName;
        $ossClient = $this->ossClient;
        $ver = $request->input('v');
        if(!empty($ver)){
            $origin = $path.'?v='.$ver;
        }else{
            $origin = $path.'?v='.date('Ymd');
        }
        $etag = md5($origin);
        if(isset($_SERVER['HTTP_IF_NONE_MATCH'])){
            $old_etag = $_SERVER['HTTP_IF_NONE_MATCH'];
            if($old_etag == $etag){
                header("HTTP/1.1 304 Not Modified");
                exit;
            }
        }
        $meta = $ossClient->getObjectMeta($this->bucket, $path);

        $contentType = !empty($meta['content-type']) ? $meta['content-type'] : '';
        $contentLength = !empty($meta['content-length']) ? $meta['content-length'] : '';

        header("Content-type:".$contentType);
        header("Content-length:".$contentLength);
        header("Etag: " . $etag);

        echo $ossClient->getObject($this->bucket, $path);
        exit();
    }
}
