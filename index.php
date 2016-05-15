<?php
error_reporting(-1);
ini_set('display_errors', 1);

require_once 'config.php';

/**
 * 以下の検証用
 * <ul>
 *   <li>cookieにセットする値の長さが4096byte以上(値 >= 4096)だとcookieにセットされない(無視される)
 *     <ul><li>もともとセットされていたcookieは上書きされない</li></ul>
 *   </li>
 *   <li>cookieにセットする値の長さが4096byte以上(値 >= 4096)でも圧縮した結果、4096byteより小さい(値 < 4096)場合、cookieにセットされている</li>
 *   <li>cookieのサイズ制限にはcookie名の長さも含まれる(セットする値の長さ + cookie名の長さが対象になる)</li>
 * </ul>
 * ※ 1クッキーの最大サイズ(byte)で一番小さい値が4096byteだったので4096byteを基準にしています<br>
 * ※ cookieにセットする値の長さは、URLエンコード後の長さ(byte数)です
 *
 * e.g)<br>
 * <code>
 * // 圧縮した文字列をクッキーにセット<br>
 * setcookie('hoge', gzcompress($value, 9), 0);
 *
 * // 圧縮された文字列の解凍<br>
 * $unCompressed = gzuncompress($_COOKIE['hoge']);
 * </code>
 *
 * @param string $value cookieにセットする値
 * @param string $unCompressCookieName 圧縮していない値をセットするcookieの名前
 * @param string $compressCookieName 圧縮した値をセットするcookieの名前
 * @return object 処理結果
 *
 * @link http://www.teria.com/~koseki/memo/cookie/cookie_4k.html
 * @link http://fukaoi.org/2007/06/20/cookie
 * @link http://d.hatena.ne.jp/hosikiti/20130925/1380098776
 * @link http://shimabox.hatenablog.com/entry/2016/05/15/090107
 */
