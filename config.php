<?php
/**
 * 設定値
 */
class Config
{
    /**
     * 圧縮していない値をセットするcookieの名前
     * @var string
     */
    const DEFAULT_UNCOMPRESS_COOKIE_NAME = 'piyo';

    /**
     * 圧縮した値をセットするcookieの名前
     * @var string
     */
    const DEFAULT_COMPRESS_COOKIE_NAME = 'hoge';

    /**
     * gzcompress => urlエンコード後4091byte
     * @var string
     */
    const CHAR_OF_4091_BYTE = <<< EOM
そのころわたくしは、モリーオ市の博物局に勤めて居りました。
　十八等官でしたから役所のなかでも、ずうっと下の方でしたし俸給ほうきゅうもほんのわずかでしたが、受持ちが標本の採集や整理で生れ付き好きなことでしたから、わたくしは毎日ずいぶん愉快にはたらきました。殊にそのころ、モリーオ市では競馬場を植物園に拵こしらえ直すというので、その景色のいいまわりにアカシヤを植え込んだ広い地面が、切符売場や信号所の建物のついたまま、わたくしどもの役所の方へまわって来たものですから、わたくしはすぐ宿直という名前で月賦で買った小さな蓄音器と二十枚ばかりのレコードをもって、その番小屋にひとり住むことになりました。わたくしはそこの馬を置く場所に板で小さなしきいをつけて一疋の山羊を飼いました。毎朝その乳をしぼってつめたいパンをひたしてたべ、それから黒い革のかばんへすこしの書類や雑誌を入れ、靴もきれいにみがき、並木のポプラの影法師を大股にわたって市の役所へ出て行くのでした。
　あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。
　またそのなかでいっしょになったたくさんのひとたち、ファゼーロとロザーロ、羊飼のミーロや、顔の赤いこどもたち、地主のテーモ、山猫博士のボーガント・デストゥパーゴなど、いまこの暗い巨きな石の建物のなかで考えていると、みんなむかし風のなつかしい青い幻燈のように思われます。では、わたくしはいつかの小さなみだしをつけながら、しずかにあの年のイーハトーヴォの五月から十月までを書きつけましょう。

　　　　　　　一、遁げた山羊

　五月のしまいの日曜でした。わたくしは賑にぎやかな市の教会の鐘の音で眼をさましました。もう日はよほど登って、まわりはみんなきらきらしていました。時計を見るとちょうど六時でした。わたくしはすぐチョッキだけ着て山羊を見に行きました。すると小屋のなかはしんとして藁わらが凹んでいるだけで、あのみじかい角も白い髯も見えませんでした。
「あんまりいい天気なもんだから大将ひとりででかけたな。」
　わたくしは半分わらうように半分つぶやくようにしながら、向うの信号所からいつも放して遊ばせる輪道の内側の野原、ポプラの中から顔をだしている市はずれの白い教会の塔までぐるっと見まわしました。けれどもどこにもあの白い頭もせなかも見えていませんでした。うまやを一まわりしてみましたがやっぱりどこにも居ませんでした。
「いったい山羊は馬だの犬のように前居たところや来る道をおぼえていて、そこへ戻っているということがあるのかなあ。」
　わたくしはひとりで考えました。さあ、そう思うと早くそれを知りたくてたまらなくなりました。けれども役所のなかとちがって競馬場には物知りの年とった書記も居なければ、そんなことを書いた辞書もそこらにありませんでしたから、わたくしは何ということなしに輪道を半分通って、、。。、、。。；；：：；：
EOM;

