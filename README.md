# Cookieの検証 (保存出来る最大サイズを調べたり、圧縮した文字列をセットしてみたり)

### 以下ブログ記事の検証用です

[【PHP】Cookieの検証 (保存出来る最大サイズを調べたり、圧縮した文字列をセットしてみたり)をしてみた – 2016年5月 | Shimabox Blog](https://blog.shimabox.net/2016/05/15/php_verify_cookie/)

### 以下の検証をします
- cookieにセットする値の長さが4096byte以上(値 >= 4096)だとcookieにセットされない(無視される)
    - もともとセットされていたcookieは上書きされない
- cookieにセットする値の長さが4096byte以上(値 >= 4096)でも圧縮した結果、4096byteより小さければ(値 < 4096)、cookieにセットされている
- なお、cookieのサイズ制限にはcookie名の長さも含まれる(セットする値の長さ + cookie名の長さが対象になる)

※ 1クッキーの最大サイズ(byte)で一番小さい値が4096byteだったので4096byteを基準にしています  
※ cookieにセットする値の長さは、URLエンコード後の長さ(byte数)です

### こちらで確認出来ます
[http://shimabox.net/sample/php_verify_cookie/](http://shimabox.net/sample/php_verify_cookie/)
