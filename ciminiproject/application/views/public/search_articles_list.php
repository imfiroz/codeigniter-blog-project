<?php include('public_header.php'); ?>
<div class="container">
	<h1>Search Article</h1>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Article TItle</td>
				<td>Published on</td>
			</tr>
		</thead>
		<tbody>
		<?php 
			if($articles):
			$count = $this->uri->segment(4);
			 	foreach($articles as $article): 
		?>
				<tr>
					<td><?= ++$count ?></td>
					<td><?= $article->title ?></td>
					<td>Publish Date</td>
				</tr>
		<?php
				endforeach;
			else:
		?>
				<tr>
					<td colspan="3">No record added</td>
				</tr>
		<?php 
			endif;
		?>
		</tbody>
	</table>
	<?=  $this->pagination->create_links(); ?>
</div>
<?php include('public_footer.php'); ?>