    /**
     * gzcompress => urlエンコード後4092byte
     * @var string
     */
    const CHAR_OF_4092_BYTE = <<< EOM
二、つめくさのあかり

　それからちょうど十日ばかりたって、夕方、わたくしが役所から帰って両手でカフスをはずしていましたら、いきなりあのファゼーロが、戸口から顔を出しました。そしてわたくしが、まだびっくりしているうちに、
「とうとう来たよ、今晩は。」と云いました。
「ああ、先頃はありがとう。地図はちゃんと仕度しておいたよ。この前の音は今でもするの。」
「するとも、昨夜なんかとてもひどいんだ。今夜はもうぼくどうしても探そうとおもって羊飼のミーロと二人で出て来たんだ。」
「うちの方は大丈夫かい。」
「うん。」ファゼーロは何だか少しあいまいに返事しました。
「きみの旦那はなかなか恐い人だねえ、何て云うんだ。」
「テーモだよ。」
「テーモ、やっぱし何だか聞いたような名だなあ。」
「聞いたかも知れない。あちこち役所へ果物だの野菜だの納めているんだから。」
「そうかねえ。とにかく地図はこれだよ。」
　わたくしは戸口に買って置いた地図をひろげました。
「ミーロも呼んでもいいかい。」
「誰か来てるのか、いいとも。」
「ミーロ、おいで、地図を見よう。」
　すると山羊小屋の中からファゼーロよりも三つばかり年上の、ちゃんときゃはんをはいて、ぼろぼろになった青い皮の上着を着た顔いろのいいわか者が出てきて、わたくしにおじぎしました。
「おや、ぼくは地図をよくわからないなあ、どっちが西だろう。」
「上の方が北だよ。そう置いてごらん。」ファゼーロはおもての景色と合せて地図を床に置きました。
「そら、こっちが東でこっちが西さ。いまぼくらのいるのはここだよ。この円くなった競馬場のここのとこさ。」
「乾溜工場はどれだろう。」ミーロが云いました。
「乾溜工場って、この地図にはないね、こっちかしら。」
　わたくしは別のをひろげました。
「ないなあ、いつごろからあるんだい。」
「去年からだよ。」
「それじゃないんだ。この地図はもっと前に測量したんだから。その工場はどんなとこにあるの。」
「ムラードの森のはずれだよ。」
「ああ、これかしら、何の木だい、楢ならか樺かばだらう。唐檜やサイプレスではないね。」
「楢と樺だよ。ああこれか。ぼくはねえ、どうも昨夜の音はここから聞えたと思うんだ。」
「行こう行こう、行って見よう。」ファゼーロはもう地図をもってはねあがりました。
「わたしも行っていいかい。」
「いいとも、ぼくそう云いたくていたんだ。」
「じゃわたしも行こう。ちょっと待って。」
　わたくしは大急ぎで仕度をしました。どうせ月は出るけれども地図が見えないといけないと思って、ガラス函のちょうちんも持ちました。
「さあ行こう。」わたくしは、ばたんと戸をしめてファゼーロとミーロのあとに立ちました。
　日はもう落ちて空は青く古い池のようになっていました。そこらの草もアカシヤの木も一日のなかでいちばん青く見えるときでした。
　わたくしどもはもう競馬場のまん中を横截ぎってしまってまっすぐに野原へ行く小さなみちへかかっていました。ふりかえってみると、わたくしの家がかなり小さく黄いろにひかっていました。
「ポラーノの広場へ行けば何があるって云うの？」
　ミーロについて行きながらわたくしはファゼーロにたずねました。
「オーケストラでもお酒でも何でもあるって。ぼくお酒なんか呑みたくはないけれど、みんなを連れて行きたいんだよ。」
「そうだって云ったねえ、わたしも小さいとき、そんなこと聞いたよ。」
「それに第一に
EOM;

