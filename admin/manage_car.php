<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$car = $conn->query("SELECT * FROM car where id =".$_GET['id']);
foreach($car->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-car">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="lavel">lavel</label>
			<input type="text" name="lavel" id="lavel" class="form-control" value="<?php echo isset($meta['lavel']) ? $meta['lavel']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="number">lavel</label>
			<input type="text" name="number" id="number" class="form-control" value="<?php echo isset($meta['number']) ? $meta['number']: '' ?>" required>
		</div>
		
	</form>
</div>
<script>
	$('#manage-car').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_car',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
</script>