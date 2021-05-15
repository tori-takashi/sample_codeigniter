<?php echo validation_errors(); ?>

<?php echo form_open('main/post_comment'); ?>

    <div>
        <label for="view_name">表示名</label>
        <input id="view_name" type="input" name="view_name" value=""/>
    </div>

    <div>
        <label for="message">ひと言メッセージ</label>
        <textarea id="message" name="message"></textarea>
    </div>
    <input type="submit" name="btn_submit" value="書き込む" />

</form>

<?php foreach ($comments as $comment): ?>
  <div><?php echo $comment['user_name'] ?> said: <?php echo $comment['comment'] ?>
<?php endforeach ?>