    /**
     * gzcompress => urlエンコード後4093byte
     * @var string
     */
    const CHAR_OF_4093_BYTE = <<< EOM
三、ポラーノの広場

　それからちょうど五日目の火曜日の夕方でした。その日はわたくしは役所で死んだ北極熊を剥製にするかどうかについてひどく仲間と議論をして大へんむしゃくしゃしていましたから、少し気を直すつもりで酒石酸をつめたい水に入れて呑んでいましたら、ずうっと遠くですきとおった口笛が聞えました。その調子はたしかにあのファゼーロの山羊をつれて来たり野原を急いで行ったりする気持そっくりなので、わたくしは思わず、とうとう来たな、とつぶやきました。
　やっぱりファゼーロでした。まだわたくしがその酒石酸のコップを呑みほさないうちに、もう顔をまっ赤にして戸口に立っていました。
「わかったよ、とうとう。僕ゆうべ行くみちへすっかり方角のしるしをつけて置いた。地図で見てもわかるんだ。今夜ならもう間違いなくポラーノの広場へ行ける。ミーロはひるのうちから行っていてぼくらを迎えに出る約束なんだ。ぼく行って見て、ほんとうだったら、あしたはもうみんなつれて行くんだ。」
　わたくしも釣り込まれて胸を躍らせました。
「そうかい、わたしも行こう。どんななりして行ったらいいかねえ。どんな人が来てるだろうねえ。」
「どんななりでもいいじゃないか。早く行こう。来てる人が誰だか、ぼくもわからないんだ。」
　わたくしは大急ぎでネクタイを結んで新らしい夏帽子を被って外へ出ました。わたくしどもがこの前別れたところへ来たころは丁度夕方の青いあかりが、つめくさにぼんやり注いでいて、その葉の爪の痕のやうな紋も、もう見えなくなりかかったときでした。ファゼーロは爪立てをしてしばらくあちこち見まわしていましたが、俄かに向うへ走って行きました。ファゼーロはしばらく経ってぴたりと止まりました。
「あ、こいつだ、そらね。」
　見るとそこにはファゼーロが作ったらしく、一本の棒を立ててその上にボール紙で矢の形を作って北西の方を指すようにしてありました。
「さあ、こっちへ行くんだ。向うに小さな樺の木が二本あるだろう。あすこが次の目標なんだよ。暗くならないうちに早く行こう。」ファゼーロはどんどん走り出しました。
　ほんとうにそこらではもうつめくさのあかりがつきはじめていました。わたくしはまたファゼーロのあとについて走りました。
「早く行こう、早く行こう、山猫の馬車別当なんかに見付かっちゃうるさいや。」ファゼーロはふりかえって、そんなことを云いながら走りつづけました。
　けれどもさっき見た二本の樺の木まではなかなかすぐではありませんでした。
　ファゼーロはよく走りました。
　わたくしもずいぶん本気に走りました。
　やっとそこに着いてファゼーロが立ちどまったときは、あたりはもうすっかり夜になっていて、樺の木もまっ黒にそらにすかし出されていました。
　つめくさの花はちょうどその反対に明るく、まるで本当の石英ランプでできているようでした。
　そしてよく見ますと、この前の晩みんなで云ったように、一々のあかしは小さな白い蛾のかたちのあかしから出来て、それが実に立派にかがやいて居りました。処々には、せいの高い赤いあかりもりんと灯り、その柄の所には緑いろのしゃんとした葉もついていたのです。ファゼーロはすばやくその樺の木にのぼっていました。 c
EOM;

    /**
     * gzcompress => urlエンコード後5113byte
     * @var string
     */
    const CHAR_OF_5113_BYTE = <<< EOM
四、警察署

