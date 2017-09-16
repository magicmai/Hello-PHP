<?php

/**
 * 提示操作信息的，并且跳转
 * @param string $mes
 * @param string $url
 */

function alertMes($mes, $url) {
	echo "<script>alert('{$mes}'); location.href='{$url}';</script>";
}