<?php
session_start();
if (!isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>Trump election: Priebus and Bannon given key roles</h2>
	</div>
	<div class="w3-container">
		<p>
			US President-elect Donald Trump has awarded key roles in his incoming team to a top Republican party official and a right-wing media chief.
			Reince Priebus, chairman of the Republican National Committee (RNC), will be his chief of staff.
			In this role, he will set the tone for the new White House and act as a conduit to Congress and the government.
			Stephen Bannon, from the Breitbart News Network, will serve as Mr Trump's chief strategist.
			Mr Bannon stepped aside as executive chairman of Breitbart - a combative conservative site with an
			anti-establishment agenda - to act as Mr Trump's campaign chief.
			Meanwhile, in the president-elect's first interview, with US broadcaster CBS, Mr Trump said:
			<ul>
				<li>He would deport or jail up to three million illegal migrants with criminal links</li>
				<li>Future Supreme Court nominees would be "pro-life" - meaning they oppose abortion - and defend the 
				constitutional right to bear arms</li>
				<li>He will not seek to overturn the legalisation of same-sex marriage</li>
				<li>He will forgo the president's $400,000 salary, taking $1 a year instead</li>
			</ul>
		</p>
		<p>
			In a statement released by his campaign, Mr Trump described Mr Priebus and Mr Bannon as "highly qualified 
			leaders who worked well together on our campaign and led us to a historic victory".
			Mr Priebus, 44, acted as a bridge between Mr Trump and the Republican party establishment during the campaign. 
			He is close to House Speaker Paul Ryan, a fellow Wisconsinite who could be instrumental in steering the new 
			administration's legislative agenda.
		</p>
	</div>
</div>
<?php
include '../../templates/footer.php';
?>