 　ところがその次の次の日のひるすぎでした。わたくしが役所の机で古い帳簿から写しものをしていますと給仕が来てわたくしの肩をつっついて、
 「所長さんがすぐ来いって。」と云いました。
 　わたくしはすぐペンを置いてみんなの椅子の間を通り、間の扉をあけて所長室にはいりました。
 　すると所長は一枚の紙きれを持って扉をあける前から恐い顔つきをして、わたくしの方を見ていましたが、わたくしが前に行って恭うやうやしく礼をすると、またじっとわたくしの様子を見てからだまってその紙切れを渡しました。見ると、


イ警第三二五六号　聴取の要有之本日午後三時本警察署人事係まで出頭致され度たし


一九二七年六月廿九日

第十八等官レオーノ・キュースト殿
とあったのです。
 　ああ、あのデストゥパーゴのことだな、これはおもしろいと、わたくしは心のなかでわらいました。すると所長はまだわたくしの顔付きをだまってみていましたが、
 「心当りがあるか。」と云いました。
 「はい、ございます。」わたくしはまっすぐ両手を下げて答えました。
 　所長は安心したようにやっと顔つきをゆるめて、ちらっと時計を見上げましたが、
 「よし、すぐ行くように。」と云いました。
 　わたくしはまたうやうやしく礼をして室を出ました。それから席へ戻って机の上をかたづけて、そっと役所を出かけました。巨きな桜の街路樹の下をあるいて行って、警察の赤い煉瓦造りの前に立ちましたら、さすがにわたくしもすこしどきどきしました。けれども何も悪いことはないのだからと、じぶんでじぶんをはげまして勢よく玄関の正面の受付にたずねました。
 「お呼びがありましたので参りましたが、レオーノ・キューストでございます。」
 　すると受付の巡査はだまって帳面を五六枚繰っていましたが、
 「ああ失踪しっそう者の件だね、人事係のとこへ、その左の方の入口からはいって待っていたまえ。」と云いました。
 　失踪者の件というのは何のことだろう、決闘の件とでも云うならわかっているし、その決闘なら刃の円くなった食卓ナイフでやったことなのだ、デストゥパーゴが血を出したかどうかもわからない、まあ何かの間違いだろうと思いながら、わたくしは室へ入って行きました。そこはがらんとした、窓の七つばかりある広い室でしたが、その片隅みにあの山猫博士の馬車別当が、からだを無暗むやみにこわばらして、じつに青ざめた変な顔をしながら腰かけて待って居りました。
 「やあ、じいさん、今日は、あなたも呼ばれたんですか。」わたくしはそばへ行ってわらいながら挨拶あいさつしました。
 　するとじいさんは、こんな悪者と話し合ってはどんな眼にあうかわからないというように、うろうろどこか遁げ口でもさがすように立ちあがって、またべったり坐りました。
 「あなたのご主人はいらっしゃらないのですか。」わたくしはまたたずねました。
 「いらっしゃらないともさ。」じいさんはやっと云いましたが、それからがたがたふるえました。
 「いったいどうしたんですか。」わたくしはまだわらってききました。
 「いま調べられてるんだよ。」
 「誰が。」わたくしはびっくりしてたずねました。
 「ロザーロがさ。」
 「ロザーロ、どうして？」もうわたくしはすっかり本気になってしまいました。
 「ファゼーロが居なくなったからさ。」
 「ファゼーロ？」思わずわたくしは高く叫びました。
 　ああ、あの晩ファゼーロが帰る途中で何かあったのだな、……。
 「話しすることはならん。」
 　いきなり奥の扉が、がたっとあきました。
 「召喚しょうかん人はお互話しすることはならん。おい、おまえはこっちへはいって居ろ。」
 　じいさんは呼ばれてよろよろ立って次の室へ行きました。そう云われて見ると、なるほど次の室ではロザーロが誰かに調べられているらしく、さっきからしずかに何か繰り返し繰り返し云って居るような気もしました。わたくしはまるで胸が迫ってしまいました。
 　ファゼーロが居ない、ファゼーロが居ない、あの青い半分の月のあかりのなかで争って勝ったあとのあの何とも云われないきびしい気持をいだきながら、ファゼーロがつめくさのあおじろいあかりの上に影を長く長く引いて、しょんぼりと帰って行った、そこには麻の夏外套のえりを立てたデストゥパーゴが三四人の手下を連れて待ち伏せしている、ファゼーロがそれを見て立ち
EOM;

    /**
     * gzcompress => urlエンコード後5114byte
     * @var string
     */
    const CHAR_OF_5114_BYTE = <<< EOM
五、センダード市の毒蛾

