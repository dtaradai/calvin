<form name="cForm" id="cForm" class="s-content__form" method="post" action="<?php echo admin_url('admin-ajax.php?action=' . $args['action']) ?>">
  <fieldset>

    <div class="form-field">
      <input name="name" type="text" id="name" class="h-full-width h-remove-bottom" placeholder="<?php esc_html_e('Your Name', 'calvin') ?>" value="">
      <div class="error-box"></div>
    </div>

    <div class="form-field">
      <input name="email" type="text" id="email" class="h-full-width h-remove-bottom" placeholder="<?php esc_html_e('Your Email', 'calvin') ?>" value="">
      <div class="error-box"></div>
    </div>

    <div class="form-field">
      <input name="phone" type="number" min="10" max="12" id="phone" class="h-full-width h-remove-bottom" placeholder="<?php esc_html_e('Your Phone', 'calvin') ?>" value="">
      <div class="error-box"></div>
    </div>

    <div class="message form-field">
      <textarea name="message" id="message" class="h-full-width" placeholder="<?php esc_html_e('Your Message', 'calvin') ?>"></textarea>
      <div class="error-box"></div>
    </div>

    <br>
    <button type="submit" class="submit btn btn--primary h-full-width"><?php esc_html_e('Submit', 'calvin') ?></button>

  </fieldset>
</form>