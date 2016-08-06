<?php require_once('../header.php');?>

<hr>

<!-- Main content -->
<div class = "container">

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h4 class="box-title">MANAGE RECIPES</h4>
					</div>
					<hr>
					<div class="box-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Title</th>
								<th>Category</th>
								<th>Date added</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach($recipes as $recipe): ?>
								<tr>
									<td><?php echo htmlentities($recipe['recipetitle']); ?></td>
									<td><?php echo ($recipe['recipecategory']); ?></td>
									<td><?php echo ($recipe['recipedate']); ?></td>
									<td class="center">
										<form action="" method="post">
											<div>
												<input type="hidden" name="id" value="<?php echo ($recipe['id']); ?>">
												<button type="submit" name="action" value="view" class="btn btn-primary btn-sm">View</button>
												<button type="submit" name="action" value="edit" class="btn btn-success btn-sm">Edit</button>
												<button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">Delete</button>
											</div>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>


<!-- Pagination -->
<div class="row text-center">
	<div class="col-lg-12">
		<ul class="pagination">
			<li>
				<?php echo "<a href='?page=1'>".'&laquo;'."</a> "; // Goto 1st page ?>
			</li>
			<li>
				<?php for ($i=1; $i<=$total_pages; $i++) {
					echo "<a href='?page=".$i."'>".$i."</a> ";
				};?>
			</li>
			<li>
				<?php echo "<a href='?page=$total_pages'>".'&raquo;'."</a> "; // Goto last page ?>
			</li>
		</ul>
	</div>
</div>


<?php require_once('../footer.php');?>
