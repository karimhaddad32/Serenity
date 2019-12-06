	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>

	<?php  $this->view('/Shared/top_nav_bar_profile');?>


		<div class="container" style="display: grid; grid-template-columns: auto;">
		<h1 style="text-align: center">Recommendations</h1>
			<div style="display: grid; grid-template-columns: 50% 50%;">
				<div align="center" class="table-striped" style="word-break: break-all; overflow: auto; max-height: 600px;border-right: solid; overflow: scroll;">
					<h3>Recommended to Me</h3>
					<table class="table">
						<tr>
							<th>Recommended by</th>
							<th>Post Category</th>
							<th>Go To</th>
							<th></th>
						</tr>
					<?php  
					foreach ($model as $recom) {
						if($recom->recommender_id != $_SESSION['user_id']){	
							$name = $recom->other_profile->username;	
							$category = $recom->category->category_type;			
							echo "<tr>
							<td>$name</td>
							<td>$category</td>
							<td><a href ='/Post/detail/$recom->post_id' >Go To</a> </td>
						</tr>";
						}
					}
						
					?>
						
					</table>
				</div>
				<div align="center" class="table-striped" style="word-break: break-all; overflow: auto; max-height: 600px;border-left: solid; overflow: scroll;">
					<h3>Recommended by Me</h3>
					<table class="table">
						<tr>
							<th>Recommended to</th>
							<th>Post Category</th>
							<th>Go to</th>
						</tr>
						<?php  
					foreach ($model as $recom) {

						if($recom->recommender_id == $_SESSION['user_id']){		
						$name = $recom->other_profile->username;	
						$category = $recom->category->category_type;		
							echo "<tr>
							<td>$name</td>
							<td>$category</td>
							<td><a href ='/Post/detail/$recom->post_id' >Go To</a> </td>
						</tr>";
						}
					}
						
					?>
					</table>
				</div>
				
			</div>	
		</div>
		
	
	</div>