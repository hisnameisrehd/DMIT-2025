<?php
function addEmoticons($txt)
{
  $thisEmoticon = "<img src=\"emoticons/icon_biggrin.gif\" alt=\"\">";
  $txt = str_replace(":D", $thisEmoticon, $txt);

  $thisEmoticon = "<img src=\"emoticons/icon_sad.gif\" alt=\"\">";
  $txt = str_replace(":(", $thisEmoticon, $txt);

  $thisEmoticon = "<img src=\"emoticons/icon_cool.gif\" alt=\"\">";
  $txt = str_replace("8)", $thisEmoticon, $txt);

  $thisEmoticon = "<img src=\"emoticons/icon_razz.gif\" alt=\"\">";
  $txt = str_replace(":P", $thisEmoticon, $txt);

  $thisEmoticon = "<img src=\"emoticons/icon_wink.gif\" alt=\"\">";
  $txt = str_replace(";)", $thisEmoticon, $txt);

  return $txt;
}

function makeClickableLinks($text)
{
  $text = " " . $text; // fixes problem of not linking if no chars before the link

  $text = preg_replace(
    '/(((f|ht){1}tps?:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
    '<a href="\\1">\\1</a>',
    $text
  );
  $text = preg_replace(
    '/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
    '\\1<a href="http://\\2">\\2</a>',
    $text
  );
  $text = preg_replace(
    '/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
    '<a href="mailto:\\1">\\1</a>',
    $text
  );
  return trim($text);
} // end makeClickableLinks


?>

<script>
  // this is JS
  function go() {
    box = document.forms[0].entryselect;
    destination = box.options[box.selectedIndex].value;
    if (destination) location.href = destination;
  }
  // <select name="entryselect" class="form-control" onchange="go()">
</script>