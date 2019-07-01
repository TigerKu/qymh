<div class="demo">
	<div id="default-demo"></div>
</div>
<script type="text/javascript">
$(function() {
	$.fn.raty.defaults.path = 'images/star';
	$('#default-demo').raty({ width: 150 });
});
</script>

 Read Only
$('#star').raty({ readOnly: true, score: 3 });

