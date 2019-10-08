<?php

include("includes/header.php");

?>

<div class="jumbotron clearfix" style="text-align: center;background: #492b2b; color: rgb(255, 223, 223);">
  <h1 style="font-size:3.5rem;">~<?php echo APP_NAME ?>~</h1><span style="font-size: 2rem; float:right; ">By Nicholas.</span>
</div>
<style>
  /* Message box starts here */
  .container-bubble {
    clear: both;
    position: relative;
    margin-bottom: 2rem;
  }

  .container-bubble .arrow {
    width: 12px;
    height: 20px;
    overflow: hidden;
    position: relative;
    float: left;
    top: 6px;
    right: -1px;
  }

  .container-bubble .arrow .outer {
    width: 0;
    height: 0;
    border-right: 20px solid #000000;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    top: 0;
    left: 0;
  }

  .container-bubble .arrow .inner {
    width: 0;
    height: 0;
    border-right: 20px solid #ffffff;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    position: absolute;
    top: 0;
    left: 2px;
  }

  .container-bubble .message-body {
    float: left;
    width: 45vw;
    height: auto;
    border: 1px solid #ccc;
    background-color: #ffffff;
    border: 1px solid #000000;
    padding: 6px 8px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -o-border-radius: 5px;
    border-radius: 5px;
  }

  .message-title {
    font-family: 'palatino';
    font-size:1.5rem;
    margin-bottom: .5rem;
  }
  
  .container-bubble .message-body p {
    width: 100%;
    color: #e20800;
    padding-left: 1rem;
    margin: 0 auto;
  }

  .timedate {
    color: #a3a3a3;
    float: right;
    font-size: .75rem;
  }

  svg {
    height: 5rem;
  }

  .date-div {
    display: flex;
    justify-content: center;
    align-self: center;
  }

  .example-date {
    background-color: #998877;
    float: right;
    margin-left: 10px;
    padding: 45px 18px 0;
    position: relative;
  }

  .example-date .day {
    font-size: 45px;
    left: 5px;
    line-height: 45px;
    position: absolute;
    top: 0;
  }

  .example-date .month {
    font-size: 25px;
    text-transform: uppercase;
  }

  .example-date .year {
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    display: block;
    position: absolute;
    right: -10px;
    top: 15px;
    letter-spacing: 0.2rem;
  }

</style>
<!-- background:rgb(226, 213, 216) -->

<div class="container message-border" style="margin:0 auto;padding:1rem 0;">

  <div class="d-block">

    <?php
    include("admin/blogfile.txt");
    ?>

  </div>

</div>



<?php

include("includes/footer.php");

?>