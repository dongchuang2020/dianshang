<?php

namespace App\Http\Controllers;
require 'vendor/autoload.php';
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alipay\EasySDK\Kernel\Factory;
use Alipay\EasySDK\Kernel\Config;

class ZhiController extends Controller
{
    //
    function zhi(){
        $result = Factory::payment()->common()->create("iPhone6 16G", "20200326235526001", "88.88", "2088002656718920");

        //3. 处理响应或异常
        if (!empty($result->code) && $result->code == 10000) {
            echo "调用成功". PHP_EOL;
        } else {
            echo "调用失败，原因：". $result->msg."，".$result->sub_msg.PHP_EOL;
        }
    }
    function getOptions()
    {
        $options = new Config();
        $options->protocol = 'https';
        $options->gatewayHost = 'openapi.alipay.com';
        $options->signType = 'RSA2';

        $options->appId = '2016101500691521';

        // 为避免私钥随源码泄露，推荐从文件中读取私钥字符串而不是写入源码中
        $options->merchantPrivateKey = 'MIIEpAIBAAKCAQEAvY0t2vdjoP+4/jRc+U1AecJ3rsr48okm7lAAzm+YfjkUdDm0QUEIi168Eo06xJSpBDWS/ndFKLSZFXcS3DlaWbHgk4rX3UEY1m9qXRQ7HLeCg45AvkLeWbBa/rgA9wH9E0T8mkq1/DNN/TW6+khH+q8GVsiLzrYrA8cbFC9HgGL1aEKFFPsoXRLpTeS9cUtBLeen4xmqQ/XbG/SsFHarkRaRAxpp/R0YEbcy+Mbomjcueyyq3h+9wV81nqsMuz6bmCPr7ou6tSrn+QXMZiCAU7WaVKKywDAr6r/BAWD9a/m0hWBxpv7UdnkX/FKLRblrnxL6KGCA9KmNe3qvOiu8jQIDAQABAoIBAQC3Xib5B496xUeJqtAyX/g6kdTD5Bi2T9W4fu54xd4oZUGTOetVoPsKEEgyTiuG1iU3LDiaMHlX6nWZHUrCfj0YPgp50LwIjxve/YNQreyNWD1K1MdvBzMgYol0lj5gtazEAl23SQUKB/uvM1ZBHsF7Eew48eLFwtaT3f4lJaOu3t87fiIooLF/8ZTfSq57VsN00VhV3nIz8hp8y3Gz4SfArva5qU2RNlPVSFgpCniBYA/1SVOTObK+AZMcjFEkg5kWoGgcudbJo6M3lM4BxD49UkpAHnTFU6bndJggBGAqeWb+bF1JDeNbf0QYWTLvWPH8AaX4hi36tjlpbSMdIaiFAoGBAPgo+C9okB4pob2gY8lxvCna7+Il5V8ubLaodmHpw/BRULv/OkVuqFvm7FPCLDf+bsyK7xMgeoDyr998gTde3Hqg8/sFqbqUhzdKfgHNmqM5x26DjJowpRtYnIb4lj6UvkRuxlEVCv+a4BFaBLbNSbWqdg9XAKqXUNVPyXsHURjjAoGBAMOKNFNLz7/CZGMmtCJ4eTLGir50LOQ5gh9rmXaAd9ockDLk67bsxiz1vM9jG47Ox4RhZvELk4DMjTYnE2mBNMW+egvF/9rTysUMUrf5gjeoTBIV4asFXCKWbYrQgWJCjLghJtVuTASYuB+iYjM66T0YxiT90Kmwhde4aEwOwH/PAoGAfdLgC8GbmP+I14nULpZxTlOI34RRaVIzouWFqJ2LUHUaV0fQdtXlnTtXxhwkqXtjGGi1UWBdXLYwQENzjOyXI8IqErPLXCPk7z7g5u8loe8w1DL0/lT90gC61KCEJVTrp+z2trPRsMoJJCMdUsaBwg+c7qgxWU2BmbZrtOp/zvsCgYEAinEPGupR7DJ1YL3GS6GALbLkCHO4VN1ig1xrCrtqH8KZVW8+dASvSqWxSCOjHzjHibJsb70Cce5hDDYeSFRySI7TWgKVYxkQNvLCnf7Jcx50vVlArRTeZp6ab+2vrSHw/2x5UiMFLzvxIHSXki3jdJ5Vq1sIoRuZp2GodjD7mYECgYAuuJe9jjDkUq8AKhaeE4Bsatp6rtcf6fFcvK3VW8f3MXq8ErmBKlRZqZkQJpo8FMqhnvcP5LtqxDXQsqhgqUEZqCzUJEq180JHlA+29/vWl4bnCar4T2i0gizrAyd38VnCU5L10+a1HnCcSDzeX0FA+uzMvjJCk0aV/WFt8AjeoA==';

//    $options->alipayCertPath = '<-- 请填写您的支付宝公钥证书文件路径，例如：/foo/alipayCertPublicKey_RSA2.crt -->';
//    $options->alipayRootCertPath = '<-- 请填写您的支付宝根证书文件路径，例如：/foo/alipayRootCert.crt" -->';
//    $options->merchantCertPath = '<-- 请填写您的应用公钥证书文件路径，例如：/foo/appCertPublicKey_2019051064521003.crt -->';

        //注：如果采用非证书模式，则无需赋值上面的三个证书路径，改为赋值如下的支付宝公钥字符串即可
        $options->alipayPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnLk/miPvBPtApE4vSCGyOgIyfgIC3wmMZ2SFe1bgdu83huHMsFMtq4kburUoW18DTODeBMTD7wX/M++C2HhhI5NNHBmsyqpOK4euAoDrhcwU7J+yYqHpDG7VETB7ldQnmE6rOzixKonRroatMteksF7sOsyeUmyqFBGu0OvTSNEedgiej5TS5BYKGVa28a+4e34WJPXU3oaqgEMrzi5VxbfqB1JHPSc+5hUV5X9kR/NTG2cS7+Qg80f3vYRZoYggWnqcRPIefrklzpCsDYz+fhVAsW49M/sDW/UWggn5+L/JiLL9AAILjQSsP06YmHLsZMiPZub0og70tR07SPLMFQIDAQAB';

        //可设置异步通知接收服务地址（可选）
        $options->notifyUrl = "<-- 请填写您的支付类接口异步通知接收服务地址，例如：https://www.test.com/callback -->";

        //可设置AES密钥，调用AES加解密相关接口时需要（可选）
        $options->encryptKey = "<-- 请填写您的AES密钥，例如：aa4BtZ4tspm2wnXLb1ThQA== -->";



        return $options;
    }
}
