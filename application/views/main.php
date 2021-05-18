<?php echo validation_errors(); ?>

<?php if ($success_message): ?>
    <div>
      <?php echo $success_message; ?>
    </div>
<?php endif; ?>

<?php echo form_open('main/post_comment'); ?>

    <div>
        <label for="view_name">表示名</label>
        <?php echo form_input('view_name', $view_name); ?>
    </div>

    <div>
        <label for="message">ひと言メッセージ</label>
        <?php echo form_textarea('message', $message); ?>
    </div>
    <?php echo form_submit("btn_submit", "書き込む"); ?>

</form>

<?php foreach ($comments as $comment): ?>
  <div><?php echo $comment['user_name'] ?> said: <?php echo $comment['comment'] ?>
<?php endforeach ?>