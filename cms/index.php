<?php session_start();
	include 'includes/db.php';
		$login_err = '';
	if(isset($_GET['login_error'])){
		if($_GET['login_error'] == 'empty'){
			$login_err = '<div class="alert alert-danger">User name or Password was empty!</div>';
		}elseif($_GET['login_error'] == 'wrong'){
			$login_err = '<div class="alert alert-danger">User name or Password was Wrong!</div>';
		}elseif($_GET['login_error'] == 'query_error'){
			$login_err = '<div class="alert alert-danger">There is somekind of Database Issue!</div>';
		}
	}
	
	$per_page = 5;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>CMS System</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../js/jquery.js"></script>
	</head>
	<body>
		<?php include 'includes/header.php';?>
		<div class="container">
			<?php echo $login_err; ?>
			<article class="row">
				<section class="col-lg-8">
					<?php
						$sel_sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY id DESC LIMIT $start_from,$per_page";
						$run_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
							echo '
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3><a href="post.php?post_id='.$rows['id'].'">'.$rows['title'].'</a></h3>
								</div>
								<div class="panel-body">
									<div class="col-lg-4">
										<img src="'.$rows['image'].'" width="100%">
									</div>
									<div class="col-lg-8">
										<p>'.substr($rows['description'],0,300).'........</p>
									</div>
									<a href="post.php?post_id='.$rows['id'].'" class="btn btn-primary">Read More</a>
								</div>
							</div>
							';
						}
					?>
				</section>
				<?php include 'includes/sidebar.php';?>
				
			</article>
			<div class="text-center">
				<ul class="pagination">
			<?php
				$pagination_sql = "SELECT * FROM posts WHERE status = 'published'";
				$run_pagination = mysqli_query($conn, $pagination_sql);

				$count = mysqli_num_rows($run_pagination);
				
				$total_pages = ceil($count/$per_page);
				
				for($i=1;$i<=$total_pages;$i++){
					echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
				}
				
			?>
			
				</ul>
			</div>
			
		</div>
		<div style="width:50px;height:50px;"></div>
		<?php include 'includes/footer.php';?>
	</body>
</html>