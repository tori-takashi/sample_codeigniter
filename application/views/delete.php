<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ひと言掲示板　管理ページ（投稿の削除）</title>
<style>

/*------------------------------

 Reset Style
 
------------------------------*/
html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
    margin:0;
    padding:0;
    border:0;
    outline:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

body {
    line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {
    display:block;
}

nav ul {
    list-style:none;
}

blockquote, q {
    quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content:'';
    content:none;
}

a {
    margin:0;
    padding:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

/* change colours to suit your needs */
ins {
    background-color:#ff9;
    color:#000;
    text-decoration:none;
}

/* change colours to suit your needs */
mark {
    background-color:#ff9;
    color:#000;
    font-style:italic;
    font-weight:bold;
}

del {
    text-decoration: line-through;
}

abbr[title], dfn[title] {
    border-bottom:1px dotted;
    cursor:help;
}

table {
    border-collapse:collapse;
    border-spacing:0;
}

hr {
    display:block;
    height:1px;
    border:0;
    border-top:1px solid #cccccc;
    margin:1em 0;
    padding:0;
}

input, select {
    vertical-align:middle;
}

/*------------------------------

Common Style

------------------------------*/
body {
	padding: 50px;
	font-size: 100%;
	font-family:'ヒラギノ角ゴ Pro W3','Hiragino Kaku Gothic Pro','メイリオ',Meiryo,'ＭＳ Ｐゴシック',sans-serif;
	color: #222;
	background: #f7f7f7;
}

a {
    color: #007edf;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

h1 {
	margin-bottom: 30px;
    font-size: 100%;
    color: #222;
    text-align: center;
}


/*-----------------------------------
入力エリア
-----------------------------------*/

label {
    display: block;
    margin-bottom: 7px;
    font-size: 86%;
}

input[type="text"],
textarea {
	margin-bottom: 20px;
	padding: 10px;
	font-size: 86%;
    border: 1px solid #ddd;
    border-radius: 3px;
    background: #fff;
}

input[type="text"] {
	width: 200px;
}
textarea {
	width: 50%;
	max-width: 50%;
	height: 70px;
}
input[type="submit"] {
	appearance: none;
    -webkit-appearance: none;
    padding: 10px 20px;
    color: #fff;
    font-size: 86%;
    line-height: 1.0em;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: #37a1e5;
}
input[type=submit]:hover,
button:hover {
    background-color: #2392d8;
}

hr {
	margin: 20px 0;
	padding: 0;
}

.success_message {
    margin-bottom: 20px;
    padding: 10px;
    color: #48b400;
    border-radius: 10px;
    border: 1px solid #4dc100;
}

.btn_cancel {
	display: inline-block;
	margin-right: 10px;
	padding: 10px 20px;
	color: #555;
	font-size: 86%;
	border-radius: 5px;
	border: 1px solid #999;
}
.btn_cancel:hover {
	color: #999;
	border-color: #999;
	text-decoration: none;
}
.text-confirm {
	margin-bottom: 20px;
	font-size: 86%;
	line-height: 1.6em;
}

.error_message {
    margin-bottom: 20px;
    padding: 10px;
    color: #ef072d;
    list-style-type: none;
    border-radius: 10px;
    border: 1px solid #ff5f79;
}

.success_message,
.error_message li {
    font-size: 86%;
    line-height: 1.6em;
}


/*-----------------------------------
掲示板エリア
-----------------------------------*/

article {
	margin-top: 20px;
	padding: 20px;
	border-radius: 10px;
	background: #fff;
}
article.reply {
    position: relative;
    margin-top: 15px;
    margin-left: 30px;
}
article.reply::before {
    position: absolute;
    top: -10px;
    left: 20px;
    display: block;
    content: "";
    border-top: none;
    border-left: 7px solid #f7f7f7;
    border-right: 7px solid #f7f7f7;
    border-bottom: 10px solid #fff;
}
	.info {
		margin-bottom: 10px;
	}
	.info h2 {
		display: inline-block;
		margin-right: 10px;
		color: #222;
		line-height: 1.6em;
		font-size: 86%;
	}
	.info time {
		color: #999;
		line-height: 1.6em;
		font-size: 72%;
	}
    article p {
        color: #555;
        font-size: 86%;
        line-height: 1.6em;
    }

@media only screen and (max-width: 1000px) {

    body {
        padding: 30px 5%;
    }

    input[type="text"] {
        width: 100%;
    }
    textarea {
        width: 100%;
        max-width: 100%;
        height: 70px;
    }
}
</style>
</head>
<body>

<?php if($admin_login): ?>
<h1>ひと言掲示板　管理ページ（投稿の削除）</h1>

<?php if( !empty($validation_messages and $is_succeed === 0) ): ?>
	<ul class="error_message">
			<li><?php echo $validation_messages; ?></li>
	</ul>
<?php endif; ?>

<?php if( !empty($validation_messages) and $is_succeed === 1 ): ?>
    <p class="success_message"><?php echo $validation_messages; ?></p>
<?php endif; ?>

<p class="text-confirm">以下の投稿を削除します。<br>よろしければ「削除」ボタンを押してください。</p>

<!-- ここにメッセージの入力フォームを設置 -->
<?php echo $validation_messages; ?>
<?php echo form_open('delete', "", array('id' => $comment['id'])); ?>

    <div>
        <label for="view_name">表示名</label>
        <?php echo form_input(array('name' => 'view_name', 'value' => $comment["user_name"], 'disabled'=>'true')); ?>
    </div>

    <div>
        <label for="message">ひと言メッセージ</label>
        <?php echo form_input(array('name' => 'message', 'value' => $comment["comment"], 'disabled'=>'true')); ?>
    </div>
    <a class="btn_cancel" href=<?php echo site_url("/admin"); ?>>キャンセル</a>
    <?php echo form_submit("btn_submit", "削除"); ?>

<?php echo form_close(); ?>

<hr>
<section>
<!-- ここに投稿されたメッセージを表示 -->
<?php if( !empty($comments) ): ?>

<article>
  <div class="info">
    <h2><?php echo $comment['user_name'];?></h2>
    <time><?php echo date('Y年m月d日 H:i', strtotime($comment['post_date'])); ?></time>
  </div>
  <p><?php echo $comment['comment']; ?></p>
</article>
<?php endif; ?>

</section>
<?php endif; ?>
</body>
</html>