function verifyCookie(
    $value,
    $unCompressCookieName = Config::DEFAULT_UNCOMPRESS_COOKIE_NAME,
    $compressCookieName = Config::DEFAULT_COMPRESS_COOKIE_NAME
)
{
    $ret = new stdClass();
    $ret->text = '';

    // 圧縮していない値（原文）をそのままセット
    setcookie($unCompressCookieName, $value, 0);

    // 文字列の圧縮
    $compressed = gzcompress($value, 9);

    // 圧縮した文字列をクッキーにセット
    setcookie($compressCookieName, $compressed, 0);

    // 圧縮していない値をセットしたcookieの値 $_COOKIE[$unCompressCookieName]
    $unCompressCookie = _get($unCompressCookieName, false, INPUT_COOKIE);
    // 圧縮した値をセットしたcookieの値 $_COOKIE[$compressCookieName]
    $compressCookie = _get($compressCookieName, false, INPUT_COOKIE);

    if ($compressCookie === false) { // !isset($_COOKIE[$compressCookieName])
        // 圧縮した文字列の長さ(byte数)を取得 ※cookie名の長さもcookieの容量に含まれる
        $compressCookieNameSize = strlen(bin2hex($compressCookieName)) / 2;
        $cookieLen = strlen(urlencode($compressed)) + $compressCookieNameSize;

        if ($cookieLen >= 4096) {
            $ret->text .= '圧縮しても4096byte以上でした。。' . '<br><br>';
        } else {
            $ret->text .= 'リロードしてみて' . '<br><br>';
        }

        return $ret;
    }

    /*
     |----------------------------------------------------------------
     | cookieにセットする値
     |----------------------------------------------------------------
     */
    $ret->text .= '<b>【cookieにsetする値】</b>' . '<br>';
    $ret->text .= _h($value) . '<br><br>';

    /*
     |----------------------------------------------------------------
     | cookieにセットする値が4096byte以上(値 >= 4096)だとcookieにセットされない
     |----------------------------------------------------------------
     */
    $ret->text .= '<b>【圧縮していない場合】</b>' . '<br>';

    // cookie名の長さもcookieの容量に含まれるので長さ(byte数)を取る
    $unCompressCookieNameSize = strlen(bin2hex($unCompressCookieName)) / 2;
    $ret->text .= 'cookie名の長さ(' . $unCompressCookieNameSize . 'byte) + URLエンコード後の文字列の長さ(' . strlen(urlencode($value)) . 'byte) => ';
    $ret->text .= $unCompressCookieNameSize + strlen(urlencode($value)) . 'byte';
    $ret->text .= '<br>';

    if ($unCompressCookie === false) { // !isset($_COOKIE[$unCompressCookieName])
        $ret->text .= 'cookie名[ ' . $unCompressCookieName . ' ] => cookieにset されていない' . '<br><br>';
    } else {
        $ret->text .= 'cookie名[ ' . $unCompressCookieName . ' ] => cookieにset されている' . '<br>';
        $ret->text .= '圧縮していない文字列（原文）と、cookieにsetされている文字列の差分 => ';

        if ($value === $unCompressCookie) {
            $ret->text .= '差分無し';
        } else {
            $ret->text .= '<b>差分あり</b>';
        }
        $ret->text .= '<br><br>';

        $ret->text .= '<b>【cookieにsetされている値】(圧縮していない)</b>' . '<br>';
        $ret->text .= _h($unCompressCookie) . '<br><br>';
    }

    /*
     |----------------------------------------------------------------
     | cookieにセットする値が4096byte以上(値 >= 4096)でも圧縮した結果、
     | 4096byteより小さければ(値 < 4096)、cookieにセットされている
     |----------------------------------------------------------------
     */
    $ret->text .= '<b>【圧縮した場合】</b>' . '<br>';

    // cookie名の長さもcookieの容量に含まれるので長さ(byte数)を取る
    $compressCookieNameSize = strlen(bin2hex($compressCookieName)) / 2;
    $ret->text .= 'cookie名の長さ(' . $compressCookieNameSize . 'byte) + URLエンコード後の文字列の長さ(' . strlen(urlencode($compressed)) . 'byte) => ';
    $ret->text .= $compressCookieNameSize + strlen(urlencode($compressed)) . 'byte';
    $ret->text .= '<br>';

    $ret->text .= 'cookie名[ ' . $compressCookieName . ' ] => cookieにset されている' . '<br>';

    // 圧縮された文字列の解凍
    $unCompressed = gzuncompress($compressCookie);

    $ret->text .= '圧縮していない文字列（原文）と、cookieにsetされている(圧縮→解凍後の)文字列の差分 => ';

    if ($value === $unCompressed) {
        $ret->text .= '差分無し';
    } else {
        $ret->text .= '<b>差分あり</b>';
    }
    $ret->text .= '<br><br>';

    /*
     |----------------------------------------------------------------
     | cookieにセットされている値
     |----------------------------------------------------------------
     */
    $ret->text .= '<b>【cookieにsetされている値】(圧縮→解凍したもの)</b>' . '<br>';
    $ret->text .= _h($unCompressed) . '<br><br>';

    return $ret;
}

/**
 * cookieにセットする値を取得
 * @param string $key
 * @param string $defaultKey
 * @return string
 */
function fetchCookie($key, $defaultKey)
{
    if (isset(Config::$charList[$key])) {
        return Config::$charList[$key];
    }

    if ($key === 'org' && _get('org-text') !== '') {
        return _get('org-text');
    }

    return Config::$charList[$defaultKey];
}

/**
 * htmlspecialchars
 * @param string $val
 */