 　そしてだんだん暑くなってきました。役所では窓に黄いろな日覆ひおおいもできましたし隣りの所長の室には電気会社から寄贈になった直径七デシもある大きな扇風機も据すえつけられました。あまり暑い日の午後などは所長が自分で立って間の扉をあけて、
 「さあ諸君、少し風にあたりたまえ。」なんて云ったものです。
 　すると大扇風機から風がどうどうやって来ました。尤もっとも私の席はその風の通り路からすこし外れていましたから格別涼しかったわけでもありませんでしたが、それでも向うの書類やテーブルかけが、ぱたぱた云っているのを見るのは実際愉快なことでした。それでもそんな仕事のあいまに、ふっとファゼーロのことを思いだすと、胸がどかっと熱くなってもうどうしたらいいかわからなくなるのでした。とにかくその七月いっぱいに私のした仕事は、

一、北極熊剥製はくせい方をテラキ標本製作所に照会の件
 一、ヤークシャ山頂火山弾運搬費用見積みつもりの件
 一、植物標本褪色たいしょく調査の件
 一、新番号札二千三百枚調製の件

　などでした。
 　そして八月に入りました。その八月二日の午すぎ、わたくしが支那漢時代の石に刻んだ画の説明をうつらうつら写していましたら、給仕がうしろからいきなりわたくしの首すじを突っついて、
 「所長さんが来いって。」といいました。
 　わたくしはすこしむっとしてふり返りましたら給仕はまた威張って云いました。
 「所長さんがすぐ来いって。」
 　わたくしは返事もしないでだまってみんなの椅子のうしろを通り、例の扉をあけて恭※(二の字点、1-2-22)しくはいって行きました。
 　所長は肥った白い手首に※(「月＋咢」、第3水準1-90-51)をもたせて扇風機にあたりながら新聞を見ていましたが、わたくしが行くとだるそうにちょっと眼をあげて、それから机の上の紙挾みから一枚の命令書をわたくしによこしました。それには、
 「海岸鳥類の卵採集の為に八月三日より二十八日間イーハトーヴォ海岸地方に出張を命ず。」
 　と書いてありました。わたくしはまるでほくほくしてしまいました。
 　あのイーハトーヴォの岩礁の多い奇麗きれいな海岸へ行って今ごろありもしない卵をさがせというのはこれは慰労いろう休暇のつもりなのだ。それほどわたくしが所長にもみんなにも働いていると思われていたのか、ありがたいありがたいと心の中で雀躍じゃくやくしました。すると所長は私の顔は少しも見ないで、やっぱり新聞を見ながら、
 「会計へまわって見積みつもり旅費を受けとるように。」と一言だけ云いました。
 　わたくしは叮嚀ていねいに礼をして室を出ました。それからその辞令をみんなに一人ずつ見せて挨拶してあるき、おしまいに会計に行きましたら、会計の老人はちょっと渋い顔付きはしていましたが、だまってわたくしの印を受け取って大きな紙幣を八枚も渡してくれました。ほかに役所の大きな写真器械や双眼鏡も借りました。うちへ帰ると、わたくしは持っていたレコードをみんな町の古時計屋へ売ってしまいました。そして大きなへりのついたパナマの帽子と卵いろのリンネルの服を買いました。
 　次の朝わたくしは番小屋にすっかりかぎをおろし、一番の汽車でイーハトーヴォ海岸の一番北のサーモの町に立ちました。その六十里の海岸を町から町へ、岬みさきから岬へ、岩礁がんしょうから岩礁へ、海藻かいそうを押葉にしたり、岩石の標本をとったり、古い洞穴や模型的な地形を写真やスケッチにとったり、そしてそれを次々に荷造りして役所へ送りながら、二十幾日の間にだんだん南へ移って行きました。海岸の人たちはわたくしのような下給の官吏でも大へん珍らしがって、どこへ行っても歓迎してくれました。沖の岩礁へ渡ろうとする
EOM;

    /**
     * 適当な文字列
     * @var string
     */
    const RANDOM = <<< EOM
こんにちはHELLOこんにちはhelloこんにちは!"#$%&'()=~|,./\^@[]+*こんにちは
井戸端会議こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちは
abcdefghijklmnopqrstuvwxyz~`
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちはこんにちは
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちはこんにちは
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちはこんにちは
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちはこんにちは
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちはこんにちは
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちはこんにちは
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちは
こんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこ
んにちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちはこん
にちはこんにちはこんにちはこんにちはこんにちはこんにちはこんにちは
こんにちは<>、。・[]{}?！”＃＄％？｛｝￥｜こんにちは世界
EOM;

    /**
     * 文字列のリスト
     * @var array
     */
    public static $charList = array(
        '4091' => self::CHAR_OF_4091_BYTE,
        '4092' => self::CHAR_OF_4092_BYTE,
        '4093' => self::CHAR_OF_4093_BYTE,
        '5113' => self::CHAR_OF_5113_BYTE,
        '5114' => self::CHAR_OF_5114_BYTE,
        'random' => self::RANDOM,
    );

}
