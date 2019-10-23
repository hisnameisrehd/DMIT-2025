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
?>