function _h($val)
{
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

/**
 * getter
 * @param string $key
 * @param mixed $default
 * @param int $type
 * @return mixed
 */
function _get($key, $default = '', $type = INPUT_POST)
{
    $val = filter_input($type, $key);
    return $val !== null && $val !== '' ? $val : $default;
}

/*
 |----------------------------------------------------------------
 | 処理
 |----------------------------------------------------------------
 */
$verificationResult = null;
if (_get('exec') && (int)_get('exec') === 1) {
    $value = fetchCookie(_get('byte', '4091'), '4091');
    $unCompressCookieName = _get('uncompress-cookie', Config::DEFAULT_UNCOMPRESS_COOKIE_NAME);
    $compressCookieName = _get('compress-cookie', Config::DEFAULT_COMPRESS_COOKIE_NAME);

    $verificationResult = verifyCookie($value, $unCompressCookieName, $compressCookieName);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>Cookieの検証(保存出来る最大サイズを調べたり、圧縮した文字列をセットしてみたり)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
  <div class="container">

    <h1>
      <a href="">Cookieの検証</a>
      <small>(保存出来る最大サイズを調べたり、圧縮した文字列をセットしてみたり)</small>
    </h1>

    <div class="row">

      <div class="col-md-6">
        <h3><p class="bg-primary" style="padding: 1rem;">以下を検証</p></h3>
        <ul>
          <li>cookieにセットする値の長さが4096byte以上(値 >= 4096)だとcookieにセットされない(無視される)
            <ul><li>もともとセットされていたcookieは上書きされない</li></ul>
          </li>
          <li>cookieにセットする値の長さが4096byte以上(値 >= 4096)でも圧縮した結果、4096byteより小さければ(値 < 4096)、cookieにセットされている</li>
          <li>なお、cookieのサイズ制限にはcookie名の長さも含まれる(セットする値の長さ + cookie名の長さが対象になる)</li>
        </ul>
        <p style="padding: 0 0 0 2.5rem;">
          <span>※ 1クッキーの最大サイズ(byte)で一番小さい値が4096byteだったので4096byteを基準にしています (<a href="http://shimabox.hatenablog.com/entry/2016/05/15/090107">こちら</a>を参考)</span><br>
          <span>※ cookieにセットする値の長さは、URLエンコード後の長さ(byte数)です</span>
        </p>
        <p class="bg-info" style="padding: 1rem;"><span>e.g. 文字列の圧縮/解凍</span></p>
        <ul>
          <li>PHPには以下の圧縮方法があるみたいですが、gzcompressを用いています(何故これを選んだか意味は無いです)
            <ul>
                <li><a href="http://php.net/manual/ja/function.gzcompress.php" target="_blank">gzcompress</a></li>
                <li><a href="http://php.net/manual/ja/function.gzdeflate.php" target="_blank">gzdeflate</a></li>
                <li><a href="http://php.net/manual/ja/function.gzencode.php" target="_blank">gzencode</a></li>
            </ul>
          </li>
        </ul>
        <pre>
          <code>
// 圧縮した文字列をクッキーにセット
setcookie('hoge', gzcompress($value, 9), 0);

// 圧縮された文字列の解凍
$unCompressed = gzuncompress($_COOKIE['hoge']);</code>
        </pre>
      </div>

      <div class="col-md-6">
        <h3><p class="bg-primary" style="padding: 1rem;">検証用</p></h3>
        <form action="./#result" method="post" id="send-cookie-form">

          <div class="form-group">
            <h3>Cookie名</h3>
            <div class="form-group">
              <label for="uncompress-cookie">圧縮していない値をセットするcookieの名前</label>
              <input type="text" name="uncompress-cookie" value="<?php echo _h(_get('uncompress-cookie')); ?>" class="form-control" id="uncompress-cookie" placeholder="<?php echo _h(Config::DEFAULT_UNCOMPRESS_COOKIE_NAME); ?>">
            </div>
            <div class="form-group">
              <label for="compress-cookie">圧縮する値をセットするcookieの名前</label>
              <input type="text" name="compress-cookie"value="<?php echo _h(_get('compress-cookie')); ?>" class="form-control" id="compress-cookie" placeholder="<?php echo _h(Config::DEFAULT_COMPRESS_COOKIE_NAME); ?>">
            </div>
          </div>

          <div class="form-group">
            <h3>Cookieにsetする値 <small>※byte数はデフォルトのcookie名(4byte)を足した数です</small></h3>

            <label class="radio-inline">
              <input type="radio" name="byte" value="4091"<?php if (_h(_get('byte', '4091')) === '4091') { ?> checked="checked"<?php } ?>> 4095byte
            </label>
            <label class="radio-inline">
              <input type="radio" name="byte" value="4092"<?php if (_h(_get('byte', '4091')) === '4092') { ?> checked="checked"<?php } ?>> 4096byte
            </label>
            <label class="radio-inline">
              <input type="radio" name="byte" value="4093"<?php if (_h(_get('byte', '4091')) === '4093') { ?> checked="checked"<?php } ?>> 4097byte
            </label>
            <br>
            <label class="radio-inline">
              <input type="radio" name="byte" value="5113"<?php if (_h(_get('byte', '4091')) === '5113') { ?> checked="checked"<?php } ?>> 5117byte
            </label>
            <label class="radio-inline">
              <input type="radio" name="byte" value="5114"<?php if (_h(_get('byte', '4091')) === '5114') { ?> checked="checked"<?php } ?>> 5118byte
            </label>
            <label class="radio-inline">
              <input type="radio" name="byte" value="random"<?php if (_h(_get('byte', '4091')) === 'random') { ?> checked="checked"<?php } ?>> 適当
            </label>
            <br>
            <label class="radio-inline">
              <input type="radio" name="byte" value="org"<?php if (_h(_get('byte', '4091')) === 'org') { ?> checked="checked"<?php } ?>> 自分で設定
            </label>
          </div>

          <div class="form-group">
            <textarea name="org-text" class="form-control" rows="6" id="org-text"><?php echo _get('org-text'); ?></textarea>
            <div style="text-align: right;">
              <span>@link http://www.aozora.gr.jp/cards/000081/files/1935_19925.html</span>
            </div>
          </div>

          <div class="form-group">
            <button class="btn btn-primary" type="submit">実行</button>
            <span style="margin-left: 1rem;">実行後はリロードしてください</span>
          </div>

          <input type="hidden" value="1" name="exec">
          <input type="hidden" value="<?php echo Config::CHAR_OF_4091_BYTE; ?>" id="byte-4091">
          <input type="hidden" value="<?php echo Config::CHAR_OF_4092_BYTE; ?>" id="byte-4092">
          <input type="hidden" value="<?php echo Config::CHAR_OF_4093_BYTE; ?>" id="byte-4093">
          <input type="hidden" value="<?php echo Config::CHAR_OF_5113_BYTE; ?>" id="byte-5113">
          <input type="hidden" value="<?php echo Config::CHAR_OF_5114_BYTE; ?>" id="byte-5114">
          <input type="hidden" value="<?php echo _h(Config::RANDOM); ?>" id="byte-random">
        </form>
      </div>

      <div class="col-md-12"><hr>
<?php
    if ($verificationResult !== null) {
?>
        <h3 id="result"><p class="bg-success" style="padding: 1rem;">結果</p></h3>
<?php
        echo $verificationResult->text;
    }
?>
      </div>

    </div><!-- row -->
  </div><!-- container -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  'use strict';

  var d = document;

  var disabledTextArea = function(bool) {
    d.getElementById('org-text').disabled = bool;
  };

  var reflectInText = function(val) {
    disabledTextArea(true);
    d.getElementById('org-text').value = d.getElementById('byte-' + val).value;
  };

  var onChangeHandler = function() {
    if (this.value === 'org') {
      disabledTextArea(false);
      return;
    }

    reflectInText(this.value);
  };

  disabledTextArea(false);

  var radioList = d.getElementsByName('byte');
  for (var i = 0, len = radioList.length; i < len; i++) {

    radioList[i].onchange = onChangeHandler;

    if (radioList[i].checked === false) {
      continue;
    }

    var value = radioList[i].value;

    if (value !== 'org') {
      reflectInText(value);
    }
  }

});
</script>
</body>
</html>