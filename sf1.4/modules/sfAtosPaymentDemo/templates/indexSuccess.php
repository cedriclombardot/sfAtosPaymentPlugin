<?php
if($bank instanceof sfOutputEscaperArrayDecorator)
		$bank=sfOutputEscaper::unescape($bank);
echo $bank;
?>