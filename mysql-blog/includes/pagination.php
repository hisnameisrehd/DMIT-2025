<ul class="pagination pr-3 pl-3">
<?php
///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
if ($postnum > $limit) {
    echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
    $n = $pg + 1;
    $p = $pg - 1;
    $thisroot = $_SERVER['PHP_SELF'];
}
?>
  <?php if ($pg > 1): ?> 
    <li class="page-item"><a class="page-link" href="<?php echo $thisroot;?>?pg=<?php echo $p;?>"><< prev</a></li>
<?php endif; ?>
<?php for ($i = 1; $i <= $num_pages; $i++): ?>
   <?php if ($i != $pg): ?>
      <li class="page-item"><a class="page-link" href="<?php echo $thisroot;?>?pg=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php else: ?>
      <li class="page-item active"><span class="page-link"><?php echo $i;?></span><span class="sr-only">(current)</span></li>
<?php endif;?>
  <?php endfor; ?>
  <?php if ($pg < $num_pages): ?>
    <li class="page-item"><a class="page-link" href="<?php echo $thisroot;?>?pg=<?php echo $n;?>">next >></a></li>
<?php endif; ?>
  &nbsp;&nbsp;
</ul>