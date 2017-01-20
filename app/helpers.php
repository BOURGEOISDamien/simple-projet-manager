<?php
  // cf : composer.json "autoload"
  // Prendre en compte les modifs : term -> "composer dump-autoload"
  function simple_alert(string $title, string $content, string $type,  $timer=null, $cancel=false,  $confirm=true,  $confirm_text="OK")
  {
    Session::flash('alert-title', $title);
    Session::flash('alert-content', $content);
    Session::flash('alert-type', $type);
    Session::flash('alert-timer', $timer);
    Session::flash('alert-cancel', $cancel);
    Session::flash('alert-confirm', $confirm);
    Session::flash('alert-confirm-text', $confirm_text);

  }

  

 ?>
