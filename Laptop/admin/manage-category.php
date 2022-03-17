<?php include('partials/menu.php'); ?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Quản lý Thể Loại</h1>
			<br /><br /><br />

			<?php  
				if (isset($_SESSION['add'])) 
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}

				if (isset($_SESSION['remove'])) 
				{
					echo $_SESSION['remove'];
					unset($_SESSION['remove']);
				}

				if (isset($_SESSION['delete'])) 
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
			?>

			<br><br>
			<a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Thêm Thể Loại</a>
			
			<br /><br /><br />
			<table class="tbl-full">
				<tr>
					<th>STT</th>
					<th>Tên thể loại</th>
					<th>Ảnh</th>
					<th>Nổi bật</th>
					<th>Trình trạng hoạt động</th>
					<th>Hành động</th>
				</tr>

				<?php  
					$sql = "select * from category";
					$res = mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res);
					$sn=1;
					if ($count>0) 
					{
						while($row=mysqli_fetch_assoc($res))
						{
							$id = $row['id'];
							$title = $row['title'];
							$image_name = $row['image_name'];
							$featured = $row['featured'];
							$active = $row['active'];
							
							?>
								<tr>
									<td><?php echo $sn++; ?></td>
									<td><?php echo $title; ?></td>

									<td>
										<?php 
											if ($image_name!="") 
											{
												?>
													<img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" height="100px">
												<?php
											}
											else
											{
												echo "<div class='error'>Chưa thêm ảnh</div>";
											}
										?>
									</td>

									<td><?php echo $featured; ?></td>
									<td><?php echo $active; ?></td>
									<td>
										<a href="" class="btn-secondary">Cập nhật</a>
										<a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Xóa</a>
									</td>
								</tr>
							<?php
						}
					}
					else
					{
						?>
							<tr>
								<td colspan="6"><div class="error">Không có thể loại nào được thêm!</div></td>
							</tr>
						<?php
					}
				?>

			</table>
		</div>
	</div>

<?php include('partials/footer.php'); ?>