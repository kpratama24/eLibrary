<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ../");
	die("Redirected");
}

if (isset($_GET['id'])) {

$file = "../../files/JOURNAL$_GET[id].pdf";
$filename = "$_GET[id].pdf";

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);

} else {

include '../../templates/header.php';
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-brown">
		<h2>Free Journals</h2>
	</div>
	<div class="w3-container">
		<p>
			<h4><b>Journal 1</b></h4>
			<h6><i>Writer 1</i></h6>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
			</p>
			<a href="journals.php?id=1" target="_blank" class="w3-btn-block w3-brown">View Journal <i class="fa fa-chevron-right"></i></a>
			<hr>
			<h4><b>Journal 2</b></h4>
			<h6><i>Writer 2</i></h6>
			<p>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
			</p>
			<a href="journals.php?id=2" target="_blank" class="w3-btn-block w3-brown">View Journal <i class="fa fa-chevron-right"></i></a>
			<hr>
			<h4><b>Journal 3</b></h4>
			<h6><i>Writer 3</i></h6>
			<p>
				At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
			</p>
			<a href="journals.php?id=3" target="_blank" class="w3-btn-block w3-brown">View Journal <i class="fa fa-chevron-right"></i></a>
		</p>
	</div>
</div>
<?php
include '../../templates/footer.php';
}
?>