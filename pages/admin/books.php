<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ../");
	die("Redirected");
} else if ($_SESSION['roleId'] != 1) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';

$searchCriteria = array(
	'title' => "WHERE b.name LIKE :query",
	'author' => "WHERE b.author LIKE :query",
	'publisher' => "WHERE b.publisher LIKE :query",
	'year' => "WHERE b.year LIKE :query",
	'category' => "WHERE c.category_name LIKE :query"
);

$dbh = include '../../modules/dbh.php';
$sql = "SELECT b.id AS id, b.code AS code, b.name AS name, b.author AS author, b.publisher AS publisher, b.year AS year, c.category_name AS category_name FROM book AS b JOIN category AS c ON b.category_id = c.id";

if (isset($_GET['option']) && array_key_exists($_GET['option'], $searchCriteria)) {
	$sql = $sql . " " . $searchCriteria[$_GET['option']];
	$sth = $dbh->prepare($sql);
	$sth->execute(array(':query' => "%" . $_GET['query'] . "%"));
} else {
	$sth = $dbh->prepare($sql);
	$sth->execute();
}

$books = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>Book List <a href="#" class="w3-btn w3-white w3-large w3-right" onclick="document.getElementById('addBookModal').style.display='block'"><i class="fa fa-plus"></i> Add Book</a></h2>
	</div>
	<div class="w3-light-grey">
		<form class="w3-row-padding" action="books.php" method="get">
			<div class="w3-col s4 m3 l2 w3-section w3-row-padding">
				<div class="w3-col" style="width: 50px;">
					<label for="option-field"><i class="w3-xxlarge fa fa-filter"></i></label>
				</div>
				<div class="w3-rest">
					<select class="w3-select w3-border w3-light-grey" name="option" id="option-field">
						<option value="title" <?php echo (isset($_GET['option']) && $_GET['option'] == 'title') ? 'selected' : ''; ?>>Title</option>
						<option value="author" <?php echo (isset($_GET['option']) && $_GET['option'] == 'author') ? 'selected' : ''; ?>>Author</option>
						<option value="publisher" <?php echo (isset($_GET['option']) && $_GET['option'] == 'publisher') ? 'selected' : ''; ?>>Publisher</option>
						<option value="year" <?php echo (isset($_GET['option']) && $_GET['option'] == 'year') ? 'selected' : ''; ?>>Year</option>
						<option value="category" <?php echo (isset($_GET['option']) && $_GET['option'] == 'category') ? 'selected' : ''; ?>>Category</option>
					</select>
				</div>
			</div>
			<div class="w3-col s5 m7 l8 w3-section">
				<input type="text" name="query" placeholder="Search Term" class="w3-input w3-light-grey" value=<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>>
			</div>
			<div class="w3-col s3 m2 l2 w3-section">
				<input type="submit" value="Search" class="w3-btn-block">
			</div>
		</form>
	</div>
	<table class="w3-table w3-bordered">
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Author</th>
			<th>Publication Year</th>
			<th>Publisher</th>
			<th>Category</th>
		</tr>
<?php
foreach ($books as $book) {
?>
		<tr>
			<td><?php echo $book['code']; ?></td>
			<td><?php echo $book['name']; ?></td>
			<td><?php echo $book['author']; ?></td>
			<td><?php echo $book['year']; ?></td>
			<td><?php echo $book['publisher']; ?></td>
			<td><?php echo $book['category_name']; ?></td>
		</tr>
<?php
}
?>
	</table>
</div>
<!-- Add Book Modal -->
<div id="addBookModal" class="w3-modal">
	<div class="w3-modal-content w3-animate-opacity">
		<header class="w3-container w3-brown">
			<span onclick="document.getElementById('addBookModal').style.display='none'" class="w3-closebtn">&times;</span>
			<h2>Book Data</h2>
		</header>
		<div class="w3-container">
			<form action="" method="post">
				<p>
					<input type="text" name="name" id="name-field" class="w3-input" required>
					<label class="w3-label w3-validate" for="name-field">Title</label>
				</p>
				<p>
					<input type="text" name="author" id="author-field" class="w3-input" required>
					<label class="w3-label w3-validate" for="author-field">Author</label>
				</p>
				<p>
					<input type="number" name="year" id="year-field" class="w3-input" required>
					<label class="w3-label w3-validate" for="year-field">Publication Year</label>
				</p>
				<p>
					<input type="text" name="publisher" id="publisher-field" class="w3-input" required>
					<label class="w3-label w3-validate" for="publisher-field">Publisher</label>
				</p>
				<p>
					<select name="category_id" id="category-field" class="w3-input" required>
						<option></option>
						<option></option>
						<option></option>
						<option></option>
					</select>
					<label class="w3-label w3-validate" for="category-field">Category</label>
				</p>
				<p>
					<input type="submit" value="ADD" class="w3-btn">
				</p>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->
<?php
include '../../templates/footer.php';
?>